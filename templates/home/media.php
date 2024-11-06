<?php

    $media = get_field('media');
    $header = $media['header'];

if(have_rows('media')): while(have_rows('media')): the_row(); ?>
 
    <section class="media | content-grid">
        <div class="fancy-header">
            <h3 class="fancy-header__title"><?php echo $header; ?></h3>
        </div>

        <div class="media__grid">

            <?php if(have_rows('quotes')): while(have_rows('quotes')): the_row(); ?>

                <?php
                    $quote = get_sub_field('quote');
                    $logo = get_sub_field('logo');
                    $link = get_sub_field('link');
                    $color = get_sub_field('color');
                ?>

                <div class="media__item" style="background-color: <?php echo $color; ?>">
                    <div class="media__quote"><?php echo $quote; ?></div>
                    <div class="media__logo"><?php echo wp_get_attachment_image($logo['ID'], 'full'); ?></div>
                    <?php if($link): ?>
                        <a href="<?php echo $link['url']; ?>" class="media__link" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                    <?php endif; ?>
                </div>

            <?php endwhile; endif; ?>

        </div>
    </section>

<?php endwhile; endif; ?>
