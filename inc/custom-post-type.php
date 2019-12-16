<?php
/**
 * Custom Post Types: Research, People, Publications
 */

/* Research CPT (research) */
add_action( 'init', 'asufaculty_make_cpt_research', 0 );
function asufaculty_make_cpt_research() {

	$labels = array(
		'name'                  => _x( 'Research', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Research', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Research', 'text_domain' ),
		'name_admin_bar'        => __( 'Research', 'text_domain' ),
		'archives'              => __( 'Research Archives', 'text_domain' ),
		'attributes'            => __( 'Research Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args   = array(
		'label'               => __( 'Research', 'text_domain' ),
		'description'         => __( 'Research pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
		'taxonomies'          => array( 'research-theme' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 21,
		'menu_icon'           => 'dashicons-admin-page',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
		// set to true to enable Gutenberg
	);
	register_post_type( 'research', $args );

}


// Register Custom Post Type: Publication
add_action( 'init', 'asufaculty_create_publications_cpt', 0 );
function asufaculty_create_publications_cpt() {

	$labels = array(
		'name'                  => _x( 'Publications', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Publication', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Publications', 'text_domain' ),
		'name_admin_bar'        => __( 'Publications', 'text_domain' ),
		'archives'              => __( 'Publication Archives', 'text_domain' ),
		'attributes'            => __( 'Publication Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Publication:', 'text_domain' ),
		'all_items'             => __( 'All Publications', 'text_domain' ),
		'add_new_item'          => __( 'Add New Publication', 'text_domain' ),
		'add_new'               => __( 'Add Publication', 'text_domain' ),
		'new_item'              => __( 'New Publication', 'text_domain' ),
		'edit_item'             => __( 'Edit Publication', 'text_domain' ),
		'update_item'           => __( 'Update Publication', 'text_domain' ),
		'view_item'             => __( 'View Publication', 'text_domain' ),
		'view_items'            => __( 'View Publications', 'text_domain' ),
		'search_items'          => __( 'Search Publication', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Publication (Image)', 'text_domain' ),
		'set_featured_image'    => __( 'Set attachment', 'text_domain' ),
		'remove_featured_image' => __( 'Remove attachment', 'text_domain' ),
		'use_featured_image'    => __( 'Use as attachment', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into publication', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this publication', 'text_domain' ),
		'items_list'            => __( 'Publications list', 'text_domain' ),
		'items_list_navigation' => __( 'Publications list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter publications list', 'text_domain' ),
	);
	$args   = array(
		'label'               => __( 'Publication', 'text_domain' ),
		'description'         => __( 'A publication associated with a lab group or faculty member', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'excerpt', 'custom-fields', 'page-attributes', 'sticky' ),
		'taxonomies'          => array( 'publication-date', 'research-theme' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 22,
		'menu_icon'           => 'dashicons-portfolio',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		// When/if we are ready to build an archive page for this CPT, uncomment this and delete the following line.
		// 'has_archive' 		=> 'publications',
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
	);
	register_post_type( 'publication', $args );

}


// Register Custom Post Type: Person
add_action( 'init', 'asufaculty_register_person_cpt', 0 );
function asufaculty_register_person_cpt() {

	$labels = array(
		'name'                  => _x( 'People', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Person', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'People', 'text_domain' ),
		'name_admin_bar'        => __( 'People', 'text_domain' ),
		'archives'              => __( 'People Archives', 'text_domain' ),
		'attributes'            => __( 'People Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Person', 'text_domain' ),
		'all_items'             => __( 'All People', 'text_domain' ),
		'add_new_item'          => __( 'Add New Person', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New People', 'text_domain' ),
		'edit_item'             => __( 'Edit Person', 'text_domain' ),
		'update_item'           => __( 'Update Person', 'text_domain' ),
		'view_item'             => __( 'View Person', 'text_domain' ),
		'view_items'            => __( 'View People', 'text_domain' ),
		'search_items'          => __( 'Search Person', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Profile Photo', 'text_domain' ),
		'set_featured_image'    => __( 'Set profile photo', 'text_domain' ),
		'remove_featured_image' => __( 'Remove profile photo', 'text_domain' ),
		'use_featured_image'    => __( 'Use as profile photo', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this person', 'text_domain' ),
		'items_list'            => __( 'People list', 'text_domain' ),
		'items_list_navigation' => __( 'People list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter people list', 'text_domain' ),
	);
	$args   = array(
		'label'               => __( 'Person', 'text_domain' ),
		'description'         => __( 'A person affiliated with a lab or faculty website', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
		'taxonomies'          => array( 'degree-program', 'graduation-date' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 23,
		'menu_icon'           => 'dashicons-businessman',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'has_archive'         => 'people',
		'show_in_rest'        => true,
	);
	register_post_type( 'person', $args );

}


