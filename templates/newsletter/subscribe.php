<?php
    $home = get_option('page_on_front');
    $about = get_field('about', $home);
    $book_cover = $about['book_cover'];

?>
<section class="subscribe">
    <h2 class="subscribe__title">Be the first to know</h2>

    <div class="subscribe__book-cover">
        <?php echo wp_get_attachment_image($book_cover['ID'], 'medium'); ?>
    </div>

    <div class="subscribe__copy | copy copy-2">
        <p>Never miss a post! Subscribe today to the free <em>Official Bulletin</em> newsletter by entering your email below:</p>
    </div>

    <?php get_template_part('templates/newsletter/mailchimp-form'); ?>
</section>