<?php
/*
Template Name: Sitemap
*/

get_header();

$wrap_page = get_post_meta( get_the_ID(), 'wrap_page', true );

?>

<div id="wrapper">
	
	<!-- dynamic content -->
	<div id="container" class="djax-dynamic">
		<div class="scale--both bw--page sitemap">
			
			<?php if($wrap_page) { echo '<div class="page-content">'; } ?>
			
			<div class="page-full-wrap top-65 white">
				
				
				
				<div class="col span_6 col_last">
					<!--h2 id="posts">Posts</h2-->
					<ul>
					<?php
					// Add categories you'd like to exclude in the exclude here
					$cats = get_categories('exclude=');
					foreach ($cats as $cat) {
						
						echo "<li class='no-style'><h3>".$cat->cat_name."</h3>";
						echo "<ol>";
						
						query_posts('posts_per_page=5&cat='.$cat->cat_ID);
						
						while(have_posts()) {
							
							the_post();
							$category = get_the_category();
							
							if ($category[0]->cat_ID == $cat->cat_ID) {
								echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
							}
						}
						
						echo "</ol>";
						echo "</li>";
					}
					?>
					</ul>
				</div>
				
				<div class="col span_6">
					<h3 id="authors">Authors</h3>
					<ul>
					<?php 
					wp_list_authors(array(
						'exclude_admin' => false,
						)
					);
					?>
					</ul>

					<h3 id="pages">Pages</h3>
					<ul>
					<?php
					wp_list_pages(array(
							'exclude' => '',
							'title_li' => '',
						)
					);
					?>
					</ul>
				</div>
			</div>
			
			<?php if($wrap_page) { echo '</div>'; } ?>
			
		</div>
	</div>
	
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>