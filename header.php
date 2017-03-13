<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="<?php echo esc_url( get_stylesheet_directory_uri() );?>/style.min.css" rel="stylesheet">

    <!-- HTML5 shim, adds IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

		<script src="https://use.fontawesome.com/6a77217615.js"></script>
		<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
    <?php wp_head(); ?>
  </head>
	<body <?php body_class(); ?>>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
        <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
			</div>
			<?php
				wp_nav_menu( array(
					'menu'              => 'primary',
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'primary-navbar-collapse',
					'menu_class'        => 'nav navbar-nav',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker())
				);
			?>
    </div>
	</nav>
<?php if ( has_post_thumbnail() && is_page() ) { ?>
	<div class="cover"> 
		<figure><?php the_post_thumbnail('full', array( 'class' => 'img-responsive' ) ); ?></figure> 
  </div>
<?php } ?>	
  <div class="container <?php if ( !has_post_thumbnail() && is_page() ) { ?>no-cover<?php } ?>">