<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'likethebootstrap' ); ?></h1>
		<?php if ( is_search() ): ?>
		<p><?php _e( 'Sorry, nothing matched your search. Please search again with different criteria.', 'likethebootstrap' ); ?></p>
		<?php get_search_form();
		else: ?>
		<p><?php _e( 'Apologies, no results were found. Perhaps searching will help find a related post.', 'likethebootstrap' ); ?></p>
		<?php get_search_form();
		endif;?>
	</div><!-- .entry-content -->
<article>