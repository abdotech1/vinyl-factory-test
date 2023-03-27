<?php
/**
 * Template Name: Vinyl factory Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package tastypress
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<body>


<?php 

get_header(); 
    
?>

<div class="container">
<div class="product-breadcrumbs">
<i style="font-weight:bold;" class="fa-sharp fa-regular fa-greater-than fa-rotate-180"></i>
<?php custom_breadcrumbs(); ?>
</div>

<?php 

$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
  );
  $products_query = new WP_Query($args);
  if ($products_query->have_posts()) :
    while ($products_query->have_posts()) :
      $products_query->the_post();
      $product_image = get_the_post_thumbnail();
      $product_title = get_the_title();
      $product_reference = get_post_meta(get_the_ID(), '_product_reference', true);
      $product_price = get_post_meta( get_the_ID(), '_product_price', true );
      $product_description = get_post_meta( get_the_ID(), '_product_description', true );
      $product_images = get_the_content();

?>
<div class="first-section animate">
<div class="first-section_slider">
<span class="left-border"></span>
<span class="top-border"></span>
<div class="carousel-container">
  <div class="carousel">
   <?php echo $product_images?>
 

  </div>

</div>

<div class="navigation-test">
<div class="carousel-navigation">
<?php echo $product_images?>



  </div>
  <div class="test-online">
  <a href="#">
        <p>Essai en ligne</p>
        <i class="fa-solid fa-camera fa-beat-fade"></i>
    </a>
  </div>
   
  
</div>



</div>

<div class="first-section_infos">
<div class="title-price">
    <div>
        <h2><?php echo $product_title ?></h2>
        <P class="ref">REF:<?php echo $product_reference ?></P>
    </div>
    <div>
        <h3 class="price"><?php echo $product_price?>€</h3>
        <p class="rcd-price">Prix conseillé chez l'opticien</p>
    </div>
</div>
 <p class="product-desc"><?php echo $product_description?></p>

<a class="product-btn" href="#">Essai chez l’opticien</a>


<div class="products-adv">
    <div>
        <img src="<?php echo get_template_directory_uri() . '/img/group-21570.png'; ?>" alt="">
        <p>Design France</p>  
    </div>
    <div>
    <img src="<?php echo get_template_directory_uri() . '/img/group-21569.png'; ?>" alt="">
        <p>Solaire</p>  
    </div>
    <div>
    <img src="<?php echo get_template_directory_uri() . '/img/group-21568.png'; ?>" alt="">
        <p>Forme Rondes</p>  
    </div>
    <div>
    <img src="<?php echo get_template_directory_uri() . '/img/group-21567.png'; ?>" alt="">
        <p>Anti-reflet</p>  
    </div>
    <div>
    <img src="<?php echo get_template_directory_uri() . '/img/polarized.png'; ?>" alt="">
        <p>Verre Polarisé</p>  
    </div>
    <div>
    <img src="<?php echo get_template_directory_uri() . '/img/matiere.png'; ?>" alt="">
        <p>Combiné</p>  
    </div>
   
</div>
<hr>
<div class="products-demention">
<img src="<?php echo get_template_directory_uri() . '/img/taille-1.png'; ?>" alt="">
<img src="<?php echo get_template_directory_uri() . '/img/taille-2.png'; ?>" alt="">
</div>

<div class="products-qts-share">
    <a href=""><p>Vous avez une question ? </p></a>
    <div class="products-share">
        <p>Partager le modèle :</p>
        <a href=""><img src="<?php echo get_template_directory_uri() . '/img/facebook-black.png'; ?>" alt=""></a>
        <a href=""><img src="<?php echo get_template_directory_uri() . '/img/twitter-black.png'; ?>" alt=""></a>
        <a href=""><img src="<?php echo get_template_directory_uri() . '/img/pinterest-black.png'; ?>" alt=""></a>

    </div>
</div>

</div>
</div>

<div class="second-section animate">
    <a class="popup-youtube" href="https://www.youtube.com/watch?v=tH-JxECXPpg">
    <div class="vedio">
    <span class="vedio-border_left"></span>
    <span class="vedio-border_bottom"></span>
    <img src="<?php echo get_template_directory_uri() . '/img/vedio-image.png'; ?>" alt="">
    <span class="vedio-starter">
    <i class="fa-classic fa-solid fa-play fa-beat"></i>

    </span>
    </div>
    </a>
    <div class="savoir-faire">
     <h2>SAVOIR FAIRE</h2>
     <p class="subtitle">& MATÉRIAUX D’EXCEPTION</p>
     <p class="savoir-desc">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Porta nibh venenatis cras sed felis. At erat pellentesque adipiscing commodo elit at imperdiet dui.</p>
     <p class="savoir-desc savoir-desc-2">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Porta nibh venenatis cras sed felis. At erat pellentesque adipiscing commodo elit at imperdiet dui.</p>
     <a class="product-btn " href="#">EN SAVOIR PLUS</a>
    </div>
</div>




<div class="third-section animate">
<div class="savoir-faire">
     <h2>L’ÉCRIN</h2>
     <p class="subtitle">LEGEND</p>
     <p class="savoir-desc">Mieux qu’un defile de mode pour presenter notre collection, des concerts donnés par
les artistes qui portent nos creations.
</p>
     <p class="savoir-desc savoir-desc-2">le <span>Show Room de Vinyl Factory</span> se transforme en scène intimiste, le temps d’une live Session.
</p>
<p class="savoir-desc savoir-desc-3">Découvrez les <span>Sessions acoustiques</span>
et nos lunettes vintages de vos musiciens préférés.
</p>
     <a class="product-btn " href="#">commander un ecrin</a>
    </div>

    <div class="ecrin-img">
    <span class="ecrin-border_left"></span>
    <span class="ecrin-border_bottom"></span>
    <img src="<?php echo get_template_directory_uri() . '/img/etui-dur.png'; ?>" alt="">
    <img class="casset-img" src="<?php echo get_template_directory_uri() . '/img/img_3139.png'; ?>" alt="">

    </div>
</div>





<div class="fourth-section animate">
    <h3>VOUS POURRIEZ AIMER également :</h3>
    <div class="fourth-section_cards">

  <div class="box right-box" style="background-image:url(<?php echo get_template_directory_uri() . '/img/rock.png'; ?>)">
    <p class="glasse-title">BARROW</p>
    <p class="glasse-sex">Femme</p>
    <div class="btn-and-colors">
    <a href="#" class="product-btn">ESSAI CHEZ L’OPTICIEN</a>

    <div class="fourth-section_colors">
        <p>+ 3 couleurs </p>
        <i class="fa-solid fa-greater-than"></i>
    </div>
    </div>
  </div>


  <div class="box left-box">
    <p class="glasse-title">BARROW</p>
    <p class="glasse-sex">Femme</p>
    <img  src="<?php echo get_template_directory_uri() . '/img/glasse.png'; ?>" alt="">


    <div class="fourth-section_colors">
        <p>+ 3 couleurs </p>
        <i class="fa-solid fa-greater-than"></i>
    </div>
 
  </div>


  <div class="box right-box" style="background-image:url(<?php echo get_template_directory_uri() . '/img/rock.png'; ?>)">
    <p class="glasse-title">BARROW</p>
    <p class="glasse-sex">Femme</p>
    <div class="btn-and-colors">
    <a href="#" class="product-btn">ESSAI CHEZ L’OPTICIEN</a>

    <div class="fourth-section_colors">
        <p>+ 3 couleurs </p>
        <i class="fa-solid fa-greater-than"></i>
    </div>
    </div>
  </div>

 

  <div class="box left-box">
  <p class="glasse-title">BARROW</p>
    <p class="glasse-sex">Femme</p>
    <img  src="<?php echo get_template_directory_uri() . '/img/glasse.png'; ?>" alt="">
    

    <div class="fourth-section_colors">
        <p>+ 3 couleurs </p>
        <i class="fa-solid fa-greater-than"></i>
    </div>
  
  </div>


  </div>
</div>


</div>





<?php
endwhile;
wp_reset_postdata();
endif;

get_footer();

?>


    
</body>