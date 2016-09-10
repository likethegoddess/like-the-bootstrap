<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-content">
	<h1 class="page-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>	
	<?php the_content(); ?>
</div><!-- .entry-content -->
</article>