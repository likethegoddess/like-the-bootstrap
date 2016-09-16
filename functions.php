<?php 

// De-register, register, and enqueue jQuery and Bootstrap
function likethebootstrap_scripts() {
	wp_deregister_script('jquery');
	wp_register_script( 'jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, null );
  wp_enqueue_script( 'jquery' );
	wp_deregister_script('bootstrap');
	wp_register_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.js', array( 'jquery' ) );
	wp_enqueue_script( 'bootstrap' );
}
add_action( 'wp_enqueue_scripts', 'likethebootstrap_scripts' );

/* Add theme support */
function likethebootstrap_theme_support() {
	
	/* Add post thumbnail support */
	add_theme_support('post-thumbnails');
	/* set_post_thumbnail_size(150, 150, false); */

	/* add featured image size */
	add_image_size( 'featured', 768, 432, array( 'center', 'top' ) );

	/* Add feed links */ 
	add_theme_support('automatic-feed-links');

	/* Add post formats supports */
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

	/* Register custom navigation walker */
	require_once('inc/wp_bootstrap_navwalker.php');
	require_once('inc/wp_bootstrap_navwalker_2.php');

	/* Add menus support  */
	add_theme_support('menus');
	register_nav_menus(array(
			'primary' => __('Primary Navigation', 'like-the-bootstrap'),
			'secondary' => __('Secondary Navigation', 'like-the-bootstrap'),
			'utility' => __('Utility Navigation', 'like-the-bootstrap')
	));
	
}
add_action('after_setup_theme', 'likethebootstrap_theme_support'); 

/* Return entry meta information for posts, used by multiple loops. */ 
if(!function_exists('likethebootstrap_entry_meta')) :
	function likethebootstrap_entry_meta() {
		printf('<i class="fa fa-user" aria-hidden="true"></i>');
		echo '<span class="byline">'. ' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author">'. get_the_author() .'</a></span>';
		printf('<i class="fa fa-calendar" aria-hidden="true"></i>');
		echo '<span class="updated" datetime="'. get_the_time('c') .'"><a href="'. get_permalink() . '">' . get_the_time('F jS, Y') .'</a></span>';
	}
endif;

/* Register sidebars */
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
				'name' => __( 'Sidebar', 'like-the-bootstrap' ),
				'id' => 'sidebar',
        'before_widget' => '<article id="%1$s" class="panel widget %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
				'name' => __( 'Footer', 'like-the-bootstrap' ),
				'id' => 'footer',
        'before_widget' => '<div class="col-sm-12 col-md-3"><article id="%1$s" class="panel widget %2$s">',
        'after_widget' => '</article></div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

// Add space to display admin menu when user is logged in
function my_admin_css() {
	if ( is_user_logged_in() ) {
	?>
	<style type="text/css">
		body { padding-top: 0; }
		.navbar-fixed-top { position: relative!important; }
	</style>
	<?php }
}
add_action('wp_head', 'my_admin_css');
 
// Adds custom admin footer
add_filter('admin_footer_text', 'remove_footer_admin'); 
	function remove_footer_admin () {
	echo 'Thank you for creating with <a href="https://wordpress.org/">WordPress</a> and <a href="http://www.likethebootstrap.com">Like the Bootstrap</a>.' ;
} 

// Limit the length of the article excerpt to 20 words
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Change excerpt more string and make a post permalink
function new_excerpt_more( $more ) {
  global $post;
  return '&nbsp;&nbsp;&nbsp;<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Continue&nbsp;reading', 'like-the-bootstrap') . '&rarr;</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

?>