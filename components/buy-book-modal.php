<?php

    $header = get_field('book_buy_modal_header', 'options');

?>

<dialog class="buy-book" id="buy-book-modal">
    <div class="buy-book__wrapper">
        <button class="buy-book__close" id="buy-close-btn" aria-label="Close">&times;</button>

        <div class="buy-book__header">
            <h2 class="buy-book__title"><?php echo $header; ?></h2>
        </div>

        <div class="buy-book__list">
            <?php if(have_rows('book_buy_options', 'options')): while(have_rows('book_buy_options', 'options')): the_row(); ?>
                
                <?php
                    $logo = get_sub_field('logo');
                    $url = get_sub_field('url');
                ?>

                <div class="buy-book__item">
                    <a class="buy-book__link" href="<?php echo esc_url($url); ?>" target="window">
                        <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                    </a>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</dialog>