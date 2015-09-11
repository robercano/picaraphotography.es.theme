<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Bad Weather
 */

get_header(); ?>

<div id="wrapper">
	
	<!-- dynamic content -->
	<div id="container" class="djax-dynamic">
		
		<?php
		if(get_post_type() == 'post') {
			
			$post_type = get_post_type() == 'post' ? 'bwpost' : 'bwgallery';
			
			get_template_part( 'templates/single/single', $post_type );
			
		}else{
			get_template_part( 'templates/content/content', get_post_format() );
		}
		
		?>
		
	</div>
	
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>