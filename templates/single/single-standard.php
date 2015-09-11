<div id="post">
	
	<div class="image-full">
		
		<?php if(get_post_format() == 'video'): ?>
			<?php echo get_field( 'embed_code' ); ?>
		<?php else: ?>
			
			<?php
				if(has_post_thumbnail()) {
					$image_data = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thumb_1920x1080_false', true );
					$image = $image_data[0];
				}else{
					$image = Bw::empty_img('1920x1080');
				}
			?>
			
		<?php endif; ?>
		
		<?php if(isset($image)): ?><img class="full" src="<?php echo $image; ?>" alt=""><?php endif; ?>
		<?php if(get_post_format() !== 'video' and get_post_format() !== 'gallery'): ?><span id="pattern-full"></span><?php endif; ?>
		
		<?php if(get_post_format() !== 'video'): ?>
		<div class="info">
			<?php the_date(); ?>
			<?php the_category(); ?>
		</div>
		<?php endif; ?>
		
	</div>
	
	<div class="right scroll-content">
		
		<?php if(get_post_format() == 'quote'): ?>
		<blockquote>
			<?php echo get_post_meta( get_the_ID(), 'quote_content', true ); ?><br><br>
			<span class="quote-author">- <?php echo get_post_meta( get_the_ID(), 'quote_author', true ); ?></span>
		</blockquote>
		
		<?php endif; ?>
		
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
		<?php the_tags(); ?>
		<ul id="image-buttons">
			<li class="icon share-bottom">
				<span class="full-toggle share black" style="color: #000">
					<i class="fa fa-share-alt"></i>
					<?php get_template_part( 'templates/share' ); ?>
				</span>
			</li>
		</ul>
		<!--?php get_template_part( 'templates/related-articles' ); ?-->
		<?php get_template_part( 'templates/comments' ); ?>
		
	</div>
	
</div>
