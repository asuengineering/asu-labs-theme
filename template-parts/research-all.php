<?php
/**
 * Template part for displaying archive excerpts. Fall back template for more specific post-types.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package asufaculty
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail(
				'asufaculty-archive',
				array(
					'alt'   => the_title_attribute(
						array(
							'echo' => false,
						)
					),
					'class' => 'pure-img',
				)
			);
			?>
		</a>
		<?php
		$all_status_options = asufaculty_research_status_options();
		$projstatus         = carbon_get_the_post_meta( 'research_project_status' );

		echo '<p class="status">Project Status: ';
		echo esc_html( $all_status_options[ $projstatus ] );

		$opportunity = carbon_get_the_post_meta( 'research_opportunity' );
		if ( $opportunity === 'yes' ) {
			echo '<span>Research Opportunity Available</span>';
		}
			echo '</p>';
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
