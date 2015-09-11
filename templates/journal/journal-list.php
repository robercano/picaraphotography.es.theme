<div id="journal-list" class="bw--journal scale--out">
	<ul>
	<?php while ( have_posts() ) : the_post(); ?>
		<li>
			<div class="item">
				<a href="<?php the_permalink(); ?>">
					<div class="img">
						<?php
						if(has_post_thumbnail()) {
							the_post_thumbnail('thumb_424x500');
						}else{
							Bw::the_empty_img('424x500');
						}
						?>
					</div>
				</a>
				<div class="info">
					<a class="title" href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
					<?php the_excerpt(); ?>
					<span class="date"><?php the_time(get_option('date_format')); ?></span>
				</div>
			</div>
		</li>
	<?php endwhile; ?>
	</ul>
	<?php Bw::trend_paging_nav(); ?>
</div>
