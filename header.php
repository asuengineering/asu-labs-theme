<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package asufaculty
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<!-- Begin ASU Heads -->
	<?php asuwp_load_global_head_scripts(); ?>
	<!-- END ASU Heads -->
</head>

<body <?php body_class(); ?>>

<!-- ******************* Google Tag Manager ASU Universal ******************* -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KDWN8Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KDWN8Z');</script>
<!-- End Google Tag Manager ASU Universal -->

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'asufaculty' ); ?></a>

	<div id="mobile-header">
		<div class="container">
			<img class="mobile-logo pure-img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/asu_sunburst_rgb_white_150ppi_0.png" alt="Logo: Arizona State University">
			<a href="#masthead" class="hamburger hamburger--arrow">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</a>
		</div>
	</div><!-- end #mobile-header -->

	<div id="mobile-title">
		<div class="container">
			<?php
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			?>
		</div>
	</div><!-- end #mobile-title -->


	<header id="masthead">
		<div class="site-header">
			<a class="toggle close" href="#"><i class="far fa-times-circle"></i>Close</a>
			<!-- you might also want to use a “×” -->
		
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$asufaculty_description = get_bloginfo( 'description', 'display' );
				if ( $asufaculty_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $asufaculty_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="menu">
				<div class="pure-menu pure-menu-vertical">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'depth'          => 2,
								'container'      => false,
								'menu_class'     => 'pure-menu-list',
								'fallback_cb'    => 'pure_menu_walker::fallback',
								'walker'         => new pure_menu_walker(),
							)
						);
						?>
				</div>
			</nav>
		</div><!-- .site-header -->

		<?php if ( is_active_sidebar( 'masthead-footer' ) ) : ?>
			<div class="site-footer widget-area" role="complementary">
				<hr>
				<?php dynamic_sidebar( 'masthead-footer' ); ?>
			</div><!-- .site-footer -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
