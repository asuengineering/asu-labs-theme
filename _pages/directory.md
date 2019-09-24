---
layout: page
title: "Directory"
---

A "directory" page is automatically built for you as you add one or more pages for the individual members of your lab. Just add it to the menu and configure a few key options.

## Screenshots ##

<div id="lightbox" class="lightbox">
    <a href="/../assets/img/directory-front.jpg">
        <img src="/../assets/img/directory-front.jpg" alt="Screen shot: Directory Template" />
    </a>
    <a href="/../assets/img/directory-steps-customizer.jpg">
        <img src="/../assets/img/directory-steps-customizer.jpg" alt="Screen Shot: Steps for adding the directory page to the menu." />
    </a>
</div>

## View the directory ##

Once there is at least one saved page for a person in your website, you can view the directory page at `/people`.

## Add the directory to the menu ##

From either the default menu screen at `wp-admin/nav-menus.php` or within the customizer at `wp-admin/customize.php`, look for the collection of pages under the People post type. At the top of the list, you should see a **People Archive** page. Add this page to the menu and save your changes. 

Once the page has been added to the menu, you can edit the label for the page. We tend to use the label **directory**, but you can name the page anything you like.

## Change the order of the list ## 

Within the directory page, you can choose to highlight members assigned to a particular Faculty / Student Type. Highlighting this category will change the background color on their profile entries and move them to the top of the list automatically. Typically, we use this feature to call out the lab's **principal investigator**, but any category can be highlighted in this way.

To select the highlighted category, edit the correct term within the Faculty / Student Type taxonomy at `wp-admin/edit-tags.php?taxonomy=faculty-type&post_type=person`. Click the checkbox labeled **Display as Featured Person** and save your changes.

<div id="lightbox-2" class="lightbox">
    <a href="/../assets/img/directory-featured-checkbox.jpg">
        <img src="/../assets/img/directory-featured-checkbox.jpg" alt="Screen shot: Featured Person Checkbox" />
    </a>
        <a href="/../assets/img/directory-reorder-terms.gif">
        <img src="/../assets/img/directory-reorder-terms.gif" alt="Screen shot: Drag and Drop, Reorder Terms" />
    </a>
</div>

Within the same taxonomy screen, you can reorder the terms on this page to change the order in which they are displayed on the directory page. Just click and drag them into the correct order and the directory page will be automatically updated.

The click and drag feature is enabled by a plugin called **Intuitive Post Order**. If your site has been built or configured by ASU Engineering, the plugin and drag and drop functionality should be on by default.
{: .info}
