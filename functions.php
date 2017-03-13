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
	
	/* Add post title tag support */
	add_theme_support('title-tag');

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

	/* Add menus support  */
	add_theme_support('menus');
	register_nav_menus(array(
			'primary' => __('Primary Navigation', 'like-the-bootstrap'),
			'secondary' => __('Secondary Navigation', 'like-the-bootstrap'),
			'utility' => __('Utility Navigation', 'like-the-bootstrap')
	));
	
}
add_action('after_setup_theme', 'likethebootstrap_theme_support'); 

// sets max image width inserted into a post
if ( ! isset( $content_width ) )
 $content_width = 1140;

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
function like_the_bootstrap_sidebar_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'like-the-bootstrap' ),
        'id'            => 'sidebar',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'like-the-bootstrap' ),
        'before_widget' => '<article id="%1$s" class="panel widget %2$s">',
        'after_widget'  => '</article>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'like_the_bootstrap_sidebar_widgets_init' );

function like_the_bootstrap_footer_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer', 'like-the-bootstrap' ),
        'id'            => 'footer',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'like-the-bootstrap' ),
        'before_widget' => '<div class="col-sm-12 col-md-3"><article id="%1$s" class="panel widget %2$s">',
        'after_widget'  => '</article></div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'like_the_bootstrap_footer_widgets_init' );

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

if ( ! function_exists( 'likethebootstrap_comment' ) ) :
/**
 * Template for comments and pingbacks
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own bootstrapcanvaswp_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Bootstrap Canvas WP 1.0
 */
function likethebootstrap_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
	case 'pingback' :
	case 'trackback' :
	// Display trackbacks differently than normal comments.
  ?>
  <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
	<p><?php _e( 'Pingback:', 'like-the-bootstrap' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'like-the-bootstrap' ), '<span class="comment-meta edit-link"><i class="fa fa-pencil"></i> ', '</span>' ); ?></p>
  <?php
	break;
	default :
	// Proceed with normal comments.
	global $post;
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<article id="comment-<?php comment_ID(); ?>" class="comment">
      <header class="comment-meta comment-author vcard">
        <?php
            echo get_avatar( $comment, 44 );
            printf( ' <cite><b class="fn">%1$s</b> %2$s</cite>',
                get_comment_author_link(),
                // If current post author is also comment author, make it known visually.
                ( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'like-the-bootstrap' ) . '</span>' : ''
            );
            printf( '<i class="fa fa-calendar"></i> <a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                esc_url( get_comment_link( $comment->comment_ID ) ),
                get_comment_time( 'c' ),
                /* translators: 1: date, 2: time */
                sprintf( __( '%1$s at %2$s', 'like-the-bootstrap' ), get_comment_date(), get_comment_time() )
            );
        ?>
      </header><!-- .comment-meta -->

      <?php if ( '0' == $comment->comment_approved ) : ?>
        <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'like-the-bootstrap' ); ?></p>
      <?php endif; ?>

      <section class="comment-content comment">
        <?php comment_text(); ?>
        <?php edit_comment_link( __( 'Edit', 'like-the-bootstrap' ), '<p class="comment-meta edit-link"><i class="fa fa-pencil"></i> ', '</p>' ); ?>
      </section><!-- .comment-content -->

      <div class="reply">
		<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'like-the-bootstrap' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	  </div><!-- .reply -->
      <hr />
	</article><!-- #comment-## -->
<?php
    break;
  endswitch; // end comment_type check
}
endif;

?>