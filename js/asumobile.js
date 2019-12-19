/**
 * Script to duplicate the contents of the main menu of the website into the ASU Header's mobile menu.
 * Requires jQuery.
 *
 * @summary   Script to duplicate the contents of the main menu of the website into the ASU Header's mobile menu.
 *
 * @since     ASULabs 1.4
 */

jQuery( document ).ready(
	function(){
		var asu_mobile_button = jQuery( '#asu_mobile_button' );

		asu_mobile_button.on(
			"click",
			function(){
				var asu_universal_nav_new_ul = jQuery( '#asu_universal_nav_new > ul' );
				if (asu_universal_nav_new_ul.hasClass( 'asulabs-menu-added' )) {
					return false;
				}

				jQuery( jQuery( '#menu-main-menu > li' ).get().reverse() ).each(
					function(  ) {
						var anchor = '';
						var item   = '';

						var top_level_menu = jQuery( this );

						var next_level_menu  = top_level_menu.find( 'ul.pure-menu-children' );
						var next_level_items = '';
						if (next_level_menu) {
							next_level_menu.find( 'li' ).each(
								function(  ) {
									var next_level_anchor = jQuery( this ).children( 'a' );
									var next_level_item   = '<li class="cb"><a href="' + next_level_anchor.attr( 'href' ) + '">' + next_level_anchor.text() + '</a></li>'
									next_level_items     += next_level_item;
								}
							);
						}

						anchor = top_level_menu.children( 'a' );
						if (anchor.text() !== 'home') {
							item += '<li class="tlb"><div class="text">';
							if (next_level_items.length) {
								item += '<a href="' + anchor.attr( 'href' ) + '" class="top">' + anchor.text() + '</a>';
							} else {
								item += '<a href="' + anchor.attr( 'href' ) + '">' + anchor.text() + '</a>';
							}
							item += '</div>'
							if (next_level_items.length) {
								item += '<div class="icn f-sort-down asu-icn"></div>';
							}
							item += '</li>';

							if (next_level_items.length) {
								item += '<li class="clb closed">';
								item += '<ul>';
								item += next_level_items;
								item += '</ul>';
								item += '</li>'
							}

							asu_universal_nav_new_ul.prepend( item );
						}

					}
				);

				asu_universal_nav_new_ul.addClass( 'asulabs-menu-added' );

				// Add separator between this site's content and the global ASU additions.
				asu_universal_nav_new_ul.find( 'li.site_title' ).after( '<li class="tlb empty"><span>Other ASU Resources</span></li>' )

				// Move original site-title element to the first position. Add content from #sitename into menu item.
				var current_site_name = jQuery( '#sitename-wrapper #current-site' ).html();
				asu_universal_nav_new_ul.find( 'li.site_title' ).prependTo( asu_universal_nav_new_ul ).html( '<span>' + current_site_name + '</span>' );

			}
		);

		jQuery( 'body' ).on(
			'click',
			'.asu-icn',
			function() {
				var navigation_item       = jQuery( this );
				var parent_menu_list_item = jQuery( this ).parents( '.tlb' );
				var child_menu_list_item  = parent_menu_list_item;

				if ( navigation_item.hasClass( 'f-sort-down' ) ) {
					child_menu_list_item = parent_menu_list_item.next( '.closed' );
					child_menu_list_item.removeClass( 'closed' ).addClass( 'opened' );
					navigation_item.removeClass( 'f-sort-down' ).addClass( 'f-sort-up' );
				} else if ( navigation_item.hasClass( 'f-sort-up' ) ) {
					child_menu_list_item = parent_menu_list_item.next( '.opened' );
					child_menu_list_item.removeClass( 'opened' ).addClass( 'closed' );
					navigation_item.removeClass( 'f-sort-up' ).addClass( 'f-sort-down' );
				}
			}
		);

		// Assigns a mirror click event to top-level links in the mobile menu.
		jQuery( 'body' ).on(
			'click',
			'#asu_universal_nav_new a.top',
			function(e) {
				e.preventDefault();
				var navigation_arrow = jQuery( this ).parents( '.tlb' ).find( '.asu-icn' );
				navigation_arrow.click();
			}
		);

	}
);
