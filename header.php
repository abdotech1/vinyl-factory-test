<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vinyl-factory-test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
  <nav>
  <div id="menuToggle">
 
 <input type="checkbox" />
 
 <span></span>
 <span></span>
 <span></span>
 <div class="mobile-menu">

 <?php

wp_nav_menu(

	array(

		'theme_location'  => 'primary',
		'menu_class'      => 'navbar-nav',
		'menu_id'         => 'main-menu',
		

	)

);


?>

 </div>
</div>
    <div class="navbar-brand">
	<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
    the_custom_logo();
} else { ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <img src="<?php echo get_template_directory_uri() . '/img/logo.png'; ?>" alt="logo">
    </a>
<?php } ?>
	
	

    </div>

	
    <div class="navbar-menu">
	
	
      
    <!-- The WordPress Menu goes here -->

	<?php

wp_nav_menu(

	array(

		'theme_location'  => 'primary',
		'menu_class'      => 'navbar-nav',
		'menu_id'         => 'main-menu',
		

	)

);


?>

</div>

    </div>
    <div class="navbar-icons">
      <ul>
        <li><a href="#"><img src="<?php echo get_template_directory_uri() . '/img/profile.png'; ?>" alt="user"></a></li>
        <li><a href="#"><img src="<?php echo get_template_directory_uri() . '/img/3.png'; ?>" alt="search"></a></li>
        <li><a href="#"><img src="<?php echo get_template_directory_uri() . '/img/2.png'; ?>" alt="shopping-cart"></a></li>
      </ul>
    </div>
  </nav>
</header>
