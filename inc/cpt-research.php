<?php
/**
 * Custom Post Type: Research Pages.
 * Definition, associated taxonomies, associated research meta
 *
 * @package asufaculty
 */


/*
 ***********************
  Research CPT (research) + 1 taxonomy
************************ */
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

/*
 Taxonomy: Research Theme
************************ */
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

// Register Custom Post Type
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
add_action( 'init', 'asufaculty_create_publications_cpt', 0 );


// Register Custom Post Type
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
add_action( 'init', 'asufaculty_register_person_cpt', 0 );


// TAX: Faculty/Student Type, for person CPT
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
add_action( 'init', 'asufse_register_faculty_type_taxonomy', 0 );


// TAX: Degree Program, for person CPT
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
add_action( 'init', 'asufse_register_degree_program_taxonomy', 0 );

// TAX: Graduation Date, for participant CPT
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
add_action( 'init', 'asufse_register_graduation_date_taxonomy', 0 );


// ===============================================
// Carbon Fields, Defining metaboxes for CPTs
// ===============================================

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'asufaculty_carbonfields_register_facultycpt_meta' );
function asufaculty_carbonfields_register_facultycpt_meta() {
	Container::make( 'post_meta', 'Personal Details' )
		->where( 'post_type', '=', 'person' )
		->set_context( 'normal' )
		->add_fields(
			array(
				Field::make( 'text', 'person_first_name', 'First Name' )->set_width( 25 ),
				Field::make( 'text', 'person_middle_name', 'Middle Name' )->set_width( 25 ),
				Field::make( 'text', 'person_last_name', 'Last Name' )->set_width( 25 ),
				Field::make( 'text', 'person_suffix', 'Suffix' )->set_width( 10 ),
				Field::make( 'text', 'person_tagline', 'Personal tagline' )
					->set_help_text( 'Displays under name on single person view.' ),
				Field::make( 'text', 'person_email', 'Email Address' )->set_width( 30 ),
				Field::make( 'text', 'person_phone', 'Phone Number' )->set_width( 20 ),
				Field::make( 'text', 'person_location', 'Building / Location' )->set_width( 20 ),
				Field::make( 'text', 'person_location_url', 'Map URL' )->set_width( 30 ),
				Field::make( 'text', 'person_isearch', 'iSearch Profile' )
					->set_help_text( 'Value is required to display any of the social media links/icons below.' ),
				Field::make( 'text', 'person_facebook', 'Facebook URL' )->set_width( 50 ),
				Field::make( 'text', 'person_twitter', 'Twitter URL' )->set_width( 50 ),
				Field::make( 'text', 'person_linkedin', 'LinkedIn URL' )->set_width( 50 ),
				Field::make( 'text', 'person_instagram', 'Instagram URL' )->set_width( 50 ),
			)
		);

	Container::make( 'term_meta', 'Faculty Type Details' )
		->where( 'term_taxonomy', '=', 'faculty-type' )
		->add_fields(
			array(
				Field::make( 'checkbox', 'facultytype_featured', 'Display as Featured Person' )
					->set_help_text( 'Checking this box will provide special formatting for people identified with this term at the top of the people overview page.' )
					->set_option_value( 'yes' )
					->set_default_value( '' ),
			// TBD: Develop feature that prevents deeper link from archive page or swaps link to single-person to iSearch.
			// Field::make( 'checkbox', 'facultytype_display_single', 'Display Single Person' )
				// ->set_help_text('Checking this box will provide a link on the people overview page to an individual profile page for anyone assigned to this category .')
				// ->set_option_value( 'yes' )
				// ->set_default_value( 'yes' )
			)
		);

	Container::make( 'post_meta', 'Research Project Details' )
		->where( 'post_type', '=', 'research' )
		->set_context( 'normal' )
		->add_fields(
			array(
				Field::make( 'text', 'research_funding', 'Describe the funding source for this project.' )
					->set_width( 50 )
					->set_help_text( 'Inline HTML styles like strong and a are allowed.' ),
				Field::make( 'text', 'research_sponsor', 'If the project was sponsored by a company, provide those details here.' )
					->set_width( 50 )
					->set_help_text( 'Inline HTML styles like strong and a are allowed.' ),
				// TBD: Develop feature which marks the research project as an opportunity for people to participate in.
				// Could enable an RFI like form for those not enrolled as an ASU student, or a form to contact someone within the campus for additional details.
				// Gathering all of these ideas together results in the opportunities section located at https://undergraduate-research.engineering.asu.edu/
					// Field::make('checkbox', 'research_opportunity', 'Opportunity to participate?' )
					// ->set_option_value( 'yes' )
					// ->set_default_value( '' )
					// ->set_help_text( 'Checking this box will mark this research project as an available opportunity for student participation.' )
					// ->set_width( 50 ),
				Field::make( 'select', 'research_project_status', 'What is the current status of this research project?' )
					->set_width( 50 )
					->add_options( 'asufaculty_research_status_options' ),
				Field::make( 'file', 'research_poster', 'Research Poster (PDF only)' )
					->set_width( 50 )
					->set_help_text( 'This is different than the featured image for the project which should be a photo for best display.' )
					->set_type( 'pdf' )
					->set_value_type( 'url' ),
			)
		);

	Container::make( 'post_meta', 'Publication Details' )
		->where( 'post_type', '=', 'publication' )
		->set_context( 'normal' )
		->add_fields(
			array(
				Field::make( 'rich_text', 'publication_citation', 'Publication Citation' )
					->set_help_text( 'Copy/paste the whole citation for this publication here. Format the entry with italics, bold of external links as needed.' )
					->set_width( 50 ),
				Field::make( 'date', 'publication_date', 'Publication Date' )
					->set_attribute( 'placeholder', 'Publication Date' )
					->set_input_format( 'n/j/Y', 'n/j/Y' )
					->set_width( 25 )
					->set_help_text( 'Type a date using mm/dd/yyyy format.' ),
				Field::make( 'file', 'publication_download', 'Downloadable File' )
					->set_width( 25 )
					->set_help_text( 'Use an image of the PDF download as the featured image for the post. Link to the actual PDF here.' )
					->set_value_type( 'url' ),

			)
		);

	Container::make( 'term_meta', 'Research Theme Details' )
		->where( 'term_taxonomy', '=', 'research-theme' )
		->add_fields(
			array(
				Field::make( 'rich_text', 'theme_description', 'Describe the research theme in broad strokes.' ),
				Field::make( 'image', 'theme_image', 'Featured Image' )
					->set_value_type( 'url' ),
			)
		);
}

// Separate function for select box in research project post meta area. Helps with retrieving the values later.
// https://wordpress.stackexchange.com/a/305532
function asufaculty_research_status_options() {
	return array(
		'active'    => 'Active',
		'ongoing'   => 'Ongoing',
		'complete'  => 'Completed',
		'pending'   => 'Pending Publication',
		'published' => 'Published',
	);
}

add_action( 'after_setup_theme', 'asufaculty_carbonfields_facultycpt_load' );
function asufaculty_carbonfields_facultycpt_load() {
	\Carbon_Fields\Carbon_Fields::boot();
	// The breadcrumbs plugin is already loading the Composer autoload file.
}


// Admin Menu Reordering
// http://randyhoyt.com/wordpress/admin/
add_action( 'admin_menu', 'asufaculty_change_admin_menu_order' );
function asufaculty_change_admin_menu_order() {
	global $menu;
	$menu[6]  = $menu[5]; // Moves Posts down a slot
	$menu[5]  = $menu[20]; // Moves Pages above Posts
	$menu[24] = $menu[10]; // Moves Media right above comments
	unset( $menu[10] ); // Empty 10 slot
	unset( $menu[20] ); // Empty the 20-slot.
}

// Posts 2 Posts Relationships
function asufaculty_cpt_connection_types() {
	p2p_register_connection_type(
		array(
			'name'         => 'person_to_research',
			'from'         => 'person',
			'to'           => 'research',
			'reciprocal'   => true,
			'admin_column' => 'any',
		)
	);

	p2p_register_connection_type(
		array(
			'name'         => 'research_to_publication',
			'from'         => 'research',
			'to'           => 'publication',
			'reciprocal'   => true,
			'admin_column' => 'any',
		)
	);

	p2p_register_connection_type(
		array(
			'name'         => 'publication_to_person',
			'from'         => 'publication',
			'to'           => 'person',
			'reciprocal'   => true,
			'admin_column' => 'any',
		)
	);
}
add_action( 'p2p_init', 'asufaculty_cpt_connection_types' );

// Remove generic description field from taxonomy screen.
// https://wordpress.stackexchange.com/a/308418/69368
function asufaculty_remove_description_form() {
	echo '<style> .term-description-wrap { display:none; } </style>';
}

add_action( 'research-theme_edit_form', 'asufaculty_remove_description_form' );
add_action( 'research-theme_add_form', 'asufaculty_remove_description_form' );
