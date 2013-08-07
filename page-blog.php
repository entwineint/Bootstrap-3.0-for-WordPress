<?php
/**
 * Template Name: Blog Page
 *
 *
 * @package WordPress
 * @subpackage BootStrap-for-WordPress-3
 * @since BootStrap-for-WordPress-3 0.1
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-8">
		<?php
    // Blog post query
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    query_posts( array( 'post_type' => 'post', 'paged'=>$paged, 'showposts'=>0) );
    if (have_posts()) : while ( have_posts() ) : the_post(); ?>
		<div class="page-header">
			<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h2><?php the_title();?></h2></a>
		</div>
		<div class="container">
			<?php the_content();?>
		</div>
		<div class="well well-sm meta">
			<ul>
				<li><span class="glyphicon glyphicon-time label label-info"></span>&nbsp;<?php the_time('l, F jS, Y'); ?></li>
				<li><span class="glyphicon glyphicon-folder-open label label-info"></span>&nbsp;&nbsp;<?php the_category(', '); ?></li>
				<li><span class="glyphicon glyphicon-comment label label-info"></span>&nbsp;&nbsp;<?php comments_popup_link('No Comments', 'Comment <span class="badge">1</span>', 'Comments <span class="badge">%</span>'); ?></li>
				<li><?php edit_post_link('<span class="glyphicon glyphicon-edit label label-info"></span>&nbsp;&nbsp;Edit', '', ''); ?></li>
			</ul>
		</div>
 		<?php endwhile; endif; ?>
 		</div>
 		<div class="col-lg-4">
			<?php get_sidebar('blog'); ?>
 		</div>
 	</div>
 </div>
<?php get_footer(); ?>