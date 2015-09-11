<div class="bw-comments">
	<?php if ( have_comments() ) : ?>
	<h2 class="comments-title">
		<?php
			printf( _nx( '%1$s comment', '%1$s comments', get_comments_number(), 'comments title', 'trend' ),
				number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
		?>
	</h2>
	<?php endif; ?>
	
	<div class="post-content">
		<?php $comment_type = get_post_meta( get_the_ID(), 'comment_type', true ); ?>
		<?php if( $comment_type == 'facebook' ): ?>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=643096935716744";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-comments" data-width="840" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="10" data-colorscheme="light"></div>
		<?php elseif( $comment_type == 'none' ): ?>
		<?php else: ?>
			<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
				<div class="post-comments">
				<?php comments_template(); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		
	</div>
</div>