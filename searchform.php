<?php
/**
 * Template for displaying search forms from Twenty Sixteen
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><?php echo _x( 'Search', 'submit button', 'likethebootstrap' ); ?></button>
</form>
