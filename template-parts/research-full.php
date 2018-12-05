<?php
/**
 * Template part for displaying a single publication in single-publication.php
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
					$projstatus = carbon_get_the_post_meta('research_project_status');

					echo '<p><strong>Project Status:</strong> ';
					echo $all_status_options[$projstatus];

					$opportunity = carbon_get_the_post_meta('research_opportunity');
					if ($opportunity==='yes') {
						echo '<span>, Research Opportunity Available</span>';
					}
					echo '</p>';
				?>
			</div><!-- .entry-meta -->

            <?php asufaculty_post_thumbnail(); ?>

		</div>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="content-container">
			<?php the_content(); ?>
		</div>
		<div class="content-meta">
			<?php
				$proj_funding = carbon_get_the_post_meta('research_funding');
				$proj_sponsor = carbon_get_the_post_meta('research_sponsor');
				$proj_poster = carbon_get_the_post_meta('research_poster');

				if (!(empty($proj_funding))) {
					echo '<h4>Funding</h4>';
					echo '<p>' . $proj_funding . '</p>';
				}

				if (!(empty($proj_sponsor))) {
					echo '<h4>Sponsor</h4>';
					echo '<p>' . $proj_sponsor . '</p>';
				}

				if (!(empty($proj_poster))) {
					echo '<h4>Poster</h4>';
					echo '<div class="poster">';
					echo '<a href="'.$proj_poster.'" target="_blank">';
					echo '<i class="fas fa-file-pdf"></i>';
					echo '</a></div>';
				}

				 // Display CPT results for connected people
                $connected_people = new WP_Query( array(
                    'connected_type' => 'person_to_research',
                    'connected_items' => get_queried_object(),
                    'nopaging' => true,
                ) );

                // Display connected pages
                if ( $connected_people->have_posts() ) :
                ?>
                    <h4>People</h4>
					
					<?php while ( $connected_people->have_posts() ) : $connected_people->the_post(); ?>
						<div class="person clear">
							<div class="thumbnail">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail( array(80, 80), ['class' => 'pure-img']);
										}
										else {
											echo '<img class="placeholder-img pure-img" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/person-placeholder.jpg" />';
										}
									?>
								</a>
							</div>

							<?php
							// Get person's full name from meta details
							$first =	carbon_get_the_post_meta( 'person_first_name' );
							$middle =	carbon_get_the_post_meta( 'person_middle_name' );
							$last =		carbon_get_the_post_meta( 'person_last_name' );
							$suffix = 	carbon_get_the_post_meta( 'person_suffix' );

							// Append spaces if not blank. Assume there's always a last name.
							if (!empty(carbon_get_the_post_meta('person_first_name'))) {
								$first .= " ";
							}

							if (!empty(carbon_get_the_post_meta('person_middle_name'))) {
								$middle .= " ";
							}

							echo '<h4 class="person-name"><a href="' . esc_url( get_permalink() ) . '">' . $first . $middle . $last . " " . $suffix . '</a></h4>';

							?>
						</div><!-- end .person -->
					<?php endwhile; ?>

					<?php 
					// Prevent weirdness
					wp_reset_postdata();

					endif;

					// Display CPT results for connected research
					$connected_research = new WP_Query( array(
						'connected_type' => 'research_to_publication',
						'connected_items' => get_queried_object(),
						'nopaging' => true,
					) );

					// Display connected pages
					if ( $connected_research->have_posts() ) :
					?>

					<h3>Publications</h3>
					
					<?php while ( $connected_research->have_posts() ) : $connected_research->the_post(); ?>
						<div class="project">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						</div><!-- end .project -->
					<?php endwhile; ?>

					<?php 
					// Prevent weirdness
					wp_reset_postdata();

					endif;
					?>

</article><!-- #post-<?php the_ID(); ?> -->