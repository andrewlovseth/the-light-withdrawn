<?php

    $author = get_field('author');
    $header = $author['header'];
    $photo = $author['photo'];
    $copy = $author['copy'];

?>

<section class="home-author | content-grid">
    <div class="fancy-header">
        <h3 class="fancy-header__title"><?php echo $header; ?></h3>
    </div>

    <div class="home-author__grid">
        <div class="home-author__photo">
            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>

            <?php if($photo['caption']): ?>
                <div class="home-author__photo-caption">
                    <span class="small-caps"><?php echo $photo['caption']; ?></span>
                </div>
            <?php endif; ?>
        </div>

        <div class="home-author__copy | copy copy-1">
            <?php echo $copy; ?>
        </div>
    </div>
</section>