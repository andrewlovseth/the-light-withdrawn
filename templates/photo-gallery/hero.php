<?php

    $hero = get_field('hero');
    $original = $hero['original'];
    $enhanced = $hero['enhanced'];

    $headline = $hero['headline'];
    $copy = $hero['copy'];
    $credits = $hero['credits'];

?>


<section class="hero">

    <div class="hero__photos">
        <div class="hero__photo hero__original">
            <?php echo wp_get_attachment_image($original['ID'], 'full'); ?>
        </div>

        <div class="hero__photo hero__enhanced">
            <div class="hero__enhanced-wrapper">
                <?php echo wp_get_attachment_image($enhanced['ID'], 'full'); ?>
            </div>
        </div>
    </div>

    <div class="hero__info">
        <div class="hero__info-wrapper">
            <h1 class="hero__headline"><?php echo $headline; ?></h1>
            
            <div class="hero__copy | copy copy-2">
                <?php echo $copy; ?>
            </div>

            <div class="hero__form-wrapper">
                <form class="hero__form">
                    <input class="hero__form-input" type="text" placeholder="Type here (case-sensitive)" />
                    <input class="hero__form-btn" type="button" value="Enter">
                </form>
            </div>

            <div class="hero__credits | copy copy-3">
                <p><?php echo $credits; ?></p>
            </div>
        </div>

    </div>

</section>