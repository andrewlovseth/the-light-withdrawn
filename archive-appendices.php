<?php get_header(); ?>


    <?php
        $title = get_field('appendices_title', 'options');
        $photo = get_field('appendices_hero_photo', 'options');
        $copy = NULL;

        $args = [
            'title' => $title,
            'photo' => $photo,
            'copy' => $copy
        ];

        get_template_part('components/hero', null, $args);
    ?>

    <?php get_template_part('templates/archive-appendices/documents'); ?>


<?php get_footer(); ?>