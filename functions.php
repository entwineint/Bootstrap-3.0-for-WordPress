<?php
/**
 * Bootstrap functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * @package WordPress
 * @subpackage BootStrap-for-WordPress-3
 * @since BootStrap-for-WordPress-3 0.1
 * 
 * Last Revised: August 6, 2013
 */

/*
| -------------------------------------------------------------------
| Setup Theme
| -------------------------------------------------------------------
|
| */

add_action( 'after_setup_theme', 'bootstrap_theme_setup' );
if ( ! function_exists( 'bootstrap_theme_setup' ) ):
function bootstrap_theme_setup() {
  add_theme_support( 'automatic-feed-links' );
  /**
   * Adds custom menu with wp_page_menu fallback
   */
  register_nav_menus( array(
    'main-menu' => __( 'Main Menu', 'bootstrap' ),
  ) );
  add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat' ) );
  /**
   * Declaring the theme language domain
   */
   load_theme_textdomain('bootstrap', get_template_directory() . '/lang');
}
endif;

################################################################################
// Loading All CSS Stylesheets
################################################################################
function bootstrap_css_loader() {
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', false ,'0.90', 'all' );
}
add_action('wp_enqueue_scripts', 'bootstrap_css_loader');


################################################################################
// Loading all JS Script Files.  Remove any files you are not using!
################################################################################
  function bootstrap_js_loader() {
       wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'),'0.90', true );
  }
add_action('wp_enqueue_scripts', 'bootstrap_js_loader');

/*
| -------------------------------------------------------------------
| Top Navigation Bar Customization
| -------------------------------------------------------------------
 */


/*
| -------------------------------------------------------------------
| Registering Widget Sections
| -------------------------------------------------------------------
| */


/*
| -------------------------------------------------------------------
| Adding Post Thumbnails and Image Sizes
| -------------------------------------------------------------------
| */



/*
| -------------------------------------------------------------------
| Revising Default Excerpt
| -------------------------------------------------------------------
| Adding filter to post excerpts to contain ...Continue Reading link
| */