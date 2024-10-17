<?php

    $events = get_field('events', 'options');
    $header = $events['header'];
    $copy = $events['copy'];

?>

<section class="events content-grid">
    <div class="fancy-header">
        <h3 class="fancy-header__title"><?php echo $header; ?></h3>
    </div>

    <div class="events-header__copy | copy copy-1">
        <?php echo $copy; ?>
    </div>

    <div class="events__list">
        <?php
            $today = current_time('Ymd');

            $query = new WP_Query(array(
                'post_type'      => 'events',
                'posts_per_page' => -1, 
                'meta_key'       => 'date',
                'orderby'        => 'meta_value',
                'order'          => 'ASC',
                'meta_query'     => array(
                    array(
                        'key'     => 'date',
                        'value'   => $today,
                        'compare' => '>=',
                        'type'    => 'CHAR',
                    ),
                ),
            ));

            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                <?php get_template_part('templates/archive-events/event'); ?>

        <?php endwhile; else : ?>

                <?php get_template_part('templates/archive-events/no-events'); ?>
            
        <?php  endif; wp_reset_postdata(); ?>
    </div>

</section>