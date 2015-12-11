<?php

/**
 * Bad Weather Framework Initiation, load bootstrap
 */

require get_template_directory() . '/bw/bootstrap.php';

function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');

function fb_opengraph() {
    global $post;
 
    if(is_single()) {

        // Image post
        if(isset($_GET['image']) and !empty($_GET['image'])) {
            $attachment_id = (int)$_GET['image'];
            if( !Bw::get_option( 'hide_single_image_titles' ) ) { 
                $attachment = get_post( (int)$_GET['image'] );
            }
            $full_background = get_field('image_display', $attachment_id);
            $img_src = wp_get_attachment_image_src( $attachment_id, 'large' );
            if($excerpt = $post->post_excerpt) {
                $excerpt = strip_tags($post->post_excerpt);
                $excerpt = str_replace("", "'", $excerpt);
            } else {
                $excerpt = get_bloginfo('description');
            }
?>

<!-- Twitter cards tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@PatriciaCanoRdz">
<meta name="twitter:creator" content="@PatriciaCanoRdz">
<meta name="twitter:title" content="<?php echo $attachment->post_title; ?>">
<meta name="twitter:description" content="<?php echo the_title(); ?>">
<meta name="twitter:image" content="<?php echo $img_src[0]; ?>">
<meta name="twitter:image:width" content="<?php echo $img_src[1]; ?>">
<meta name="twitter:image:height" content="<?php echo $img_src[2]; ?>">
 
<!-- Open graph tags -->
<meta property="og:title" content="<?php echo $attachment->post_title; ?>"/>
<meta property="og:description" content="<?php echo the_title(); ?>"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content="<?php echo the_permalink() . '?image=' . $attachment_id; ?>"/>
<meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
<meta property="og:image" content="<?php echo $img_src[0]; ?>"/>

<?php
        }
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);

?>
