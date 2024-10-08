<?php

    $args = wp_parse_args($args);

    if(!empty($args)) {
        $title = $args['title']; 
        $photo = $args['photo']; 
        $copy = $args['copy']; 
    }
    
?>

<section class="hero">
    <div class="hero__info">
        <div class="hero__info-wrapper">
            
            <h1 class="hero__title"><?php echo $title; ?></h1>

            <?php if($copy): ?>
                <div class="hero__copy | copy copy-2 flow">
                    <?php echo $copy; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="hero__photo">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </div>
    
</section>