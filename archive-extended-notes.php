<?php get_header(); ?>


    <?php
        $title = get_field('extended_notes_title', 'options');
        $photo = get_field('extended_notes_hero_photo', 'options');
        $copy = get_field('extended_notes_hero_copy', 'options');

        $args = [
            'title' => $title,
            'photo' => $photo,
            'copy' => $copy

        ];

        get_template_part('components/hero', null, $args);
    ?>


<?php get_footer(); ?>