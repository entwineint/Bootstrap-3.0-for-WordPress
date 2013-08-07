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
	wp_enqueue_style('bootstrapcustom', get_template_directory_uri().'/css/bootstrap-custom.css', false ,'1.0', 'all' );
	wp_enqueue_style('bootstrapglyphicons', get_template_directory_uri().'/css/bootstrap-glyphicons.css', false ,'1.0', 'all' );
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
function bootstrap_widgets_init() {

  register_sidebar(array(
    'name' => 'Home Left',
    'id'   => 'home-left',
    'description'   => 'Left textbox on homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ));

    register_sidebar(array(
    'name' => 'Home Middle',
    'id'   => 'home-middle',
    'description'   => 'Middle textbox on homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ));

    register_sidebar(array(
    'name' => 'Home Right',
    'id'   => 'home-right',
    'description'   => 'Right textbox on homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ));

}
add_action( 'init', 'bootstrap_widgets_init' );

/*
| -------------------------------------------------------------------
| Adding Post Thumbnails and Image Sizes
| -------------------------------------------------------------------
| */



/*
| -------------------------------------------------------------------
| Revising Default Excerpt
| -------------------------------------------------------------------
| */


/*
| -------------------------------------------------------------------
| Comment and Pingback Template
| -------------------------------------------------------------------
 */
if ( ! function_exists( 'bootstrapwp_comment' ) ) :
function bootstrap_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
  ?>
  <li class="post pingback">
    <p><?php _e( 'Pingback:', 'bootstrap' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'bootstrap' ), ' ' ); ?></p>
  <?php
      break;
    default :
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <article id="comment-<?php comment_ID(); ?>" class="comment">
      
        <div class="comment-author vcard">
          <?php echo get_avatar( $comment, 40 ); ?>
          <?php printf( __( '%s <span class="says">says:</span>', 'bootstrap' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
        </div><!-- .comment-author .vcard -->
        <?php if ( $comment->comment_approved == '0' ) : ?>
          <em><?php _e( 'Your comment is awaiting moderation.', 'bootstrap' ); ?></em>
          <br />
        <?php endif; ?>

        <div class="comment-meta commentmetadata">
          <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
          <?php
            /* translators: 1: date, 2: time */
            printf( __( '%1$s at %2$s', 'bootstrap' ), get_comment_date(), get_comment_time() ); ?>
          </time></a>
          <?php edit_comment_link( __( '(Edit)', 'bootstrap' ), ' ' );
          ?>
        </div><!-- .comment-meta .commentmetadata -->
     

      <div class="comment-content"><?php comment_text(); ?></div>

      <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
      </div><!-- .reply -->
    </article><!-- #comment-## -->

  <?php
      break;
  endswitch;
}
endif; // ends check for bootstrapwp_comment()