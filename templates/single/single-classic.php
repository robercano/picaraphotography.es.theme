<div id="journal-classic">
	<div class="page-medium-wrap">
		<ul>
			<li>
				<div class="item">
					
					<!--a class="page-title" href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a-->
					
					<span class="border"></span>
					<span class="info"><?php the_time(get_option('date_format')); echo ' / '; the_category(', '); ?></span>
					
					<!--a href="<?php the_permalink(); ?>"-->
						<?php
						if(has_post_thumbnail() and get_post_format() == 'image') {
							the_post_thumbnail('thumb_1000w');
						}elseif(!has_post_thumbnail() and get_post_format() == 'image') { ?>
							<img class="img" src="<?php Bw::the_empty_img('770x515'); ?>" alt="no image">
						<?php } ?>
					<!--/a-->
					
					<?php if(get_post_format() == 'video'): ?>
						<?php echo get_post_meta( get_the_ID(), 'embed_code', true ); ?>
					<?php endif; ?>
					
					<?php if(get_post_format() == 'gallery'): ?>
					<?php $gallery = get_post_meta( get_the_ID(), 'gallery', true ); ?>
					<?php if(is_array($gallery)): ?>
					<div class="post-gallery">
						<?php ?>
						<?php foreach($gallery as $key => $item): ?>
							<?php $thumb_1920x1080 = wp_get_attachment_image_src( custom_get_attachment_id( $item['gallery_item'] ), 'thumb_1920x1080' ); ?>
							<div class="post-gallery-item">
								<img class="lazyOwl"
									src="<?php Bw::the_empty_img(); ?>"
									data-src="<?php echo $thumb_1920x1080[0]; ?>"
								>
							</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					<?php endif; ?>
					
					<div class="the-content">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
						<?php the_tags(); ?>
						<!--?php get_template_part( 'templates/related-articles' ); ?-->
						<?php get_template_part( 'templates/comments' ); ?>
					</div>
					
				</div>
			</li>
		</ul>
	</div>
</div>
