<?php

    $title = get_the_title();
    $link = get_the_permalink();
    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $subhed = get_field('subhed');

?>


<div class="teaser teaser-large">
    <div class="teaser-large__image">
        <?php if ($featured_image) : ?>
            <a href="<?php echo $link; ?>">
                <img src="<?php echo $featured_image; ?>" alt="<?php echo $title; ?>">
            </a>
        <?php endif; ?>
    </div>
    <div class="teaser-large__info">
        <h3 class="teaser-large__title">
            <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
        </h3>
        <?php if ($subhed) : ?>
            <div class="teaser-large__copy | copy copy-1">
                <p><?php echo $subhed; ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>