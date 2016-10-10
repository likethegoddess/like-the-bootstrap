<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'like-the-bootstrap' ); ?></h1>
	</header><!--entry-header -->

	<div class="entry-content">
		<?php if ( is_search() ): ?>
		<p><?php _e( 'Sorry, nothing matched your search. Please search again with different criteria.', 'like-the-bootstrap' ); ?></p>
		<?php get_search_form();
		else: ?>
		<p><?php _e( 'Apologies, no results were found. Perhaps searching will help find a related post.', 'like-the-bootstrap' ); ?></p>
		<?php get_search_form();
		endif;?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link(
				sprintf(
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'like-the-bootstrap' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->

<article>