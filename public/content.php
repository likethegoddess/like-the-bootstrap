<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php if ( has_post_thumbnail() && !is_page() ) { ?>
			<figure><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('', array( 'class' => 'img-responsive' ) ); ?></a></figure> 
		<?php } ?> 
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php if ( is_single() ) { ?>	
			<div class="metadata"><?php likethebootstrap_entry_meta(); ?></div>	
		<?php } ?>		
		<?php if ( is_home() ) { ?>	
			<?php the_excerpt(); ?>
		<?php } else { ?>		
			<?php the_content(); ?>
		<?php } ?>		
	</div><!-- entry-content -->
</article>