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
                        echo apply_filters( 'the_content', carbon_get_term_meta( get_queried_object_id(), 'theme_description' ));
                        ?>
                    </div>
                    <?php 
                        $themeimage = carbon_get_term_meta( get_queried_object_id(), 'theme_image' );
                        if (!empty($themeimage)) {
                            echo '<img class="term-image pure-img" src="' . $themeimage . '" alt="Research Theme Featured Image"/>';
                        }
                    ?> 
                </div>
			</header><!-- .page-header -->
            <h2 class="article-label">Related Projects</h2>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
                the_post();
                
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/research-all' );

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
