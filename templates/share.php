
<?php $share_buttons_types = Bw::get_option('share_buttons_settings'); ?>

<div id="bw-share">
	<div class="bw-share-content">
		
		<!-- AddThis Button BEGIN -->
		<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
			<?php
				
				$share_buttons_types = preg_replace('/\s+/', '', $share_buttons_types);
				$buttons = explode(',',$share_buttons_types);
				$preferred_count = 0;
				$display_share_buttons = '';
				
				if (!empty($buttons)) {
					for ($k = 0; $k < count($buttons); $k++) {
						switch ($buttons[$k]) {
							case 'preferred':
								$preferred_count++;
								$display_share_buttons .= '<a class="addthis_button_'.$buttons[$k].'_'.$preferred_count.'"></a>';
								break;
							case 'more':
								$display_share_buttons .= '<a class="addthis_button_compact"></a>';
								break;
							case 'counter':
								$display_share_buttons .= '<a class="addthis_counter addthis_bubble_style"></a>';
								break;
							default :
								$display_share_buttons .= '<a class="addthis_button_'.$buttons[$k].'"></a>';
						}
					}
				}

				echo $display_share_buttons;
				
			?>
		</div>
		
		<script type="text/javascript">
			var addthis_config = {
				ui_click : false,
				ui_508_compliant : false,
				ui_use_css : true,
				data_track_addressbar : false,
				data_track_clickback : false
            };
            <?php
            $page_title = html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8');
            if(isset($_GET['image']) and !empty($_GET['image'])) {
                if( !Bw::get_option( 'hide_single_image_titles' ) ) { 
                    $attachment = get_post( (int)$_GET['image'] );
                }
        ?>
			addthis_share = {
				url : "<?php echo add_query_arg( array( 'image' => $_GET['image'] ), get_permalink() ); ?>",
				title : "<?php echo $page_title . ' - ' . $attachment->post_title; ?>",
                description : "<?php echo trim(strip_tags(get_the_excerpt())) ?>",
                passthrough : {
                    twitter : {
                        text: "<?php echo $page_title . ' - ' . $attachment->post_title; ?>"
                    }
                }
            };
        <?php } else { ?>
			addthis_share = {
				url : "<?php echo add_query_arg( array( 'image' => $_GET['image'] ), get_permalink() ); ?>",
				title : "<?php echo $page_title; ?>",
				description : "<?php echo trim(strip_tags(get_the_excerpt())) ?>"
            };
        <?php } ?>
		</script>
		<!-- AddThis Button END -->
		
	</div>
</div>
