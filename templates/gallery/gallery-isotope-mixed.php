<div class="isotope-holder bw--isotope scale--out">
	<div class="isotope white padding isotope-mixed element-big-space">
		
		<?php foreach(Bw::gallerize_by_id( Bw::get_meta('bw_gallery'), 'thumb_424w' ) as $image): ?>
			
			<div class="isotope-item item-h2">
				<a class="element" href="<?php echo add_query_arg( array( 'image' => $image['id'] ), get_permalink() ) ?>" style="height:<?php echo $image['thumb'][2]; ?>px;background: transparent url('<?php echo $image['thumb'][0] ?>') no-repeat 50% 50%; background-size:cover;-moz-background-size:cover;-webkit-background-size:cover;">
					<span class="over"></span>
				</a>
				<span class="plus hor"></span>
				<span class="plus ver"></span>
			</div>
			
		<?php endforeach; ?>
		
	</div>
</div>