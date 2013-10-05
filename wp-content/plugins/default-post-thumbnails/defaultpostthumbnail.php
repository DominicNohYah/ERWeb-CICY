<?php
/*
Plugin Name: Default post thumbnail
Plugin URI: http://onlinevortex.com/projects/default-postthumbnails/
Description: Display a default thumbnail for posts with no specific thumbnail set
Version: 0.9
Author: Carlos Mendoza
Author URI: http://onlinevortex.com/

Copyright 2010 Carlos Mendoza (cmendoza@onlinevortex.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// register options
add_action('admin_init', 'defaultpostthumbnail_options_init' );
function defaultpostthumbnail_options_init(){
    register_setting( 'defaultpostthumbnail_options', 'defaultpostthumbnail' );
    $path = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__));
    wp_register_style('defaultpostthumbnailstyle', $path.'/defaultpostthumbnail.css');
}
 
// Add menu page
add_action('admin_menu', 'defaultpostthumbnail_add_page');
function defaultpostthumbnail_add_page() {
    $page = add_options_page('Default post thumbnail Options', 'Default Post Thumbnail', 'manage_options', 'defaultpostthumbnail', 'defaultpostthumbnail_options');
    add_action('admin_print_styles-' . $page, 'defaultpostthumbnail_style');
}

function defaultpostthumbnail_style() {
    wp_enqueue_style('defaultpostthumbnailstyle');
}
// Draw the menu page itself
function defaultpostthumbnail_options() {
    global $wpdb, $wp_query, $wp_locale;
	?>
	<div class="wrap">
	    <?php screen_icon(); ?>
		<h2>Default Post Thumbnail</h2>
<?php
    $_GET['post_mime_type'] = 'image';
    $_GET['paged'] = isset( $_GET['paged'] ) ? intval($_GET['paged']) : 0;
    if ( $_GET['paged'] < 1 )
	    $_GET['paged'] = 1;
    $start = ( $_GET['paged'] - 1 ) * 10;
    if ( $start < 1 )
	    $start = 0;
    add_filter( 'post_limits', $limit_filter = create_function( '$a', "return 'LIMIT $start, 10';" ) );
    list($post_mime_types, $avail_post_mime_types) = wp_edit_attachments_query();
    $type_links = array();
    $_num_posts = (array) wp_count_attachments();
    $matches = wp_match_mime_types(array_keys($post_mime_types), array_keys($_num_posts));

if ( !function_exists('add_theme_support') ) {
    echo '<div id="message_theme_support" class="updated fade"><strong>This version of Wordpress does not support post thumbnails</strong></div>';
} else {
    if ( !current_theme_supports('post-thumbnails') ) {
	echo '<div id="message_theme_support" class="updated fade"><strong>Your theme does not have post thumbnails support enabled<strong></div>';
    }
}
?>
<div class="tablenav">

<?php
add_query_arg(array('posts_per_page'=>5,'paged'=>1, 'm'=>false));
$page_links = paginate_links( array(
	'base' => add_query_arg( 'paged', '%#%' ),
	'format' => '',
	'prev_text' => __('&laquo;'),
	'next_text' => __('&raquo;'),
	'total' => ceil($wp_query->found_posts / 10),
	'current' => $_GET['paged']
));
if ( $page_links )
	echo "<div class='tablenav-pages'>$page_links</div>";
?>
</div>
		<form method="post" action="options.php">
			<?php settings_fields('defaultpostthumbnail_options'); ?>
			<?php $defaultpostthumbnailoptions = get_option('defaultpostthumbnail'); ?>

			<div id="thumb-items">
			<?php echo get_thumbnail_media_items(null, $errors, $defaultpostthumbnailoptions['defaultthumbnail']); ?>
			</div>
		
			<table class="form-table">
				<tr valign="top"><th scope="row">Current default thumbnail</th>
					<td>
					<?php
					if (is_array($defaultpostthumbnailoptions)) {
					    echo wp_get_attachment_image($defaultpostthumbnailoptions['defaultthumbnail'],array(100,100));
					} else {
					    echo "<p>Please select an image to use as default post thumbnail.</p>";
					}
					?>
					</td>
				</tr>
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
	<?php

}

/**
 * Retrieve HTML for media items of post gallery.
 *
 * Code adapted from the media library code to display the elements
 */
function get_thumbnail_media_items( $post_id, $errors, $selected_thumbnail ) {
	if ( $post_id ) {
		$post = get_post($post_id);
		if ( $post && $post->post_type == 'attachment' )
			$attachments = array($post->ID => $post);
		else
			$attachments = get_children( array( 'post_parent' => $post_id, 'post_type' => 'attachment', 'orderby' => 'menu_order ASC, ID', 'order' => 'DESC') );
	} else {
		if ( is_array($GLOBALS['wp_the_query']->posts) )
			foreach ( $GLOBALS['wp_the_query']->posts as $attachment )
				$attachments[$attachment->ID] = $attachment;
	}

	$output = '';
	foreach ( (array) $attachments as $id => $attachment ) {
		if ( $attachment->post_status == 'trash' )
			continue;
		if ( $item = get_thumb_item( $id, $selected_thumbnail, array( 'errors' => isset($errors[$id]) ? $errors[$id] : null),  $selected_thumbnail ) )
    if ( intval($selected_thumbnail) == intval($id)) {
	$thumb_class = "default_thumb_selected";
    } else {
	$thumb_class = "";
    }
			$output .= "\n<div id='media-item-$id' class='media-thumb child-of-$attachment->post_parent $thumb_class'>$item\n</div>";
	}

	return $output;
}

function get_thumb_item ( $attachment_id, $selected_thumbnail, $args = null ) {
    if ( ( $attachment_id = intval($attachment_id) ) && $thumb_url = get_attachment_icon_src( $attachment_id ) ) {
	$thumb_url = $thumb_url[0];
    } else {
	return false;
    }

    $default_args = array( 'errors' => null, 'send' => true, 'delete' => true, 'toggle' => true, 'show_title' => true );
    $args = wp_parse_args( $args, $default_args );
    extract( $args, EXTR_SKIP );
    $post = get_post($attachment_id);

    $filename = basename($post->guid);
    if ( intval($selected_thumbnail) == intval($attachment_id)) {
	$checked_thumbnail = "checked='checked'";
    } else {
	$checked_thumbnail = "";
    }
    $thumb_radio = "<input type='radio' name='defaultpostthumbnail[defaultthumbnail]' id='thumbnail-$attachment_id' value='$attachment_id' $checked_thumbnail>";
    $item = "<div class='default_thumb new'>".wp_get_attachment_image($attachment_id,array(80,80))."</div>".$thumb_radio;

return $item;
}

function display_default_thumbnail($content) {
    global $post;
    $default_thumb = get_option('defaultpostthumbnail');
    $thumbnail_id = get_post_meta( $post->ID, '_thumbnail_id', true );
    if (!$thumbnail_id) {
	$thumbnail_html = wp_get_attachment_image( $default_thumb[defaultthumbnail], array(254,226) );
	$thumbnail_html .= "<p>Esta es la imagen por defecto de la portada del artículo</p>";
    }
    return $content.$thumbnail_html;
}
add_filter('admin_post_thumbnail_html', 'display_default_thumbnail');

function display_default_post_thumbnail($thumbnail_code/*, $size = 'thumbnail'*/) {
    $size = apply_filters( 'post_thumbnail_size',  array(254,226) );
    if (!$thumbnail_code) {
	$default_thumb = get_option('defaultpostthumbnail');
	do_action( 'begin_fetch_post_thumbnail_html', $post_id, $post_thumbnail_id, $size ); // for "Just In Time" filtering of all of wp_get_attachment_image()'s filters
	$thumbnail_code = wp_get_attachment_image( $default_thumb[defaultthumbnail], $size, false, $attr );
	do_action( 'end_fetch_post_thumbnail_html', $post_id, $post_thumbnail_id, $size );
    }
    return $thumbnail_code;
}
add_filter('post_thumbnail_html','display_default_post_thumbnail');

?>
