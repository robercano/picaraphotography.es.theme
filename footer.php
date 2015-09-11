<?php
/**
 * The template for displaying the footer.
 *
 * @package trend
 */
?>

<footer id="footer">
	
	<!-- social icons -->
	<?php Bw::go_social(); ?>
	
	<p class="copy">
		<?php $ot_footer_text = ot_get_option( 'footer_text' ); ?>
		<?php echo $ot_footer_text; ?>
	</p>
	
	<?php $disable_sidebar = Bw::get_option( 'disable_sidebar', false ); ?>
	
	<?php if(!$disable_sidebar): ?>
	<a href="#" id="toggle-sidebar">
		<i class="fa fa-bars"></i>
	</a>
	<?php endif; ?>
	
</footer>

<?php wp_footer(); ?>

</body>
</html>