<?php
defined( 'ABSPATH' ) || exit;


function mytheme_enqueue_magnificCss() {
    wp_enqueue_style( 'magnificCss-style', get_template_directory_uri() . '/magnific.css' );
	
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_magnificCss' );

function mytheme_enqueue_styles() {
    wp_enqueue_style( 'mytheme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_styles' );




function mytheme_enqueue_scripts() {
    wp_enqueue_script( 'mytheme-script', get_template_directory_uri() . '/js/app.js', array(), null, true );
	
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_scripts' );


function enqueue_fontawesome() {
    wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css' );
  }
  add_action( 'wp_enqueue_scripts', 'enqueue_fontawesome' );


  

  function enqueue_jquery() {
    wp_enqueue_script( 'jquery', ' https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js ' );
  }
  add_action( 'wp_enqueue_scripts', 'enqueue_jquery' );


 

 



function mytheme_register_menus() {
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'mytheme' ),
        )
    );
}
add_action( 'after_setup_theme', 'mytheme_register_menus' );






function custom_breadcrumbs() {
    global $post;
  
    if (!is_home()) {
      // Start the breadcrumb container
      echo '<div class="breadcrumbs">';
  
      // Add the home link
      echo '<a href="' . get_home_url() . '">Home</a>';
  
      // Get the page hierarchy
      $ancestors = get_post_ancestors($post);
  
      // Display the parent pages in the hierarchy
      if (!empty($ancestors)) {
        $ancestors = array_reverse($ancestors);
        foreach ($ancestors as $ancestor) {
          echo '<span class="separator"> / </span>';
          echo '<a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>';
        }
      }
  
      // Display the current page
      echo '<span class="separator"> / </span>';
      echo '<span class="current">' . get_the_title($post) . '</span>';
  
      // End the breadcrumb container
      echo '</div>';
    }
  }
  

  function create_product_post_type() {
    $labels = array(
      'name' => 'Products',
      'singular_name' => 'Product',
    );
    $args = array(
      'labels' => $labels,
      'public' => true,
      'has_archive' => true,
      'menu_position' => 5,
      'supports' => array('title', 'thumbnail', 'editor'),
    );
    register_post_type('product', $args);
  }
  add_action('init', 'create_product_post_type');
  


  function add_product_reference_meta_box() {
    add_meta_box(
      'product_reference_meta_box',
      'Product Reference',
      'render_product_reference_meta_box',
      'product',
      'side',
      'default'
    );
  }

  
//product ref metabox
  function render_product_reference_meta_box($post) {
    wp_nonce_field(basename(__FILE__), 'product_reference_meta_box_nonce');
    $product_reference = get_post_meta($post->ID, '_product_reference', true);
    echo '<label for="product_reference_field">Product Reference</label>';
    echo '<input type="text" id="product_reference_field" name="product_reference_field" value="' . esc_attr($product_reference) . '" />';
  }
  function save_product_reference_meta_box($post_id) {
    if (!isset($_POST['product_reference_field']) || !wp_verify_nonce($_POST['product_reference_meta_box_nonce'], basename(__FILE__))) {
      return;
    }
    $product_reference = sanitize_text_field($_POST['product_reference_field']);
    update_post_meta($post_id, '_product_reference', $product_reference);
  }
  add_action('add_meta_boxes', 'add_product_reference_meta_box');
  add_action('save_post', 'save_product_reference_meta_box');


  // images upload
  function product_fields_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'product_fields_nonce' );
    $product_images = get_post_meta( $post->ID, '_product_images', true );
    ?>
      <div class="product-images-container">
        <?php if ( ! empty( $product_images ) ) :
          foreach ( $product_images as $index => $image_url ) :
            ?>
            <div class="product-image-row">
              <img src="<?php echo esc_url( $image_url ); ?>" style="max-width:100%;" /><br />
              <input type="text" name="product_images[]" class="regular-text" value="<?php echo esc_attr( $image_url ); ?>">
              <button class="remove-image button-secondary">Remove Image</button>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <button class="add-image button-secondary">Add Image</button>
  
      <script>
        jQuery(document).ready(function($) {
          var container = $('.product-images-container');
          var addButton = $('.add-image');
  
          $(addButton).click(function() {
            var row = '<div class="product-image-row"><img src="" style="max-width:100%;" /><br /><input type="text" name="product_images[]" class="regular-text" value=""><button class="remove-image button-secondary">Remove Image</button></div>';
            $(container).append(row);
            addImageUploader();
            return false;
          });
  
          $(container).on('click', '.remove-image', function() {
            $(this).closest('.product-image-row').remove();
            return false;
          });
  
          function addImageUploader() {
            $('.product-images-container .product-image-row:last-of-type img').click(function(e) {
              e.preventDefault();
              var button = $(this);
              var image = wp.media({
                title: 'Upload Image',
                multiple: false
              }).open().on('select', function(e) {
                var uploaded_image = image.state().get('selection').first();
                var image_url = uploaded_image.toJSON().url;
                $(button).attr('src', image_url);
                $(button).next('br').next('input').val(image_url);
              });
              return false;
            });
          }
  
          addImageUploader();
        });
      </script>
    <?php
  }


  function save_product_image_field( $post_id ) {
    if ( ! isset( $_POST['product_fields_nonce'] ) || ! wp_verify_nonce( $_POST['product_fields_nonce'], basename( __FILE__ ) ) ) {
      return $post_id;
    }
  
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return $product_images = isset( $_POST['product_images'] ) ? array_map( 'sanitize_text_field', $_POST['product_images'] ) : array();

      update_post_meta( $post_id, '_product_images', $product_images );
      }
      
      add_action( 'save_post_product', 'save_product_image_field' );
    }



    
    

    // Add meta box for product price and description
function product_meta_box() {
    add_meta_box(
        'product_meta_box',
        'Product Details',
        'product_meta_box_callback',
        'product',
        'side',
        'default'
    );
}
add_action( 'add_meta_boxes', 'product_meta_box' );

// Callback function for product meta box
function product_meta_box_callback( $post ) {
    // Nonce field to verify against CSRF
    wp_nonce_field( basename( __FILE__ ), 'product_meta_box_nonce' );

    // Retrieve the existing values for the fields
    $product_price = get_post_meta( $post->ID, '_product_price', true );
    $product_description = get_post_meta( $post->ID, '_product_description', true );
    ?>

    <p>
        <label for="product_price"><?php _e( 'Price', 'product_price' ); ?></label>
        <br />
        <input style="width:100px;" type="number" name="product_price" id="product_price" value="<?php echo esc_attr( $product_price ); ?>" class="regular-text" />
    </p>
    <p>
        <label for="product_description"><?php _e( 'Description', 'product_description' ); ?></label>
        <br />
        <textarea name="product_description" id="product_description" rows="5" cols="30"><?php echo esc_textarea( $product_description ); ?></textarea>
    </p>

    <?php
}

// Save the meta box fields
function save_product_meta_box( $post_id ) {
    // Check if nonce field is set
    if ( ! isset( $_POST['product_meta_box_nonce'] ) ) {
        return;
    }

    // Verify nonce field to prevent CSRF
    if ( ! wp_verify_nonce( $_POST['product_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return;
    }

    // Check if the user has permission to edit the post
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Save the product price and description
    if ( isset( $_POST['product_price'] ) ) {
        update_post_meta( $post_id, '_product_price', sanitize_text_field( $_POST['product_price'] ) );
    }
    if ( isset( $_POST['product_description'] ) ) {
        update_post_meta( $post_id, '_product_description', sanitize_text_field( $_POST['product_description'] ) );
    }
}
add_action( 'save_post', 'save_product_meta_box' );