<?php
/**
 * @package trend
 */
?>

<div id="categorizr" class="bw--catz">
	<a href="#" id="quick-view" class="ctrz-button">
		<div class="circle-button round">
			<div class="point">
				<span class="hor"></span>
				<span class="ver"></span>
			</div>
		</div>
		<strong><?php echo __('Quick view', 'trend'); ?></strong>
	</a>
	<div class="nav-holder">
		<ul class="nav">
			
			<?php
			
			$args = array(
				'post_type' => 'bw_gallery',
				'post_status' => 'publish',
				'posts_per_page' => -1
			);
			
			$bw_query = new WP_Query($args);
			if( $bw_query->have_posts() ) {
				while ($bw_query->have_posts()) : $bw_query->the_post();
				
				$current_lang = get_query_var('lang', 'es_es');
				if(!Bw::get_meta('hide_gallery') && !Bw::get_meta('lang-' . $current_lang) && get_the_title() != 'Portada'): ?>
				
				<li class="category">

					<!-- rcano: cannot delete the <a> tag below as it breaks the quick view flow. Leave it empty -->
					<a class="title" href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
					
					<ul class="quick-view-gallery">

						<li>

							<?php foreach(Bw::gallerize_by_id( Bw::get_meta('bw_gallery'), 'thumb_110x65' ) as $key => $image): ?>
								
								<?php if( $key >= 15 ) { break; } ?>
								
								<a href="<?php echo add_query_arg( array( 'image' => $image['id'] ), get_permalink() ); ?>">
									<span class='img'>
										<img src="<?php echo $image['thumb'][0] ?>" alt="<?php echo $image['title'] ?>">
									</span>
									<span class="overr"></span>
									<span class="pluss horr"></span>
									<span class="pluss verr"></span>
								</a>
							<?php endforeach; ?>
						</li>
					</ul>
				</li>
					
				<?php endif; endwhile;
			}
			
			wp_reset_query(); ?>
			
		</ul>
	</div>
	
	<ul class="slider scale--both">
		
		<?php
		
		$authority = '';
		
		if( $bw_query->have_posts() ) { 
			while ($bw_query->have_posts()) { $bw_query->the_post();
				
				if(!Bw::get_meta('hide_gallery') && get_the_title() == 'Portada') {
					
					$gallery = Bw::gallerize_categorizr( Bw::get_meta('bw_gallery') );
					
					if( count($gallery) > 0 ) {
						foreach($gallery as $key => $image): $image_class = get_field('image_display', $image['id']); ?>
					
							<?php $black_bg = get_field('use_black_background', $image['id']); ?>
							
						<li><div class="item <?php if($black_bg) { echo 'black'; } ?>"><img class="<?php echo empty($image_class) ? 'fit' : $image_class; ?>" src="<?php echo (($image['image_display'] == 'full') ? $image['thumb_1920x1080'][0] : $image['thumb_1920x1080_false'][0]); ?>" alt="<?php echo $image['title'] ?>">
						<!-- Insert McCulling text -->
						<div class="main-page-text">
			 				<p class="main-page-paragraph">
							La fotografía no puede cambiar la realidad </p>
							<p class="main-page-paragraph">
							pero sí puede mostrarla</p>
							<p class="main-page-subtitle">
							(Fred McCullin)</p>
</div>	
							</div></li><?php
							
							$auth_name = get_field( 'auth_name', $image['id'] );
							$auth_url  = get_field( 'auth_url', $image['id'] );
							
							if($auth_name) {
								$authority .= "<li>";
								if($auth_url) { $authority .= "<a href='{$auth_url}' target='_blank'>"; }
								$authority .= "<span class='auth'>{$auth_name}</span>";
								if($auth_url) { $authority .= "</a>"; }
								$authority .= "</li>";
							}else{
								$authority .= "<li>&nbsp;</li>";
							}
							
						endforeach;
					}else{
						echo '<li><div class="item">';
						Bw::the_empty_img('1920x1080', 'full');
						echo '</div></li>';
					}
				
				}
			}
			wp_reset_query();
		}
		
		?>
		
	</ul>
	
	<ul class="author">
		<?php echo $authority; ?>
	</ul>
	
	<?php if( !Bw::get_option( 'hide_pattern' ) ): ?>
		<span id="pattern-full"></span>
	<?php endif; ?>
	
</div>
