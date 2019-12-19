<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-person' ); ?>>

	<div class="entry-content">

		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( array( 300, 300 ), array( 'class' => 'pure-img' ) );
				} else {
					echo '<img class="placeholder-img" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/person-placeholder.jpg" />';
				}
				?>
			</a>
		</div><!-- .post-thumbnail -->
		
		<div class="entry-wrap">
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

				echo '<h2 class="entry-title"><a class="person-name" href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $first . $middle . $last . ' ' . $suffix . '</a></h2>';

				$tagline = '';
				$tagline = carbon_get_the_post_meta( 'person_tagline' );

			if ( empty( $tagline ) ) {
				// overwrite the tagline information with taxonomy information if it's blank.
				$tagline = strip_tags( get_the_term_list( get_the_ID(), 'faculty-type', '', ', ', '' ) );
			}

				echo '<p class="person-tagline">' . $tagline . '</p>'; // layout dependent on this tag being here, even if it's empty;
			?>

			<div class="description"><?php the_excerpt(); ?></div>

			<ul class="contact-details">

			<?php
				$email    = carbon_get_the_post_meta( 'person_email' );
				$phone    = carbon_get_the_post_meta( 'person_phone' );
				$location = carbon_get_the_post_meta( 'person_location' );
				$maplink  = carbon_get_the_post_meta( 'person_location_url' );

			if ( ( ! empty( $email ) ) && ( is_email( $email ) ) ) {
				echo '<li class="email"><a href="mailto:' . $email . '" target="_blank">' . $email . '</a></li>';
			}

			if ( ! empty( $phone ) ) {
				// No fancy validation for phone numbers. Just roll with it.
				echo '<li class="phone"><a href="tel:' . $phone . '" target="_blank">' . $phone . '</a></li>';
			}

			if ( ! empty( $location ) ) {
				// Location has a physical description. Check for a valid URL to go with it.
				echo '<li class="office-location">';
				if ( ( ! empty( $maplink ) ) && ( wp_http_validate_url( $maplink ) ) ) {
					// Valid URL. Let's make it a link.
					echo '<a href="' . $maplink . '" target=_"blank" title="Office Location: Link to ASU Maps">' . $location . '</a>';
				} else {
					// We still have a valid text field. Let's just echo it.
					echo $location;
				}
				echo '</li>';
			} else {
				// There's no description text. Leave it blank.
			}
			?>
		
			</ul>
		</div><!-- .entry-wrap -->

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
