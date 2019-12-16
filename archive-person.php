<?php
/**
 * The template for displaying aN archive of all people within the site.
 *
 * @package asufaculty
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<header class="page-header">
				<h1 class="page-title">Directory</h1>
			</header><!-- .page-header -->

			<?php

				// Search taxonomy (faculty-type) for terms which should display as "featured" people.
				// https://wordpress.stackexchange.com/questions/231212/get-term-by-custom-term-meta-and-taxonomy/231242#231242
				$term_args = array( 'taxonomy' => 'faculty-type' );
				$terms     = get_terms( $term_args );

				$term_ids     = array();
				$term_id_else = array();

			foreach ( $terms as $term ) {
				$key = get_term_meta( $term->term_id, '_facultytype_featured', true );
				if ( $key == 'yes' ) {
					// push the ID into the "yes" array
					$term_ids[] = $term->term_id;
				} else {
					// push the ID into the "no" array
					$term_id_else[] = $term->term_id;
				}
			}

				// Loop Args
				$args = array(
					'post_type' => 'person',
					'tax_query' => array(
						array(
							'taxonomy' => 'faculty-type',
							'terms'    => $term_ids,
						),
					),
				);

				// The Query
				$featured = new WP_Query( $args );

				// The Loop
				if ( $featured->have_posts() ) {
					echo '<section id="featured">';
					while ( $featured->have_posts() ) {
						$featured->the_post();
						get_template_part( 'template-parts/person-archive-entry' );
					}
					wp_reset_postdata();
					echo '</section><!-- end #featured -->';
				}
				// ***** END FIRST LOOP ***
				// Remaining Post Loops, cycled through via category.

				foreach ( $term_id_else as $term_id ) {

					$term = get_term( $term_id, 'faculty-type' );

					// Lookup and print term header
					echo '<section id="' . $term->slug . '" class="nonfeatured"><h2>' . $term->name . '</h2>';

					$args_people = array(
						'post_type' => 'person',
						'tax_query' => array(
							array(
								'taxonomy' => 'faculty-type',
								'terms'    => $term_id,
							),
						),
						'orderby'   => 'title',
						'order'     => 'ASC',
					);

					$people = new WP_Query( $args_people );

					if ( $people->have_posts() ) {

						while ( $people->have_posts() ) {
							$people->the_post();
							get_template_part( 'template-parts/person-archive-entry' );
						}
						wp_reset_postdata();
					}
					echo '</section><!-- end #' . $term->name . ' -->';
				}
				?>
			 
		</main><!-- #main -->
	</div><!-- #primary -->
				
<?php get_footer(); ?>
