<?php

    $media = get_field('media');
    $header = $media['header'];
    $quotes = $media['quotes'];

?>
 
<section class="media | content-grid">
    <div class="fancy-header">
        <h3 class="fancy-header__title"><?php echo $header; ?></h3>
    </div>

    <div class="media__grid">
        <?php if( $quotes ): ?>
            <?php foreach( $quotes as $q ): ?>
                <?php
                    $quote = get_field('quote', $q->ID);
                    $logo = get_field('logo', $q->ID);
                    $link = get_field('link', $q->ID);
                    $title = get_the_title($q->ID);
                ?>

                <div class="media__item <?php echo sanitize_title_with_dashes($title); ?>">
                    <div class="media__quote"><?php echo $quote; ?></div>
                    <div class="media__logo"><?php echo wp_get_attachment_image($logo['ID'], 'full'); ?></div>
                    <?php if($link): ?>
                        <a href="<?php echo $link['url']; ?>" class="media__link" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>

    <div class="media__cta">
        <a class="media__cta-link" href="<?php echo site_url('/media/'); ?>">View All Media >></a>
    </div>

</section>

