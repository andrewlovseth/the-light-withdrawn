<?php

/*

    Template Name: Media

*/

get_header(); ?>

    <section class="page-header">
        <h1 class="page-title">Media</h1>
    </section>


    <section class="media | content-grid">
        <div class="fancy-header">
            <h1 class="fancy-header__title">Book Reviews</h1>
        </div>

        <div class="media__grid">


        <?php
            $query = new WP_Query(array(
                'post_type'      => 'press',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'ASC'
            ));

            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                <?php
                    $quote = get_field('quote');
                    $logo = get_field('logo');
                    $link = get_field('link');
                ?>

                <div class="media__item">
                    <div class="media__quote"><?php echo $quote; ?></div>
                    <div class="media__logo"><?php echo wp_get_attachment_image($logo['ID'], 'full'); ?></div>
                    <?php if($link): ?>
                        <a href="<?php echo $link['url']; ?>" class="media__link" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                    <?php endif; ?>
                </div>

            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>




        
    </section>

<?php get_footer(); ?>
