<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package trend
 */

$left_part_image = get_field( 'left_part_image' );

$wrap_page = get_post_meta( get_the_ID(), 'page_layout', true );

$left_part_image_src = $left_part_image['url'];

if(empty($left_part_image_src)) {
	$left_part_image_src = Bw::empty_img('1920x1080');
}

?>

<div class="scale--both bw--page bw--scroll <?php if($left_part_image) { echo 'bw--left-part-page'; } ?>">
	
	<?php if($wrap_page == 'right') { echo '<div class="page-content">'; } ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php if($left_part_image): ?>
				
				<div id="left-part-page">
					<div class="image">
						<img src="<?php echo $left_part_image_src; ?>" alt="">
					</div>
					<div class="right-content scroll-content">
						<?php the_content(); ?>
					</div>
				</div>
				
			<?php else: ?>
				
				<div class="page-full-wrap">
					<?php the_content(); ?>
				</div>
				
			<?php endif; ?>
			
		<?php if($wrap_page) { echo '</div>'; } ?>
	
	</div>
	
</div>
