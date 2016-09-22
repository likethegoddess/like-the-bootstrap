<?php get_header(); ?>

<div class="row">
	<div class="col-sm-12 col-md-8" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content-single', get_post_format() ); ?>
		<?php endwhile; ?>		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; // end have_posts() check ?>
	</div><!-- .col -->

	<?php get_sidebar(); ?>
</div><!-- .row -->

<?php get_footer(); ?>