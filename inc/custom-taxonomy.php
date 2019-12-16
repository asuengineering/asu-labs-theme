<?php
/**
 * Custom Taxonomies:
 * Describing Research: Research Theme
 * Describing People: Faculty/Student Type, Degree Program
 * Describing Publications:
 *
 */


/* Taxonomy: Research Theme */
add_action( 'init', 'asufaculty_make_cpt_research_theme_taxonomy', 0 );
function asufaculty_make_cpt_research_theme_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Themes', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Theme', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Research Themes', 'text_domain' ),
		'all_items'                  => __( 'All Themes', 'text_domain' ),
		'parent_item'                => __( 'Parent Theme', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Theme:', 'text_domain' ),
		'new_item_name'              => __( 'New Theme Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Theme', 'text_domain' ),
		'edit_item'                  => __( 'Edit Theme', 'text_domain' ),
		'update_item'                => __( 'Update Theme', 'text_domain' ),
		'view_item'                  => __( 'View Theme', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate themes with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove themes', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Themes', 'text_domain' ),
		'search_items'               => __( 'Search Themes', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Themes', 'text_domain' ),
		'items_list'                 => __( 'Themes list', 'text_domain' ),
		'items_list_navigation'      => __( 'Themes list navigation', 'text_domain' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,
		'show_in_rest'      => true,
	);
	register_taxonomy( 'research-theme', array( 'research', 'publications' ), $args );

}


// TAX: Faculty/Student Type.
add_action( 'init', 'asufse_register_faculty_type_taxonomy', 0 );
function asufse_register_faculty_type_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Faculty/Student Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Faculty/Student Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Faculty/Student Type', 'text_domain' ),
		'all_items'                  => __( 'All Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Type', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Type:', 'text_domain' ),
		'new_item_name'              => __( 'New Type Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Type', 'text_domain' ),
		'update_item'                => __( 'Update Type', 'text_domain' ),
		'view_item'                  => __( 'View Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate types with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Types', 'text_domain' ),
		'search_items'               => __( 'Search Types', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Types', 'text_domain' ),
		'items_list'                 => __( 'Types list', 'text_domain' ),
		'items_list_navigation'      => __( 'Types list navigation', 'text_domain' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'show_tagcloud'     => false,
		'show_in_rest'      => true,
	);
	register_taxonomy( 'faculty-type', array( 'person' ), $args );
}


// TAX: Degree Program.
add_action( 'init', 'asufse_register_degree_program_taxonomy', 0 );
function asufse_register_degree_program_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Degree Programs', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Degree Program', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Degree Program', 'text_domain' ),
		'all_items'                  => __( 'All Degree Programs', 'text_domain' ),
		'parent_item'                => __( 'Parent Degree', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Degree:', 'text_domain' ),
		'new_item_name'              => __( 'New Degree Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Degree', 'text_domain' ),
		'edit_item'                  => __( 'Edit Degree', 'text_domain' ),
		'update_item'                => __( 'Update Degree', 'text_domain' ),
		'view_item'                  => __( 'View Degree', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate degrees with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove degrees', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Degrees', 'text_domain' ),
		'search_items'               => __( 'Search Degrees', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No degrees', 'text_domain' ),
		'items_list'                 => __( 'Degrees list', 'text_domain' ),
		'items_list_navigation'      => __( 'Degrees list navigation', 'text_domain' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'show_tagcloud'     => true,
		'show_in_rest'      => true,
	);
	register_taxonomy( 'degree-program', array( 'person' ), $args );

}


// TAX: Graduation Date.
add_action( 'init', 'asufse_register_graduation_date_taxonomy', 0 );
function asufse_register_graduation_date_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Graduation Dates', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Graduation Date', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Graduation Date', 'text_domain' ),
		'all_items'                  => __( 'Graduation Dates', 'text_domain' ),
		'parent_item'                => __( 'Parent Date', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Date:', 'text_domain' ),
		'new_item_name'              => __( 'New Date', 'text_domain' ),
		'add_new_item'               => __( 'Add New Date', 'text_domain' ),
		'edit_item'                  => __( 'Edit Date', 'text_domain' ),
		'update_item'                => __( 'Update Date', 'text_domain' ),
		'view_item'                  => __( 'View Date', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate dates with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove dates', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Dates', 'text_domain' ),
		'search_items'               => __( 'Search Dates', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No dates', 'text_domain' ),
		'items_list'                 => __( 'Dates list', 'text_domain' ),
		'items_list_navigation'      => __( 'Dates list navigation', 'text_domain' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'show_tagcloud'     => false,
		'show_in_rest'      => true,
	);
	register_taxonomy( 'graduation-date', array( 'person' ), $args );

}
