<div id="rail" class="bw--rail">
	
	<div class="rail-title">
		<h1><?php echo get_the_title(); ?></h1>
	</div>
	
	<ul class="rail-content">
	
		<?php foreach(Bw::gallerize_by_id( Bw::get_meta('bw_gallery'), 'thumb_515h' ) as $image): ?>
			
			<li>
				<div class="item">
					<a href="<?php echo add_query_arg( array( 'image' => $image['id'] ), get_permalink() ); ?>">
						<img src="<?php echo $image['thumb'][0] ?>" alt="<?php echo $image['title'] ?>">
						<span class="over"></span>
					</a>
					<span class="plus hor"></span>
					<span class="plus ver"></span>
				</div>
			</li>
			
		<?php endforeach; ?>
		
	</ul>
	
	<?php
	$detect = new Mobile_Detect;
	if ( $detect->isMobile() ) : ?>
	<div class="mobile-rail">
		<span class="slide slide-left"><i class="fa fa-chevron-left"></i></span>
		<span class="slide slide-right"><i class="fa fa-chevron-right"></i></span>
	</div>
	<?php endif; ?>
	
</div>