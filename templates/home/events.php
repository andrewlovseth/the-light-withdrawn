<section class="events content-grid">
    <div class="fancy-header">
        <h3 class="fancy-header__title">Coming Events</h3>
    </div>

    <div class="events__list">
        <?php
            $today = current_time('Ymd');

            $query = new WP_Query(array(
                'post_type'      => 'events',
                'posts_per_page' => 3, 
                'meta_key'       => 'date',
                'orderby'        => 'meta_value',
                'order'          => 'ASC',
                'meta_query'     => array(
                    array(
                        'key'     => 'date',
                        'value'   => $today,
                        'compare' => '>=',
                        'type'    => 'DATE',
                    ),
                ),
            ));

            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                <?php get_template_part('templates/archive-events/event'); ?>

        <?php endwhile; else : ?>

                <?php get_template_part('templates/archive-events/no-events'); ?>
            
        <?php  endif; wp_reset_postdata(); ?>
    </div>

    <div class="events__cta-all">
        <a class="events__cta-link" href="<?php echo site_url('/events/'); ?>">View All Events >></a>
    </div>
</section>