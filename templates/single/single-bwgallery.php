<?php
/**
 * @package trend
 */

$bw_image_id = isset($_GET['image']) ? (int)$_GET['image'] : 0;

if(empty($bw_image_id)) {
	$choose_image = get_field('choose_image');
	$bw_image_id = $choose_image->ID;
}

$attachment_id = $bw_image_id;

$parent_post_id = !empty($bw_image_id) ? get_the_ID() : 0;

$bw_query = get_posts(array(
	'post_type' => 'attachment',
	'p' => $attachment_id
));

$full_background = get_field('image_display', $attachment_id);
$hide_navigation = get_field('hide_navigation', $attachment_id);
$black_bg = get_field('use_black_background', $attachment_id);
$embed_code = get_field('embed_code', $attachment_id);
$auth_name = get_field( 'auth_name', $attachment_id );
$auth_url  = get_field( 'auth_url', $attachment_id );
$enable_cover = get_field('enable_cover', $attachment_id);

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('bw--gallery scale--both overflow'); ?>>
	
	<?php $style = ''; ?>
	
	<div id="gallery">
		
		<div class="gallery-holder <?php if($black_bg) { echo 'black'; } ?>">
			
			<?php if ( !empty( $embed_code ) ) : ?>
				
				<?php echo $embed_code; ?>
				
			<?php else: ?>
				
				<?php
				
				foreach($bw_query as $post) {
                    
                    setup_postdata($post);
					//$thumb_size = ($full_background == 'full') ? 'thumb_1920x1080' : 'thumb_1920x1080_false';
					//echo wp_get_attachment_image(get_the_ID(), $thumb_size, false, array('class' => ( $full_background == 'full' ? 'full' : 'fit' ) ) );
					
				}
                
                $thumb_size = ($full_background == 'full') ? 'thumb_1920x1080' : 'thumb_1920x1080_false';
				$img_src = wp_get_attachment_image_src( $attachment_id, $thumb_size );
                echo "<img class='" . ( $full_background == 'full' ? 'full' : 'fit' ) . "' src='{$img_src[0]}' alt=''>";
				
				?>
				
				<?php if($enable_cover): ?>
				
				<?php
				
				$cover_text_top 	= get_post_meta( $attachment_id, 'cover_text_top', true );
				$cover_text_center 	= get_post_meta( $attachment_id, 'cover_text_center', true );
				$cover_text_bottom 	= get_post_meta( $attachment_id, 'cover_text_bottom', true );
				$cover_color 		= get_post_meta( $attachment_id, 'cover_color', true );
				if(empty($cover_color)) { $cover_color = '#000'; }
				?>
				
				<div id="cover">
					
					<div class="cover-top" style="color:<?php echo $cover_color; ?>"><?php echo $cover_text_top; ?></div>
					
					<span class="border-top" style="background-color:<?php echo $cover_color; ?>"></span>
					
					<div class="cover-center">
						<?php foreach(explode(' ', $cover_text_center) as $word): ?>
							<span style="color:<?php echo $cover_color; ?>"><?php echo $word; ?></span>
						<?php endforeach; ?>
					</div>
					
					<span class="border-bottom" style="background-color:<?php echo $cover_color; ?>"></span>
					
					<div class="cover-bottom" style="color:<?php echo $cover_color; ?>"><?php echo $cover_text_bottom; ?></div>
					
				</div>
				<?php endif; ?>
				
			<?php endif; ?>
			
		</div>
		
		<?php if ( ! $hide_navigation ) : ?>
			<?php Bw::trend_post_nav($parent_post_id); ?>
		<?php endif; ?>
		
		<?php if ( empty( $embed_code ) and !Bw::get_meta( 'hide_pattern', $attachment_id ) and !Bw::get_option( 'hide_pattern' ) ) : ?>
			<span id="pattern-full"></span>
		<?php endif; ?>
		
		<?php if( empty( $embed_code ) ): ?>
			<span class="full-overlay"></span>
		<?php endif; ?>
		
		<ul id="image-buttons">
			
			<?php
			$attachment = get_post( $attachment_id );
			$description = $attachment->post_content;
			?>
		
			<?php if($auth_name): ?>
			<li class="width-auto">
				<?php if($auth_url) { echo "<a href='{$auth_url}' target='_blank'>"; } ?>
				<?php echo "<span class='auth " . ((!$black_bg and $full_background !== 'full') ? 'black' : '') . "'>{$auth_name}</span>"; ?>
				<?php if($auth_url) { echo "</a>"; } ?>
			</li>
			<?php endif; ?>
			
			<?php if(!empty($description)): ?>
			<li class="icon">
				<a class="full-toggle info-toggle <?php if(!$black_bg and $full_background !== 'full' and get_post_format() !== 'video') { echo 'black'; } ?>" href="#">
					<i class="fa fa-info"></i>
				</a>
			</li>
			<?php endif; ?>
			
			<li class="icon">
				<a class="full-toggle expand <?php if(!$black_bg and $full_background !== 'full' and get_post_format() !== 'video') { echo 'black'; } ?>" href="#">
					<i class="fa fa-arrows-alt"></i>
				</a>
			</li>
			
			<?php if(Bw::get_option('enable_photo_sharing')): ?>
			<li class="icon share-bottom">
				<span class="full-toggle share <?php if(!$black_bg and $full_background !== 'full' and get_post_format() !== 'video') { echo 'black'; } ?>">
					<i class="fa fa-share-alt"></i>
					<?php get_template_part( 'templates/share' ); ?>
				</span>
			</li>
			<?php endif; ?>
			
		</ul>
		
		<?php if(!empty($description)): ?>
		<div class="info-content"><?php echo $description; ?></div>
		<?php endif; ?>
		
	</div>
	
</div>
