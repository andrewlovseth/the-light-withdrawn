<?php

    $illustration = get_field('illustration');
    $copy = get_field('copy');

?>

<div class="contact__info | content-grid">
    <div class="contact__info-wrapper">
        <div class="contact__illustration">
            <?php echo wp_get_attachment_image($illustration['ID'], 'full'); ?>
        </div>

        <div class="contact__details">
            <h1 class="page-title"><?php the_title(); ?></h1>

            <div class="contact__copy | copy copy-2 flow">
                <?php echo $copy; ?>
            </div>
        </div>
    </div>

</div>