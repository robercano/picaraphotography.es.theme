<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Bad Weather
 */

get_header(); ?>

<div id="wrapper">
	
	<!-- dynamic content -->
	<div id="container" class="djax-dynamic">
		
		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php get_template_part( 'templates/content/content', 'page' ); ?>
			
		<?php endwhile; ?>
		
	</div>
	
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>