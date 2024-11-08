<?php

    $excerpt = get_field('excerpt');
    $photo = $excerpt['photo'];
    $header = $excerpt['header'];   
    $copy = $excerpt['copy'];
    $note = $excerpt['note'];
    $file = $excerpt['file'];

?>

<section class="excerpt | content-grid">

    <div class="fancy-header">
        <h3 class="excerpt__header | fancy-header__title"><?php echo $header; ?></h3>
    </div>

    <div class="excerpt__photo">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </div>

    <div class="excerpt__info">
        <div class="excerpt__note">
            <?php echo $note; ?>
        </div>

        <div class="excerpt__copy | copy copy-1">
            <?php echo $copy; ?>
        </div>

        <a href="<?php echo $file['url']; ?>" class="excerpt__link" target="window">Keep Reading >></a>
    </div>

</section>