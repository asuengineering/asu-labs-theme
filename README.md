# ASU Labs Theme

A theme for WordPress to help build and organize small group websites. Ideal for engineering "lab" groups on campus.

## Description

This theme brings to life several templates and custom post types that we commonly found within our collection of working small & medium sized lab groups. It is a parent theme and includes the following assets.

- ASU Header and Footer, version 4.6
- Font Awesome Pro, version 5.2
- Google Font "Roboto", part of the ASU Web Standards.
- Carbon Fields v3.0, loaded as a part of the theme.

## Requirements

To form the relationships needed between our custom post types, this theme requires the use of a plugin called [Posts 2 Posts](https://github.com/asuengineering/wp-posts-to-posts).

- It's an oldie but a goodie. Still working within WP 5.0, even if the original was abandoned in 2016.
- ASU Engineering maintains an active fork of the original plugin to deal with any "breakage" that might occur over time.

![Sparky's Trident](https://brandguide.asu.edu/sites/default/files/styles/panopoly_image_original/public/asu_brandhq_images_master_pitchfork_0.png?itok=CdnAzLZW)

## Enhancements

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
