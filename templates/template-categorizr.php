<?php
/*
Template Name: Category gallery
*/

get_header(); ?>

<div id="wrapper">
	
	<!-- dynamic content -->
	<div id="container" class="djax-dynamic">
		
		<?php get_template_part( 'templates/index-categories' ); ?>
		
	</div>
	
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>