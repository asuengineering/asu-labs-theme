<?php
/**
 * Template part for displaying a single publication in single-publication.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package asufaculty
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="container">
			<div class="entry-meta">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php

				$all_status_options = asufaculty_research_status_options();
				$projstatus         = carbon_get_the_post_meta( 'research_project_status' );

				echo '<p><strong>Project Status:</strong> ';
				echo esc_html( $all_status_options[ $projstatus ] );

				$opportunity = carbon_get_the_post_meta( 'research_opportunity' );
				if ( 'yes' === $opportunity ) {
					echo '<span>, Research Opportunity Available</span>';
				}
				echo '</p>';
				?>
			</div><!-- .entry-meta -->

			<?php asufaculty_post_thumbnail(); ?>

		</div>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	<div><!-- end .entry-header -->

	<footer class="entry-footer">
		<div class="related-person">

			<?php
			// Display CPT results for connected people.
				$connected_people = new WP_Query(
					array(
						'connected_type'  => 'person_to_research',
						'connected_items' => get_queried_object(),
						'nopaging'        => true,
					)
				);

				// Display connected pages.
				if ( $connected_people->have_posts() ) :
					?>
					<h3>People</h3>

					<?php
					while ( $connected_people->have_posts() ) :
						$connected_people->the_post();
						?>
						<div class="person clear">
							<div class="thumbnail">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail( array( 80, 80 ), array( 'class' => 'pure-img' ) );
									} else {
										echo '<img class="placeholder-img pure-img" src="' . esc_html( ( 'stylesheet_directory' ) ) . '/images/person-placeholder.jpg" />';
									}
									?>
								</a>
							</div>

							<?php
							// Get person's full name from meta details.
							$first  = carbon_get_the_post_meta( 'person_first_name' );
							$middle = carbon_get_the_post_meta( 'person_middle_name' );
							$last   = carbon_get_the_post_meta( 'person_last_name' );
							$suffix = carbon_get_the_post_meta( 'person_suffix' );

							// Append spaces if not blank. Assume there's always a last name.
							if ( ! empty( carbon_get_the_post_meta( 'person_first_name' ) ) ) {
								$first .= ' ';
							}

							if ( ! empty( carbon_get_the_post_meta( 'person_middle_name' ) ) ) {
								$middle .= ' ';
							}

							echo '<h4 class="person-name"><a href="' . esc_url( get_permalink() ) . '">' . esc_html( $first ) . esc_html( $middle ) . esc_html( $last ) . ' ' . esc_html( $suffix ) . '</a></h4>';

							$tagline = '';
							$tagline = carbon_get_the_post_meta( 'person_tagline' );

							if ( empty( $tagline ) ) {
								// overwrite the tagline information with taxonomy information if it's blank.
								$tagline = wp_strip_all_tags( get_the_term_list( get_the_ID(), 'faculty-type', '', ', ', '' ) );
							}

							// layout dependent on this tag being here, even if it's empty.
							echo '<p class="person-tagline">' . esc_html( $tagline ) . '</p>';
							?>
						</div><!-- end .person -->
					<?php endwhile; ?>

					<?php
					// Prevent weirdness.
					wp_reset_postdata();

				endif;
				?>
			</div><!-- end .publication-person -->

			<?php
			// Related publications. Start new post loop for connected publications.
			$connected_publication = new WP_Query(
				array(
					'connected_type'  => 'research_to_publication',
					'connected_items' => get_queried_object(),
					'nopaging'        => true,
				)
			);

			// Display connected publiations.
			if ( $connected_publication->have_posts() ) :
				?>			
				<div class="related-publication">
					<h3>Publications</h3>
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

			<?php
			// Funding Sources Column.
			$funding = get_the_terms( get_queried_object_id(), 'funding-source' );
			if ( $funding && ! is_wp_error( $funding ) ) {
				echo '<div class="funding-sources">';
				echo '<h3>Funding Sources</h3>';
				foreach ( $funding as $fund ) {

					$fundimage = '';
					$fundimage = carbon_get_term_meta( $fund->term_id, 'funding_image' );
					if ( ! empty( $fundimage ) ) {
						$fundimage = '<img class="placeholder-img pure-img" src="' . $fundimage . '" />';
					}

					echo '<div class="fund clear">' . $fundimage;
					echo '<h4>' . esc_html( $fund->name ) . '</h4>';
					echo '<p class="desc">' . esc_html( $fund->description ) . '</p>';
					echo '</div>';
				}
				echo '</div><!-- end .funding-source -->';
			}
			?>
		</footer>

</article><!-- #post-<?php the_ID(); ?> -->
