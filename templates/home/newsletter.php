<?php
    $home = get_option('page_on_front');
    $about = get_field('about', $home);
    $book_cover = $about['book_cover'];

    $newsletter = get_field('newsletter');
    $headline = $newsletter['headline'];
    $copy = $newsletter['copy'];

?>
<section class="newsletter-home | content-grid">
    <div class="newsletter-home__inset">
        <div class="newsletter-home__book-cover">
            <?php echo wp_get_attachment_image($book_cover['ID'], 'medium'); ?>
        </div>

        <div class="newsletter-home__info">
            <h2 class="newsletter-home__headline"><?php echo $headline; ?></h2>

            <div class="newsletter-home__copy | copy copy-2">
                <?php echo $copy; ?>
            </div>

            <?php get_template_part('templates/newsletter/mailchimp-form'); ?>
        </div>
    </div>
</section>