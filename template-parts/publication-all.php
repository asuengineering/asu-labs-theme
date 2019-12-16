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

	<header class="entry-header">
		<?php
			// Use the download URL if it's set. Otherwise link the image back to the entry for the publication.
		if ( ! empty( carbon_get_the_post_meta( 'publication_download' ) ) ) {
			$pdf_link = carbon_get_the_post_meta( 'publication_download' );
		} else {
			$pdf_link = esc_url( get_permalink() );
		}

			// Use the post thumbnail if there is one, or a placeholder image if not.
			echo '<div class="post-thumbnail">';
			echo '<a href="' . $pdf_link . '" target="_blank">';

		if ( has_post_thumbnail() ) {
			the_post_thumbnail( '', array( 'class' => 'pure-img outline' ) );
		} else {
			echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/document-placeholder.png"  class="pure-img wp-post-image" alt="report by Lil Squid from the Noun Project. See:https://thenounproject.com/term/report/149914">';
		}

			echo '</a></div>';
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<div class="citation">
			<?php echo apply_filters( 'the_content', carbon_get_the_post_meta( 'publication_citation' ) ); ?>
		</div>
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
