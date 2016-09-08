<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'the-bootstrap' ); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_search() ): ?>
		<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with different keyword.', 'ltgbootstrap' ); ?></p>
		<?php get_search_form();
		else: ?>
		<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'ltgbootstrap' ); ?></p>
		<?php get_search_form();
		endif;?>
	</div><!-- .entry-content -->
<article>