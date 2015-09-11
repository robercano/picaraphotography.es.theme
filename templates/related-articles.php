<?php
	
	$migh_like_cat = array();
	$cats = get_the_category();
	foreach($cats as $cat) {
		$migh_like_cat[] = $cat->slug;
	}
	
	$new_cats = (count($migh_like_cat) > 0) ? implode(",", $migh_like_cat) : '';
	
	$q = new WP_Query(
		array(
			'orderby' => 'rand',
			'posts_per_page' => 3,
			'category_name' => implode(",", $migh_like_cat),
			'post__not_in' => array(get_the_ID())
		)
	);
	
	$list  = '<div class="bw-also-like">';
	$list .= '<h3>' . __('You may also like', 'trend') . '</h3>';
	$list .= '<ul>';
	
	while($q->have_posts()) : $q->the_post();
	
		$first_category = get_the_category();
		$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail( get_the_ID(), 'thumb_424x500' ) : '<img src="' . Bw::empty_img('424x500') . '" alt="">';
		$title = get_the_title();
		
		$list .= "<li class='like-item'>
			<a class='image' href='" . get_permalink() . "'>
				{$thumbnail}
				<span class='over'></span>
				<span class='pluss horr'></span>
				<span class='pluss verr'></span>
			</a>
			<a class='title' href='" . get_permalink() . "'>{$title}</a>
		</li>";

	endwhile;

	wp_reset_query();

	echo $list . '</ul></div>';
	
?>