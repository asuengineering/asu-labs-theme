<?php
/**
 * Template part for displaying a full profile of a person (from the person CPT).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package asufaculty
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/person-featured-header' ); ?>

	<div class="entry-content">

		<?php
		the_content(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'asufaculty' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<div class="person-details">

			<?php
				$degrees  = wp_strip_all_tags( get_the_term_list( get_the_ID(), 'degree-program', '', ', ', '' ) );
				$graddate = wp_strip_all_tags( get_the_term_list( get_the_ID(), 'graduation-date', '', ', ', '' ) );

			if ( ! empty( $degrees ) ) {
				echo '<div class="detail-degree"><h4>Degree Program</h4>';
				echo $degrees;
				echo '</div>';
			}

			if ( ! empty( $graddate ) ) {
				echo '<div class="detail-grad-date"><h4>Graduation Date</h4>';
				echo $graddate;
				echo '</div>';
			}

				// Post loop for connected research.
				$connected_research = new WP_Query(
					array(
						'connected_type'  => 'person_to_research',
						'connected_items' => get_queried_object(),
						'nopaging'        => true,
					)
				);

				// Display connected pages.
				if ( $connected_research->have_posts() ) :
					?>
				<div class="detail-research">
					<h4>Research Projects:</h4>
						<ul>
					<?php
					while ( $connected_research->have_posts() ) :
						$connected_research->the_post();
						?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					</ul>
				</div>

					<?php
					// Prevent weirdness.
					wp_reset_postdata();

				endif;

				// Post loop for connected publications.
				$connected_publication = new WP_Query(
					array(
						'connected_type'  => 'publication_to_person',
						'connected_items' => get_queried_object(),
						'nopaging'        => true,
					)
				);

				// Display connected pages.
				if ( $connected_publication->have_posts() ) :
					?>
				<div class="detail-publication">
					<h4>Publications</h4>
					<ul>
					<?php
					while ( $connected_publication->have_posts() ) :
						$connected_publication->the_post();
						?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					</ul>
				</div>
					<?php
					// Prevent weirdness.
					wp_reset_postdata();

				endif;
				?>

	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
