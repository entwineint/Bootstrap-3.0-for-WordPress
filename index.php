<?php
/**
 *
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage BootStrap-for-WordPress-3
 * @since BootStrap-for-WordPress-3 0.1
 */

get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="masthead">
      		<h1><?php the_title();?></h1>	
	</div>
	<div class="body-content">
		<div class="row">
			<div class="col-lg-8">
				<?php the_content();?>
			</div>
			<div class="col-lg-4">
				<?php get_sidebar('blog'); ?>
			</div>
	</div>
<?php endwhile; endif; ?>
<?php get_sidebar('blog'); ?>
<?php get_footer(); ?>