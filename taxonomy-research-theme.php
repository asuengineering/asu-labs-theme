<?php
/**
 * The template for displaying taxonomy term pages for the taxonomy research-theme.
 * Add some specific formatting and term meta for this taxonomy.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package asufaculty
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="container">
					<div class="term-meta">
						<p class="pretext">Research Topic:</p>
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						echo apply_filters( 'the_content', carbon_get_term_meta( get_queried_object_id(), 'theme_description' ) );
						?>
					</div>
					<?php
						$themeimage = carbon_get_term_meta( get_queried_object_id(), 'theme_image' );
					if ( ! empty( $themeimage ) ) {
						echo '<img class="term-image pure-img" src="' . $themeimage . '" alt="Research Theme Featured Image"/>';
					}
					?>
					 
				</div>
			</header><!-- .page-header -->
			
			<?php
			// Make two post loops, one for each related CPT. More expensive, but also allows for better customization.

			$themeid = get_queried_object_id();

			$args_projects = array(
				'post_type' => 'research',
				'tax_query' => array(
					array(
						'taxonomy' => 'research-theme',
						'field'    => 'term_id',
						'terms'    => $themeid,
					),
				),
			);

			$query_projects = new WP_Query( $args_projects );

			if ( $query_projects->have_posts() ) {
				echo '<h2 class="section-label">Related Projects</h2>';

				// The Loop
				while ( $query_projects->have_posts() ) {
					$query_projects->the_post();
					// Do loop stuff here. Call the template, mostly.
					get_template_part( 'template-parts/research-all' );
				}

				wp_reset_postdata();
			}

			$args_publications = array(
				'post_type' => 'publication',
				'tax_query' => array(
					array(
						'taxonomy' => 'research-theme',
						'field'    => 'term_id',
						'terms'    => $themeid,
					),
				),
			);

			$query_publications = new WP_Query( $args_publications );

			if ( $query_publications->have_posts() ) {
				echo '<h2 class="section-label">Related Publications</h2>';

				// The 2nd Loop
				while ( $query_publications->have_posts() ) {
					$query_publications->the_post();
					get_template_part( 'template-parts/publication-all' );
				}

				// Restore original Post Data
				wp_reset_postdata();
			}

			?>
			 
			
			
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */


			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
