---
layout: page
title: "Individual Profiles"
---

Individual profiles pages can be created by following the People->Add New Person links from the dashboard.

## Screenshots ##

<div id="lightbox" class="lightbox">
    <a href="/assets/img/person-front.jpg">
        <img src="/assets/img/person-front.jpg" alt="Illustration of relationship between research projects" />
    </a>
        <a href="/assets/img/person-admin.jpg">
        <img src="/assets/img/person-admin.jpg" alt="Illustration of relationship between research projects" />
    </a>
</div>

## Minimum Information Needed ##

To create a good-looking profile page for a member of your group, you need the following information:

- a 2-3 sentence description of the person.
- the person's first and last name, their email address and their iSearch URL.

You will also need to decide how this person should be categorized within the directory page. (See Faculty/Student Types for more detail.)

Profile pages should also include a photo of the person being featured. The photo should be at least 600px x 600px. A square crop is preferred. If a photo is not included in the profile, a default ASU image will appear in its place.
{: .photo}

## Completed Profile ## 

In addition to the information above, a complete profile can include any of the following details.

- a more complete statement about the person being featured. The page is essentially blank and can house sections that can include a mission statement info, links to external resources, personal anecdotes, etc.
- a "tagline" which replaces the default Faculty/Student type label when viewing the individual profile page.
- a phone number
- a building or office location + a link to ASU Maps
- social media links to Twitter, LinkedIn, Facebook or Instagram.

## Technical Details ##

The `person` template includes several post meta fields for the following information.

Post Title
: Used only for admin purposes. Names within the site are always derived from the individual name fields captured within the post.

Content
: One or two paragraphs about the person.

Name fields
: First, Middle, Last, Suffix.

Personal tagline
: Perfect for displaying role/responsibility information for duties assigned within the lab.

iSearch Profile URL
: Displays prominently under the main header section on the page
: **Note**{:.label .label-yellow} Social media icons will not display unless there is a URL in this field.

Email Address
: Automatically creates a `mailto:` link based on the address.

Phone Number
: Automatically creates a `tel:` link which will dial the number on a mobile device.

Building/Location
: Provides some indication of where you might be found on campus.
: Typically used for an [ASU building code](https://tours.asu.edu/tempe/building-codes), but any text will work.

Map URL
: If a URL is provided in this field, it will turn the building/location text above into a link to the specified URL.
: Typically used to provide a link to [ASU Maps](https://www.asu.edu/map/interactive/) application. 

Social Media URLs
: When indicated, a small icon will be present on the profile screen near the iSearch URL for each of the platforms represented.
