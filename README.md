# ASU Labs Theme

A theme for WordPress to help build and organize small group websites. Ideal for engineering "lab" groups on campus.

## Description

This theme brings to life several templates and custom post types that we commonly found within our collection of working small & medium sized lab groups. It is a parent theme and includes the following assets.

- Font Awesome Pro, version 5.12.0
- Google Font "Roboto", part of the ASU Web Standards.
- Carbon Fields v3.0, loaded as a part of the theme.

## Requirements

To form the relationships needed between our custom post types, this theme requires the use of a plugin called [Posts 2 Posts](https://github.com/asuengineering/wp-posts-to-posts).

- It's an oldie but a goodie. Still working within WP 5.0, even if the original was abandoned in 2016.
- ASU Engineering maintains an active fork of the original plugin to deal with any "breakage" that might occur over time.

![Sparky's Trident](https://brandguide.asu.edu/sites/default/files/styles/panopoly_image_original/public/asu_brandhq_images_master_pitchfork_0.png?itok=CdnAzLZW)

## Enhancements

### Version 2.1

This theme is no longer supported by ASU Engineering as a viable way to build faculty website. This is due to the change in policy with the ASU Unity project to allow for "faculty" sites to look different than "regular" sites. Now, all sites under \*.asu.edu are required to follow the brand standards.

However, the following update was made to the theme to support the 70+ sites that are still actively using the theme. (Many current users are attempting to recover content and convert their sites to Pitchfork.)

- Update Carbon Fields library to latest version via composer. Fixes an issue where metaboxes were no longer visible in WP core 6.0+

### Version 2.0

- The theme no longer includes certain elements from the ASU global header and footer packages. These elements were designed for a layout and mobile experience that differs from this site's vertical menu orientation. The template still includes the global ASU Google Analytics tag.
- Instead, the theme now has an off-canvas mobile menu which tucks the navigation out of the way when the screen size narrows beyond a certain point. The menu slides in from the left when it is needed again.
- The menu area is now a whole lot more customizable. Users will now have the option to add:
  - a custom site image (logo)
  - custom font awesome icons for each menu entry
  - an endorsed logo in the menu "footer"
  - social media icons and general contact information
- The Font Awesome 5 library was updated to version 5.12.0

### Version 1.6

- Added better support for Gutenberg. Adjustments include using ASU color palette, changing the editor styles that match the production site and adding support for wide and full-width alignments on the blocks which support them.
- Refactored `single-research` to remove the floating sidebar. Relationships between research projects and publications are all now located in the footer of the page.
- Added `Funding Sources` as a formal taxonomy to support research projects. Enables the ability to assign multiple projects to the same funding source, as well as a much better interface for keeping track of that info.

### Version 1.5 (Current)

- Adds support to display blog posts on the home page.
- The gold background on post archive pages was way too bright. This update makes is so sunglasses are no longer required.
- Removes unused widget sidebar area and registers two additional sidebar areas. One for under the main navigation, and a second to add context above the blog post listings on the home page.

### Version 1.4.1

- Includes a fix for the default page template and the assigned featured image.
- Adds support for additional custom post types to be featured and displayed correctly on the home page.
- Removes displayed date on `page.php`.

### Version 1.4

- Fixed bug within `taxonomy-research-theme.php` which caused it to display all projects and publications instead of just the related items.
- The accordion panel in the main navigation that contains the current page will now be open by default.
- Enhancements to the mobile menu were introduced in this release.

### Version 1.3

- Includes new ASU header and footer modules. Updated both elements to v4.8.

### Version 1.2

- Adjustments to `archive-person.php` and related CSS for better layout with longer names. Single column layout.
- Bug fix: Dropdown icons in navigation menu now displaying correctly. (Converted to traditonal markup via FA5).

### Version 1.1

The most current version of the theme marks our first example of this theme in production.

- Completed templates for a single publications, research projects and research topics pages.
- Corrected several display problems with `single-person.php` and the related `archive-person.php` directory view.
- Spacing and padding issues were adjusted to avoid collisions for tablet and mobile viewing.
