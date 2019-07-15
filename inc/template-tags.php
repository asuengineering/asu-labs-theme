<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package asufaculty
 */

if ( ! function_exists( 'asufaculty_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function asufaculty_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'asufaculty' ),
			$time_string
		);

		echo '<span class="posted-on"><i class="far fa-calendar-alt"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'asufaculty_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function asufaculty_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'asufaculty' ),
			'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
		);

		echo '<span class="byline"><i class="fas fa-pencil"></i>' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'asufaculty_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function asufaculty_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'asufaculty' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links"><i class="far fa-folder"></i>' . esc_html__( '%1$s', 'asufaculty' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'asufaculty' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links"><i class="far fa-tag"></i>' . esc_html__( '%1$s', 'asufaculty' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}



		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'asufaculty' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'asufaculty' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'asufaculty_page_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function asufaculty_page_entry_footer() {
		
		// Breadcrumb, via Justin Tadlock
		$options = ['labels' => ['title' => '']];
		Hybrid\Breadcrumbs\Trail::display($options);

		echo '<div class="entry-meta-group">';

		if (!is_page()) {
			asufaculty_posted_on();
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'asufaculty' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);

		echo '</div>';
	}
endif;

if ( ! function_exists( 'asufaculty_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function asufaculty_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail('asufaculty-single', ['class' => 'pure-img']); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<header class="entry-header">
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail( 'asufaculty-archive', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
					'class' => 'pure-img',
				) );
				?>
			</a>
		</header><!-- .entry-header -->

		<?php
		endif; // End is_singular().
	}
endif;

// add featured image size
add_image_size('asufaculty-single', 1600, 900, true);
add_image_size('asufaculty-archive', 400, 250, true);
add_image_size('asufaculty-square', 400, 400, array( 'center', 'top' ));

// remove width & height attributes from featured images
add_filter( 'post_thumbnail_html', 'asufaculty_remove_img_attr' );
function asufaculty_remove_img_attr ($html)
{
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}

// Custom excerpt length
function asufaculty_custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'asufaculty_custom_excerpt_length', 999 );

