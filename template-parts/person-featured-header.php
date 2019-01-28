<?php
/**
 * Template (partial) for displaying a fancy header for a person within the website.
 * @package asufaculty
 */
?>

<header class="entry-header"> 
    
    <div class="display-person">

        <div class="post-thumbnail">
            <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('asufaculty-square', ['class' => 'pure-img']);
                }
                else {
                    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/person-placeholder.jpg" />';
                }
            ?>
        </div><!-- .post-thumbnail -->

        <?php

            // Get person's full name from meta details
            $first =	carbon_get_the_post_meta( 'person_first_name' );
            $middle =	carbon_get_the_post_meta( 'person_middle_name' );
            $last =		carbon_get_the_post_meta( 'person_last_name' );
            $suffix = 	carbon_get_the_post_meta( 'person_suffix' );

            // Append spaces if not blank. Assume there's always a last name.
            if (!empty(carbon_get_the_post_meta('person_first_name'))) {
                $first .= " ";
            }

            if (!empty(carbon_get_the_post_meta('person_middle_name'))) {
                $middle .= " ";
            }

            echo '<div class="entry-title"><h1 class="person-name">' . $first . $middle . $last . " " . $suffix . '</h1>';

            $tagline = "";
            $tagline = carbon_get_the_post_meta( 'person_tagline' );
            
            if (empty($tagline)) {
                // overwrite the tagline information with taxonomy information if it's blank.
                $tagline = strip_tags (get_the_term_list( get_the_ID(), 'faculty-type', "", ", ", "" ));
            }

            echo '<p class="person-tagline">' . $tagline . '</p></div>'; //layout dependent on this tag being here, even if it's empty;
        ?>

        <ul class="contact-details">
            <?php 
                $email =	carbon_get_the_post_meta( 'person_email' );
                $phone =	carbon_get_the_post_meta( 'person_phone' );
                $location =	carbon_get_the_post_meta( 'person_location' );
                $maplink =	carbon_get_the_post_meta( 'person_location_url' );
                
                if ((!empty($email)) && (is_email($email))) {
                    echo '<li class="email"><a href="mailto:' . $email . '" target="_blank">' . $email . '</a></li>';
                }

                if (!empty($phone)) {
                    // No fancy validation for phone numbers. Just roll with it. 
                    echo '<li class="phone"><a href="tel:' . $phone . '" target="_blank">' . $phone . '</a></li>';
                }

                if (!empty($location)) {
                    // Location has a physical description. Check for a valid URL to go with it.
                    echo '<li class="office-location">';
                    if ((!empty($maplink)) && (wp_http_validate_url($maplink))) {
                        // Valid URL. Let's make it a link.
                        echo '<a href="' . $maplink . '" target=_"blank" title="Office Location: Link to ASU Maps">' . $location . "</a>";
                    } else {
                        // We still have a valid text field. Let's just echo it.
                        echo $location;
                    }
                    echo '</li>';
                } else {
                    // There's no description text. Leave it blank.
                }
            ?>
        </ul>
    </div>

</header><!-- .entry-header -->

<?php
    $isearch = carbon_get_the_post_meta( 'person_isearch' ) ?: '';
    $social_fb = carbon_get_the_post_meta( 'person_facebook' ) ?: '';
    $social_tw = carbon_get_the_post_meta( 'person_twitter' ) ?: '';
    $social_li = carbon_get_the_post_meta( 'person_linkedin' ) ?: '';
    $social_ig = carbon_get_the_post_meta( 'person_instagram' ) ?: '';

    if ((!empty($isearch)) && (wp_http_validate_url($isearch))) {
        echo '<div class="isearch-profile"><div class="container">';
        echo '<a class="isearch-url" href="' . $isearch . '" target=_"blank" title="iSearch Profile link">' . $isearch . "</a>";
        echo '<span class="social">';
        
        if (!empty($social_fb)) {
            echo '<a class="icon" href="' . $social_fb . '" target="blank" title="Facebook"><i class="fab fa-facebook-square"></i></a>';
        }

        if (!empty($social_tw)) {
            echo '<a class="icon" href="' . $social_tw . '" target="blank" title="Twitter"><i class="fab fa-twitter-square"></i></a>';
        }

        if (!empty($social_li)) {
            echo '<a class="icon" href="' . $social_li . '" target="blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>';
        }

        if (!empty($social_ig)) {
            echo '<a class="icon" href="' . $social_ig . '" target="blank" title="Instagram"><i class="fab fa-instagram"></i></a>';
        }
        
        echo '</span>';
        echo '</div></div>';
    }
?>