<?php

function get_video_pagination_links($current_post_id) {
    // Query all 'photo-gallery' posts ordered by menu_order (default field for hierarchical post types)
    $args = array(
        'post_type'      => 'video', // Your custom post type
        'posts_per_page' => -1, // Fetch all posts
        'orderby'        => 'menu_order', // Use built-in menu_order field
        'order'          => 'ASC', // Ascending order
        'post_status'    => 'publish', // Ensure only published posts are queried
    );

    $all_posts = new WP_Query($args);

    // Prepare pagination links
    $pagination = array(
        'prev_post_link' => '',
        'next_post_link' => ''
    );

    if ($all_posts->have_posts()) {
        $post_ids = array();

        // Build an array of post IDs in the correct menu order
        while ($all_posts->have_posts()) {
            $all_posts->the_post();
            $post_ids[] = get_the_ID();
        }

        // Find the index of the current post
        $current_index = array_search($current_post_id, $post_ids);

        // If current index is valid, calculate the next and previous post indices
        if ($current_index !== false) {
            $prev_index = ($current_index - 1 + count($post_ids)) % count($post_ids);
            $next_index = ($current_index + 1) % count($post_ids);

            // Get the previous and next post IDs
            $prev_post_id = $post_ids[$prev_index];
            $next_post_id = $post_ids[$next_index];

            // Set the previous and next post links
            $pagination['prev_post_link'] = get_permalink($prev_post_id);
            $pagination['next_post_link'] = get_permalink($next_post_id);
        }

        // Reset post data to avoid conflicts with other queries
        wp_reset_postdata();
    }

    return $pagination;
}