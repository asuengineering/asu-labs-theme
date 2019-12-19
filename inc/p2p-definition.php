<?php
/**
 * Custom Post Types: Research, People, Publications
 */

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
