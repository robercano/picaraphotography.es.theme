<?php

/*
Template Name: Custom Homepage
*/

get_header(); ?>

<div id="wrapper">
	
	<!-- dynamic content -->
	<div id="container" class="djax-dynamic">
		
		<?php get_template_part('templates/single/single-bwgallery'); ?>
		
	</div>
	
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>