<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">

		<?php if ( has_post_thumbnail() ) { ?>
			<figure><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('', array( 'class' => 'img-responsive' ) ); ?></a></figure> 
		<?php } ?> 
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<p class="metadata"><?php likethebootstrap_entry_meta(); ?></p>

		<?php the_content(); ?>

			<?php if ( has_category() ) { ?>
				<p class="metadata category"><i class="fa fa-folder" aria-hidden="true"></i><?php the_terms( $post->ID, 'category', '', ', ' ); ?></p>
			<?php } ?> 
			<?php if ( has_tag() ) { ?>
				<p class="metadata tag"><i class="fa fa-tag" aria-hidden="true"></i><?php the_tags('', ', ', ''); ?></p>
			<?php } ?>
		
	</div><!-- .entry-content -->
</article>