<?php
/**
 * asufaculty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package asufaculty
 */

if ( ! function_exists( 'asufaculty_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function asufaculty_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on asufaculty, use a find and replace
		 * to change 'asufaculty' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'asufaculty', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'asufaculty' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'asufaculty_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function asufaculty_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'asufaculty_content_width', 640 );
}
add_action( 'after_setup_theme', 'asufaculty_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function asufaculty_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'asufaculty' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'asufaculty' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'asufaculty_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function asufaculty_scripts() {
	wp_enqueue_style( 'pure', "https://unpkg.com/purecss@1.0.0/build/pure-min.css" );
	wp_enqueue_style( 'asufaculty-style', get_stylesheet_uri() );
	wp_enqueue_style( 'roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i');

	wp_enqueue_script( 'asufaculty-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'asufaculty-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    wp_enqueue_script( 'font-awesome-five', get_template_directory_uri() . '/vendor/fontawesome-pro/js/all.js', false, '5.7.2');
	wp_enqueue_script( 'custom-js', get_template_directory_uri() .'/js/custom.js', array('jquery'), null, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'asufaculty_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Additional functions for delivering the ASU Header and ASU Footer.
 */
require get_template_directory() . '/inc/asu-globals.php';

/**
 * Nav Walker for PureCSS vertical menus.
 */
require get_template_directory() . '/inc/pure-menu-walker.php';

/**
 * Custom post types and taxonomies. Other data shaping activities.
 */
require get_template_directory() . '/inc/cpt-research.php';

/**
 * Composer autoload file. Used for breadcrumbs.
 */
if ( file_exists( get_parent_theme_file_path( 'vendor/autoload.php' ) ) ) {
	require_once( get_parent_theme_file_path( 'vendor/autoload.php' ) );
}

// Remove the label before the term title for research-themes
function asufaculty_remove_archive_term_label( $title ) {
    if ( is_tax( 'research-theme') ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
add_filter( 'get_the_archive_title', 'asufaculty_remove_archive_term_label' );


// Address visibility problem with Carbon Fields and the latest (beta) version of Gutenberg.
function asufaculty_make_carbonfields_great_again() {
	echo '<style>
	.edit-post-layout__metaboxes #poststuff .carbon-box,
	.edit-post-layout__metaboxes #poststuff .spinner.disabled {
		display: block;
	}
	</style>';
}
add_action('admin_head', 'asufaculty_make_carbonfields_great_again');