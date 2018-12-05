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

	<div class="entry-content">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        <div class="citation">
			<?php echo apply_filters( 'the_content', carbon_get_the_post_meta('publication_citation') );?>
		</div>
        <div class="entry-meta">
            <?php echo get_the_term_list( $post->ID, 'research-theme', '<span><strong>Topic: </strong>', ', ' , '</span>'); ?>
            <span class="permalink"><a href="<?php the_permalink(); ?>">Details</a></span>
            <?php 
				if ( has_post_thumbnail() ) {
					$featured_img_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
					echo '<span class="attachment-link">';
					echo '<a href="'.$featured_img_url.'" target="_blank">Download</a>';
                    echo '</span>';
				}
			?>
        </div><!-- .entry-meta -->
	</div><!-- .entry-content -->

	<!-- <footer class="entry-footer"> -->
	<!-- </footer>.entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
