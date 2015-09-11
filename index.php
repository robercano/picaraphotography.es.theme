<?php

/**
 * The main template file.
 *
 */

get_header(); ?>
	
	<div id="wrapper">
		
		<!-- dynamic content -->
		<div id="container" class="djax-dynamic">
			
			<?php if(get_post_type() == 'post'):
				
				get_template_part( 'templates/content/content-post' );
				
			else: ?>
				
				<?php if ( have_posts() ) : ?>
					
					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php get_template_part( 'templates/content/content' ); ?>
						
					<?php endwhile; ?>
					
					<?php Bw::paging_nav(); ?>
					
				<?php else : ?>
					
					<?php get_template_part( 'templates/content/content', 'none' ); ?>
					
				<?php endif; ?>
			<?php endif; ?>
			
		</div> <!-- #container -->
	</div> <!-- #wrapper -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>