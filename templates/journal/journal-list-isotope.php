<div class="isotope-holder bw--isotope scale--out">
	<div class="isotope isotope-mixed element-space blog">
		
		<?php while (have_posts()):
			
			the_post();
			
			switch(get_post_format()) {
				case('gallery'):
					$post_type_icon = 'dashicons-format-gallery';
					break;
				case('link'):
					$post_type_icon = 'dashicons-admin-links';
					break;
				case('image'):
					$post_type_icon = 'dashicons-format-image';
					break;
				case('quote'):
					$post_type_icon = 'dashicons-format-quote';
					break;
				case('video'):
					$post_type_icon = 'dashicons-video-alt';
					break;
				default:
					$post_type_icon = 'dashicons-menu';
			}
			
			?>
			
			<div class="isotope-item item-h2">
				
					<div class="element">
						
						<?php $gallery = get_post_meta( get_the_ID(), 'gallery', true ); ?>
						<?php if(is_array($gallery)): ?>
						<div class="post-gallery">
							<?php ?>
							<?php foreach($gallery as $key => $item): ?>
								<?php $thumb_424w = wp_get_attachment_image_src( custom_get_attachment_id( $item['gallery_item'] ), 'thumb_424x500' ); ?>
								<div class="post-gallery-item">
									<img class="lazyOwl"
										src="<?php Bw::the_empty_img(); ?>"
										data-src="<?php echo $thumb_424w[0]; ?>"
									>
								</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
						
						<?php if(get_post_format() == 'video'): ?>
							<?php echo get_post_meta( get_the_ID(), 'embed_code', true ); ?>
						<?php endif; ?>
						
						<?php if(has_post_thumbnail() and get_post_format() == 'image') the_post_thumbnail('thumb_424w'); ?>
						
						
						<div class="post-type">
							<i class="round dashicons <?php echo $post_type_icon; ?>"></i>
						</div>
						<div class="box">
							<strong class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
							<p>
								<?php if(get_post_format() == 'quote'): ?>
								<?php echo '<p>' . wp_trim_words( get_post_meta( get_the_ID(), 'quote_content', true ), $num_words = 15, $more = null ) . '</p>'; ?>
								<?php else: ?>
								<?php the_excerpt(); ?>
								<?php endif; ?>
							</p>
							<?php if(get_post_format() == 'quote') { echo '<p class="author">' . get_post_meta( get_the_ID(), 'quote_author', true ) . '</p>'; } ?>
							<span><?php the_time(get_option('date_format')); echo ' ' . __('in', 'trend') . ' '; the_category(', '); ?></span>
						</div>
					</div>
				
				
			</div>
			
		<?php endwhile; ?>
		
	</div>
</div>