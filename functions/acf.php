<?php

/*
    Advanced Custom Fields
*/

// Order Relationship fields
function bearsmith_relationship_order_by_date($args, $field, $post_id) {
    $args['orderby'] = 'date';
    $args['order'] = 'DESC';
    return $args;
}
add_filter('acf/fields/relationship/query', 'bearsmith_relationship_order_by_date', 10, 3);


// Custom back-end styles
function bearsmith_acf_styles() {
    ?>

        <style type="text/css">
            .acf-relationship .list {
                height: 400px;
            }
        </style>

    <?php
}
add_action('acf/input/admin_head', 'bearsmith_acf_styles');



// Modify the admin menu icon for the Podcast post type
function podcast_custom_post_type_icon() {
    ?>
    <style>
        /* Target the Podcast menu item by its post type */
        #menu-posts-podcast .wp-menu-image img {
            display: none; /* Hide the default icon */
        }
        #menu-posts-podcast .wp-menu-image:before {
            content: ''; /* Clear the default dashicon font */
            display: inline-block;
            width: 16px;
            height: 17px;
            mask: url('<?php echo get_stylesheet_directory_uri(); ?>/img/dashicon-podcast.svg') no-repeat center;
            -webkit-mask: url('<?php echo get_stylesheet_directory_uri(); ?>/img/dashicon-podcast.svg') no-repeat center;
            background-color: currentColor;
        }
    </style>
    <?php
}
add_action('admin_head', 'podcast_custom_post_type_icon');