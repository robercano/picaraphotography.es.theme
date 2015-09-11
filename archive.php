<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package trend
 */

get_header(); ?>

<div id="wrapper">
	
	<div id="container" class="djax-dynamic">
		
		<?php if ( have_posts() ) :/* ?>
			
			<?php
				
				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				
				if(get_post_type() == 'post') {
					get_template_part( 'templates/content/content', 'post' );
				}else{
					get_template_part( 'templates/content/content', get_post_format() );
				}
				
			?>

		<?php else : ?>
			
			<?php get_template_part( 'templates/content/content', 'none' ); ?>

		<?php endif; ?>

	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

