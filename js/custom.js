

jQuery(document).ready(function( $ ) {

    // Add down caret CSS class back to all places.  
    $('.menu-item-has-children').addClass('pure-menu-collapsed');

    // Set all panels to collapsed at onset.
    var allPanels = $('.menu-item-has-children > .pure-menu-children').hide();
    
    $('.menu-item-has-children > a').click(function() {
        if ($(this).siblings('.pure-menu-children').is(':hidden')) {
            allPanels.slideUp(100)
            allPanels.parent().removeClass('pure-menu-expanded').addClass('pure-menu-collapsed');
            $(this).siblings('.pure-menu-children').slideDown(100);
            $(this).parent().removeClass('pure-menu-collapsed').addClass('pure-menu-expanded');
        } else {
            $(this).siblings('.pure-menu-children').slideUp(100);
            $(this).parent().removeClass('pure-menu-expanded').addClass('pure-menu-collapsed');
        }
        return false;
    });

	
});