<?php

    $hero = get_field('hero');
    $original = $hero['original'];
    $enhanced = $hero['enhanced'];

    $headline = $hero['headline'];
    $copy = $hero['copy'];
    $credits = $hero['credits'];

?>

<section class="gallery-hero">
    <div class="gallery-hero__photos">
        <div class="gallery-hero__photo gallery-hero__original">
            <?php echo wp_get_attachment_image($original['ID'], 'full'); ?>
        </div>

        <div class="gallery-hero__photo gallery-hero__enhanced">
            <div class="gallery-hero__enhanced-wrapper">
                <?php echo wp_get_attachment_image($enhanced['ID'], 'full'); ?>
            </div>
        </div>
    </div>

    <div class="gallery-hero__info">
        <div class="gallery-hero__info-wrapper">
            <h1 class="gallery-hero__headline"><?php echo $headline; ?></h1>
            
            <div class="gallery-hero__copy | copy copy-2">
                <?php echo $copy; ?>
            </div>

            <div class="gallery-hero__form-wrapper">
                <?php echo do_shortcode('[bearsmith_password_form]'); ?>
            </div>

            <div class="gallery-hero__credits | copy copy-3">
                <p><?php echo $credits; ?></p>
            </div>
        </div>
    </div>
</section>