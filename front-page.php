<?php

/**
 * The template for displaying the front page of the site.
 * Using a plugin, this page can now display content from any CPT as well as pages / posts.
 * Loads template parts conditionally depending on the context.
 *
 * @package asufaculty
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php

		if ( is_home() ) {
			get_template_part( 'sidebar', 'above-home-posts' );
		}

		while ( have_posts() ) :

			the_post();

			if ( is_singular( 'person' ) ) {
				get_template_part( 'template-parts/person-full' );
			} elseif ( is_home() ) {
				get_template_part( 'template-parts/excerpt', get_post_type() );
			} else {
				get_template_part( 'template-parts/content', 'page' );
			}

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
