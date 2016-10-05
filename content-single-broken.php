<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) { ?>
		<figure><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('', array( 'class' => 'img-responsive' ) ); ?></a></figure> 
	<?php } ?> 

	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	</header><!--entry-header -->

	<p class="metadata"><?php likethebootstrap_entry_meta(); ?></p>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!--entry-content -->
	
	<footer class="entry-footer">
		<?php if ( has_category() ) { ?>
			<p class="metadata category"><i class="fa fa-folder" aria-hidden="true"></i><?php the_terms( $post->ID, 'category', '', ', ' ); ?></p>
		<?php } ?> 
		<?php if ( has_tag() ) { ?>
			<p class="metadata tag"><i class="fa fa-tag" aria-hidden="true"></i><?php the_tags('', ', ', ''); ?></p>
		<?php } ?>
		<div class="next-previous-navigation">
			<span class="previous"><?php previous_post_link('&larr; %link'); ?></span>
			<span class="next"><?php next_post_link('%link &rarr;'); ?></span>
		</div>
		<?php edit_post_link(
				sprintf(
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'like-the-goddess' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->

	
	</div><!-- .entry-content -->
</article>