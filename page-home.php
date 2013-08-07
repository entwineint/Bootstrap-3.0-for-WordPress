<?php
/**
 * Template Name: Home Page with 3 Marketing Sections
 * Description: Home Page with 3 Marketing Sections
 *
 * @package WordPress
 * @subpackage BootStrap-for-WordPress-3
 * @since BootStrap-for-WordPress-3 0.1
 */

get_header(); ?>
<div class="container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="body-content">
		<div class="page-header">
			<h1><?php the_title();?></h1> 
			<small><?php the_content();?></small>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<?php
					if ( function_exists( 'dynamic_sidebar' ) ) dynamic_sidebar( "home-left" );
				?>
			</div>
			<div class="col-lg-4">
				<?php
					if ( function_exists( 'dynamic_sidebar' ) ) dynamic_sidebar( "home-middle" );
				?>
			</div>
			<div class="col-lg-4">
				<?php
					if ( function_exists( 'dynamic_sidebar' ) ) dynamic_sidebar( "home-right" );
				?>
			</div>
		</div>
	</div>
<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>