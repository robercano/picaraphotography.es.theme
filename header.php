<?php get_template_part( 'templates/header/head' ); ?>

<body <?php body_class( Bw::body_class() ); ?>>

<?php

$disable_header_footer = ot_get_option('disable_header_footer');
$body_class = (isset($disable_header_footer[0]) && $disable_header_footer[0] == 1) ? 'no-init' : 'init';

$ot_deactivate_djax = ot_get_option('deactivate_djax');
if(isset($ot_deactivate_djax[0]) && $ot_deactivate_djax[0] == 1) { $body_class .= ' no-djax'; }

?>

<?php if( Bw::get_option( 'disable_ajax_loading' ) ): ?>
<span id="preloader">
	<span class="animation-holder">
		<span class="top"></span>
		<span class="right"></span>
		<span class="bottom"></span>
		<span class="left"></span>
	</span>
</span>
<?php endif; ?>

<?php if(Bw::get_option('image_copyright')): ?>
<span id="image-copyright"><?php Bw::the_option('image_protection_notification', 'Hey, this photo is &copy;'); ?></span>
<?php endif; ?>

<header id="header" <?php if(is_admin_bar_showing()) echo 'class="admin-bar"'; ?>>
	
	<div class="header-part-left">
		<?php $ot_logo = ot_get_option( 'logo' ); ?>
		<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php if(!empty($ot_logo)): ?>
			<img src="<?php echo ot_get_option( 'logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
			<?php else: ?>
			<h1><?php bloginfo( 'name' ); ?></h1>
			<?php endif; ?>
		</a>
		
		<a id="toggle-nav" href="#"></a>
		
		<nav id="navigation">
			<?php
			if(has_nav_menu('primary')) {
				wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => '__return_false' ) );
			}else{
				echo '<p>Please select a menu from Appearance > Menus.</p>';
			}
			?>
		</nav>
		
		<nav id="navigation-mobile">
			<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'fallback_cb' => '__return_false' ) ); ?>
		</nav>
		
	</div>
	
	<?php
	
	$hide_title = false;
	
	if(isset($_GET['image']) and (int)$_GET['image'] > 0) {
		$hide_title = get_field('hide_title', $_GET['image']);
	}
	
	if(!$hide_title):
		$is_rail = false;
		$close_url = false;
		$term = get_the_terms((isset($post->ID) ? get_the_ID() : 0), 'gallery');
		if(get_post_type() == 'bw_gallery' ) {
			$gallery_type = Bw::get_meta('gallery_layout', get_the_ID());
			if($gallery_type !== 'gallery-isotope-mixed' and $gallery_type !== 'gallery-isotope' and $gallery_type !== 'gallery-isotope-space' and !isset($_GET['image'])) {
				$is_rail = true;
			}
		}
		
		if(get_post_type() == 'bw_gallery' and isset($_GET['image'])) {
			$close_url = get_permalink(get_the_ID());
		}
		
		?>
		<div class="header-part-right djax-dynamic <?php if(!$close_url) { echo 'nopadd'; }?>">
			
			<?php if( have_posts() and !Bw::get_meta('hide_title') and !is_front_page() and !is_archive() and !$is_rail): ?>
				<h1><?php
				
				if(is_tax('gallery')) {
					single_cat_title();
				}elseif(isset($_GET['image'])) {
					if( !Bw::get_option( 'hide_single_image_titles' ) ) {
						$attachment = get_post( (int)$_GET['image'] );
						echo $attachment->post_title;
					}
				}else{
					the_title();
				}
				
				?></h1>
			<?php endif; ?>
			
			<?php if($close_url): ?>
			<a class="close" href="<?php echo $close_url; ?>">
				<div class="circle-button round black">
					<div class="point">
						<span class="hor"></span>
						<span class="ver"></span>
					</div>
				</div>
			</a>
			<?php endif; ?>
			
		</div>
		
	<?php endif; ?>
	
</header>