<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package trend
 */

?>

<div id="page-404" class="search">
	
	<div class="subtitle"><?php echo __('Doh, Nothing was found!', 'trend'); ?></div>
	
	<?php // get_search_form(); ?>
	
	<form action="<?php echo home_url( '/' ); ?>" class="search-form" method="get" role="search" id="searchform" autocomplete="off">
		<label>
			<span class="screen-reader-text">Search for:</span>
			<input type="search" title="Search for:" name="s" value="" id="search" placeholder="Search …" class="search-field">
			<input type="submit" class="search-submit" >
		</label>
		<a href="#" id="search-submit"></a>
	</form>
	
</div>