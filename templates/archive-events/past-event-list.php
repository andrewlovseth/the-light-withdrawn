<section class="events past-events content-grid">
    <div class="fancy-header">
        <h3 class="fancy-header__title">Past Events and Signings</h3>
    </div>

    <div class="events__list">
        <?php
            $today = current_time('Ymd');

            $query = new WP_Query(array(
                'post_type'      => 'events',
                'posts_per_page' => -1, 
                'meta_key'       => 'date',
                'orderby'        => 'meta_value',
                'order'          => 'DESC', // Changed to DESC to show most recent past events first
                'meta_query'     => array(
                    array(
                        'key'     => 'date',
                        'value'   => $today,
                        'compare' => '<', // Changed to < to get past events
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