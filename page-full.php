<?php 
/* 
Template name: Full Width
*/
get_header(); ?>

<div class="row">
	<div class="col-sm-12" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content-page', get_post_format() ); ?>
		<?php endwhile; ?>		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; // end have_posts() check ?>
	</div><!-- .col -->
</div><!-- .row -->
		
<?php get_footer(); ?>