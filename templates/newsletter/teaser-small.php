<?php

    $title = get_the_title();
    $link = get_the_permalink();
    $subhed = get_field('subhed');
?>


<div class="teaser teaser-small">
    <h3 class="teaser-small__title">
        <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
    </h3>
    <?php if ($subhed) : ?>
        <div class="teaser-small__copy | copy copy-2">
            <p><?php echo $subhed; ?></p>
        </div>
    <?php endif; ?>
</div>