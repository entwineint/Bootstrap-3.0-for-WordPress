<?php
/**
 * Default Post Template
 *
 *
 * @package WordPress
 * @subpackage BootStrap-for-WordPress-3
 * @since BootStrap-for-WordPress-3 0.1
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-8">
			<div class="page-header">
				<h1><?php the_title();?></h1>
			</div>
			<div class="well well-sm meta">
				<ul>
					<li><span class="glyphicon glyphicon-time label label-info"></span>&nbsp;<?php the_time('l, F jS, Y'); ?> @ <?php the_time(); ?></li>
					<li><span class="glyphicon glyphicon-folder-open label label-info"></span>&nbsp;&nbsp;<?php the_category(', '); ?></li>
					<li><?php edit_post_link('<span class="glyphicon glyphicon-edit label label-info"></span>&nbsp;&nbsp;Edit', '', ''); ?></li>
					<li><?php comments_rss_link('RSS 2.0'); ?></li>
				</ul>
			</div>
			<div class="container">
				<?php the_content();?>
				
			</div>
			<?php comments_template(); ?>
 		</div>
 	<?php endwhile; ?>
 		<div class="col-lg-4">
			<?php get_sidebar('blog'); ?>
 		</div>
 	</div>
 </div>
 
<?php get_footer(); ?>