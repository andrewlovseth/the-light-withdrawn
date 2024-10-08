<?php

    $args = wp_parse_args($args);

    if(!empty($args)) {
        $i = $args['item']; 
    }

    $thumbnail = get_field('photos_thumbnail', $i->ID);
?>

<div class="gallery__item">
    <a class="gallery__link" href="<?php echo get_permalink( $i->ID ); ?>">
        <div class="gallery__photo">
            <?php if($thumbnail): ?>
                <?php echo wp_get_attachment_image($thumbnail['ID'], 'full'); ?>
            <?php endif; ?>
        </div>

        <div class="gallery__name">
            <?php echo get_the_title( $i->ID ); ?>
        </div>                        
    </a>
</div>