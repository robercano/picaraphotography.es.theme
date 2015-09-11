<?php
/**
 * @package trend
 */

$cat_layout = Bw::get_option( 'blog_layout' );

$terms = get_the_terms($post->ID, 'category');
if( !empty($terms) )
{
	$term = array_pop($terms);
 
	$custom_field = get_field('blog_layout', $term );
	
	if( !empty( $custom_field ) ) {
		$cat_layout = $custom_field;
	}
}

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('bw--also-like bw--scroll scale--both'); ?>>
	
	<?php if (have_posts()): ?>
	<?php while (have_posts()): the_post(); ?>
		
		<?php if($cat_layout == 'classic'): ?>
			
			<?php get_template_part( 'templates/single/single-classic' ); ?>
			
		<?php else: ?>
			
			<?php get_template_part( 'templates/single/single-standard' ); ?>
			
		<?php endif; ?>
		
	<?php endwhile; ?>
	<?php endif; ?>
	
</div>
