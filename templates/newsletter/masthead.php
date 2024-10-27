<?php

    $image = get_field('newsletter_masthead_image', 'options');
    $copy = get_field('newsletter_masthead_copy', 'options');

?>

<section class="masthead | content-grid">
    <div class="masthead__image">
        <a href="<?php echo site_url('/newsletter/'); ?>">
            <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
        </a>
    </div>

    <div class="masthead__title">
        <?php echo $copy; ?>
    </div>
</section>