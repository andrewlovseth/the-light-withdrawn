<?php

    $title = get_the_title();
    $date = get_field('date');
    $time = get_field('time');
    $copy = get_field('copy');
    $link = get_field('link');

    $date_object = DateTime::createFromFormat('Ymd', $date);
    $time = preg_replace(
        '/(a\.m\.|p\.m\.)/i', // Pattern to match "a.m." or "p.m.", case insensitive
        '<span class="small-caps">$1</span>', // Replacement with <span> wrapping
        $time
    );

?>

<div class="event">
    <div class="event__header">
        <h3 class="event__title"><?php echo $title; ?></h3>
        <h3 class="event__date-time">
            <?php if($date_object): ?>
                <span class="event__date">
                    <?php echo $date_object->format('M. j, Y'); ?>
                </span>
            <?php endif; ?>

            <?php if($time): ?>
                <span class="event__time">
                    <?php echo $time; ?>
                </span>
            <?php endif; ?>
        </h3>
    </div>

    <div class="event__body">
        <div class="event__copy copy-2">
            <?php echo $copy; ?>
        </div>
    </div>
    
    <div class="event__footer">

        <?php 
            if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>

            <div class="event__cta">
                <a class="event__link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            </div>

        <?php endif; ?>
    </div>
</div>