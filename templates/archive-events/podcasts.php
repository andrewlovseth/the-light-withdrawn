<?php

    $podcasts = get_field('podcasts', 'options');
    $header = $podcasts['header'];
    $copy = $podcasts['copy'];  

?>


<section class="podcasts content-grid">

    <div class="fancy-header">
        <h1 class="fancy-header__title"><?php echo $header; ?></h1>
    </div>

    <div class="podcasts__copy | copy copy-2">
        <?php echo $copy; ?>
    </div>


    <div class="podcasts__list">
        <?php
            $podcast_query = new WP_Query(array(
                'post_type' => 'podcast',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC'
            ));

            if ($podcast_query->have_posts()) :
                while ($podcast_query->have_posts()) : $podcast_query->the_post();
                    get_template_part('templates/archive-events/podcast');
                endwhile;
                wp_reset_postdata();
            endif;
        ?>
    </div>

</section>