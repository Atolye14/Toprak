<?php
//Use Google JS Library
if( !is_admin()){
   wp_deregister_script('jquery'); 
   wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"), false, '1.5.0'); 
   wp_enqueue_script('jquery');
}

//Remove WordPress Version For Security Reasons
remove_action('wp_head', 'wp_generator');

//Activate post-image functionality (WP 2.9+)
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

// featured image sizes
if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'full-size',  9999, 9999, false );
add_image_size( 'post-image',  280, 190, true );
add_image_size( 'related-posts',  130, 100, true );
}


// Register Navigation Menus
register_nav_menus(
	array(
	'primary'=>__('Primary Menu'),
	)
);
/// add home link to menu
function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );
// menu fallback
function default_menu() {
	require_once (TEMPLATEPATH . '/includes/default-menu.php');
}

//Add Pagination Support
include('functions/pagination.php');

//Include Theme Options
include ('function_options.php');

//Photo Gallery Shortcode
function photos( $atts, $content = null) {
   $content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
	$content = substr( $content, 4, strlen( $content ) - 7 );
return '
<ul class="photo_gallery">
' . $content . '
</ul>
';
}
add_shortcode('photos', 'photos');

function img($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => 'http://'
	), $atts));
	return '<li><a class="thumb" href="'.$url.'" name="'.$content.'" title="'.$content.'"><img src="http://www.aoclarkejr.com/myphoto/wp-content/themes/MyPhoto/timthumb/timthumb.php?src='.$url.'&amp;h=75&amp;w=75" alt="'.$content.'" /></a></li>';
}
add_shortcode("img", "img");
?>