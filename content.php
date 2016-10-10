<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) { ?>
			<figure><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('', array( 'class' => 'img-responsive' ) ); ?></a></figure> 
		<?php } ?> 
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	</header><!--entry-header -->

	<div class="entry-content">
		<?php if ( is_home() || is_archive() || is_search() ) { ?>	
			<?php the_excerpt(); ?>
		<?php } else { ?>		
			<?php the_content(); ?>
		<?php } ?>		
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

</article>