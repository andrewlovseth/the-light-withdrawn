<?php

    $image = get_field('newsletter_about_image', 'options');
    $headline = get_field('newsletter_about_headline', 'options');
    $copy = get_field('newsletter_about_copy', 'options');

?>

<section class="about-newsletter | content-grid">
    <div class="about-newsletter__wrapper">
        <div class="about-newsletter__image">
            <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
        </div>
        <div class="about-newsletter__info">
            <h3 class="about-newsletter__headline"><?php echo $headline; ?></h3>
            <div class="about-newsletter__copy | copy copy-2">
                <?php echo $copy; ?>
            </div>
        </div>
    </div>
</section>