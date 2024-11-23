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


// Force the press post type to be ordered by menu order
add_action('pre_get_posts', function ($query) {
    // Check if we're in the admin area and on the correct post type list screen
    if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'press') {
        // Set the order and orderby parameters
        $query->set('orderby', 'menu_order');
        $query->set('order', 'ASC'); // Change to DESC if you want descending order
    }
});