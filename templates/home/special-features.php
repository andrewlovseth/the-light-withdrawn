<?php

    $special_features = get_field('special_features');
    $header = $special_features['header'];

if(have_rows('special_features')): while(have_rows('special_features')): the_row(); ?>
 
<section class="special-features | content-grid">
    <div class="fancy-header">
        <h3 class="fancy-header__title"><?php echo $header; ?></h3>
    </div>

    <div class="special-features__grid">
        <?php if(have_rows('features')): while(have_rows('features')): the_row(); ?>

            <?php
                $photo = get_sub_field('photo');
                $link = get_sub_field('link');
                $copy = get_sub_field('copy');

                if( $link ) {
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                }                
            ?>

            <div class="special-features__item">
                <div class="special-features__photo">
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <?php echo wp_get_attachment_image($photo['ID'], 'medium'); ?>
                    </a>
                </div>

                <div class="special-features__info">
                    <h2 class="special-features__title">
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    </h2>

                    <div class="special-features__copy | copy copy-2">
                        <?php echo $copy; ?>
                    </div>
                </div>
            </div>
 


        <?php endwhile; endif; ?>

    </div>
</section>

<?php endwhile; endif; ?>