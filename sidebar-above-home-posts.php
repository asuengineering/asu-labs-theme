<?php

/**
 * The sidebar containing the widget area that exists above the listing of posts for is_home().
 *
 * @package asufaculty
 */

if ( ! is_active_sidebar( 'above-home-posts' ) ) {
	return;
}
?>

<section id="above-posts" class="widget-area">
	<?php dynamic_sidebar( 'above-home-posts' ); ?>
</section><!-- #secondary -->
