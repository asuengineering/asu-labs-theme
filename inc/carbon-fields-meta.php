<?php
/**
 * Carbon Fields: Metabox definitions.
 */

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

	Container::make( 'term_meta', 'Funding Sources Details' )
	->where( 'term_taxonomy', '=', 'funding-source' )
	->add_fields(
		array(
			Field::make( 'image', 'funding_image', 'Funding Source Image' )
				->set_help_text( 'Select a thumbnail image for this funding source. Square formating is best.' )
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
