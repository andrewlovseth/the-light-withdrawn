<?php

    $show = get_the_title();
    $date = get_the_date('M j, Y');
    $title = get_field('title');
    $description = get_field('description');
    $cover = get_field('cover');
    $action_label = get_field('action_label');

    $links = get_field('links');
    $apple_podcasts = $links['apple_podcasts'];
    $spotify = $links['spotify'];
    $youtube = $links['youtube'];
    $amazon_music = $links['amazon_music'];

?>

<article class="podcast">
    <div class="podcast__cover">
        <?php echo wp_get_attachment_image($cover['ID'], 'medium'); ?>        
    </div>

    <div class="podcast__info">
        <h3 class="podcast__title"><?php echo $title; ?></h3>
        <h4 class="podcast__show_and_date"><?php echo $show; ?> | <?php echo $date; ?></h4>

        <div class="podcast__description | copy copy-2">
            <?php echo $description; ?>
        </div>

        <?php if($apple_podcasts || $spotify || $youtube || $amazon_music): ?>
            <div class="podcast__listen">
                <h5 class="podcast__listen-label"><?php echo $action_label; ?></h5>

                <?php if($apple_podcasts): ?>
                    <a href="<?php echo $apple_podcasts; ?>" class="podcast__listen-link apple-podcasts" target="_blank"><?php get_template_part('svg/icon-apple-podcasts'); ?></a>
                <?php endif; ?> 

                <?php if($spotify): ?>
                    <a href="<?php echo $spotify; ?>" class="podcast__listen-link spotify" target="_blank"><?php get_template_part('svg/icon-spotify'); ?></a>
                <?php endif; ?> 

                <?php if($youtube): ?>
                    <a href="<?php echo $youtube; ?>" class="podcast__listen-link youtube" target="_blank"><?php get_template_part('svg/icon-youtube'); ?></a>
                <?php endif; ?>          

                <?php if($amazon_music): ?>
                    <a href="<?php echo $amazon_music; ?>" class="podcast__listen-link amazon-music" target="_blank"><?php get_template_part('svg/icon-amazon-music'); ?></a>
                <?php endif; ?>          
            </div>
        <?php endif; ?>
    </div>
</article>