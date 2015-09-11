<?php
/**
 * @package trend
 */

$blog_layout = Bw::get_option( 'blog_layout', '' );

$cat_layout = false;

$terms = get_the_terms($post->ID, 'category');

if( !empty($terms) and is_category() ) {
	
	$term = array_pop($terms);
 
	$cat_layout = get_field('blog_layout', $term );
	
}

?>

<?php if ( have_posts() ) : ?>
	
	<?php $get_layout = empty($cat_layout) ? $blog_layout : $cat_layout; ?>
	
	<?php if($get_layout == 'classic') : ?>
		
		<?php get_template_part( 'templates/journal/journal-list-classic' ); ?>
		
	<?php else: ?>
		
		<?php get_template_part( 'templates/journal/journal-list' ); ?>
		
	<?php endif; ?>
	
<?php else : ?>

	<?php get_template_part( 'templates/content/content', 'none' ); ?>

<?php endif; ?>
