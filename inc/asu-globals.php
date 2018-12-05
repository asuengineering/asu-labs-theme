<?php
/**
 * ASU Global Header & Footer scripts. Includes customizer menu.
 * @package asufaculty
 */
 
 // Load global assets via remote get. Allows for easy access to the version in each of the URLs below.
function asuwp_load_global_head_scripts() {
	$request = wp_remote_get('http://www.asu.edu/asuthemes/4.6/heads/default.shtml');
	$response = wp_remote_retrieve_body( $request );
	echo $response;
}

// Build header parent site name based on customizer settings
function asuwp_load_header_sitenames() {

    if ( is_array( get_option( 'wordpress_asu_theme_options' ) ) ) {
        $cOptions = get_option( 'wordpress_asu_theme_options' );
    }

    if ( isset( $cOptions ) && $cOptions['parent']) {
        // Check box is true. 
        $parent = '<a href="%1$s" id="parent-site">%2$s</a>&nbsp;&nbsp;|&nbsp;&nbsp;';
        $parent = sprintf( $parent, esc_html( $cOptions['parent_url'] ), $cOptions['parent_site_name'] );
    } else {
        $parent = '';
    }
    
    return $parent;
}

// Remote get ASU global header elements. Print site name along with returned code.
function asuwp_load_global_header() {
    $request = wp_remote_get('http://www.asu.edu/asuthemes/4.6/headers/default.shtml');
    $response = wp_remote_retrieve_body( $request );

    $parent = asuwp_load_header_sitenames();

    $response .= '<div id="sitename-wrapper">' . $parent . '<a href="'. get_home_url() . '" title="Home" rel="home" id="current-site">'. get_bloginfo( 'name' ) . '</a></div>';
    echo $response;

}
// Remote get ASU global footer elements.
function asuwp_load_global_footer() {
    $request = wp_remote_get('http://www.asu.edu/asuthemes/4.6/includes/footer.shtml');
    $response = wp_remote_retrieve_body( $request );
    echo $response;
}
