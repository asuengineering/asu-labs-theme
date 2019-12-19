<?php
/**
 * The template for displaying publication archive pages.
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
				<h1 class="page-title">Publication List</h1>
			</header><!-- .page-header -->

			<?php
			// Custom Loop for any "featured" publication. Done via post meta checkbox.
			// Loop Args
			$args = array(
				'post_type'  => 'publication',
				'meta_key'   => '_publication_featured',
				'meta_value' => 'yes',
			);

			// The Query
			$featured = new WP_Query( $args );

			// The Loop
			if ( $featured->have_posts() ) {
				echo '<section id="featured">';
				echo '<h2>Key Publications</h2>';
				while ( $featured->have_posts() ) {
					$featured->the_post();
					get_template_part( 'template-parts/publication', 'all' );
				}
				wp_reset_postdata();
				echo '</section><!-- end #featured -->';
			}

			/* Start the Second Loop, unfeatured. Includes all publications. */
			$simpleargs = array(
				'post_type' => 'publication',
				'orderby'   => array(
					'date'  => 'DESC',
					'title' => 'ASC',
				),
			);

			// The Query
			$unfeatured = new WP_Query( $simpleargs );

			// The Loop
			if ( $unfeatured->have_posts() ) {
				echo '<section id="unfeatured">';
				echo '<h2>All Publications</h2>';
				while ( $unfeatured->have_posts() ) {
					$unfeatured->the_post();
					get_template_part( 'template-parts/publication', 'all' );
				}
				wp_reset_postdata();
				echo '</section><!-- end #unfeatured -->';
			}

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
