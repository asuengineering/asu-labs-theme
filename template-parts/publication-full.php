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
					echo apply_filters( 'the_content', carbon_get_the_post_meta( 'publication_citation' ) );
				?>
			</div><!-- .entry-meta -->

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

		</div>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="publication-person">
			
			<?php
			// Display CPT results for connected people
				$connected_people = new WP_Query(
					array(
						'connected_type'  => 'publication_to_person',
						'connected_items' => get_queried_object(),
						'nopaging'        => true,
					)
				);

				// Display connected pages
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
										echo '<img class="placeholder-img pure-img" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/person-placeholder.jpg" />';
									}
									?>
								</a>
							</div>

							<?php
							// Get person's full name from meta details
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

							echo '<h4 class="person-name"><a href="' . esc_url( get_permalink() ) . '">' . $first . $middle . $last . ' ' . $suffix . '</a></h4>';

							$tagline = '';
							$tagline = carbon_get_the_post_meta( 'person_tagline' );

							if ( empty( $tagline ) ) {
								// overwrite the tagline information with taxonomy information if it's blank.
								$tagline = strip_tags( get_the_term_list( get_the_ID(), 'faculty-type', '', ', ', '' ) );
							}

							echo '<p class="person-tagline">' . $tagline . '</p>'; // layout dependent on this tag being here, even if it's empty;
							?>
						</div><!-- end .person -->
					<?php endwhile; ?>

					<?php
					// Prevent weirdness
					wp_reset_postdata();

				endif;
				?>
		</div><!-- end .publication-person -->
		
		<div class="publication-research">
			<?php

			// Display CPT results for connected research
			$connected_research = new WP_Query(
				array(
					'connected_type'  => 'research_to_publication',
					'connected_items' => get_queried_object(),
					'nopaging'        => true,
				)
			);

			// Display connected pages
			if ( $connected_research->have_posts() ) :
				?>

			<h3>Associated Projects</h3>
			
				<?php
				while ( $connected_research->have_posts() ) :
					$connected_research->the_post();
					?>
				<div class="project">
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<?php
						echo get_the_term_list( get_the_ID(), 'research-theme', '<p class="research-category"><strong>Theme: </strong>', ', ', '</p>' );

						$status = carbon_get_the_post_meta( 'research_project_status' );
						echo '<p class="research-status"><strong>Status: </strong>' . $status . '</p>';

					?>
				</div><!-- end .project -->
			<?php endwhile; ?>

				<?php
				// Prevent weirdness
				wp_reset_postdata();

			endif;
			?>
		</div><!-- end .publication-research -->

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
