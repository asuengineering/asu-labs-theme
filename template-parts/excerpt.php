<?php

/**
 * Template part for displaying archive excerpts. Fall back template for more specific post-types.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package asufaculty
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php asufaculty_post_thumbnail(); ?>

    <div class="entry-content">
        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

        <?php the_excerpt(); ?>
        <div class="entry-meta">
            <?php
            asufaculty_posted_on();
            asufaculty_posted_by();
            // asufaculty_entry_footer();
            ?>
        </div><!-- .entry-meta -->
    </div><!-- .entry-content -->

    <!-- <footer class="entry-footer"> -->
    <!-- </footer>.entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->