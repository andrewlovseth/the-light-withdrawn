<?php

    $about = get_field('about');
    $book_cover = $about['book_cover'];
    $headline = $about['headline'];
    $top_copy = $about['top_copy'];
    $bottom_copy = $about['bottom_copy'];

?>

<section class="home-about | content-grid">

    <div class="home-about__grid">
        <div class="home-about__book-cover">
            <a href="#" class="home-about__book-cover-link js-buy-link">
                <?php echo wp_get_attachment_image($book_cover['ID'], 'full'); ?>
            </a>
        </div>

        <div class="home-about__info">
            <h1 class="home-about__headline"><?php echo $headline; ?></h1>

            <div class="home-about__copy | copy copy-1">
                <div class="home-about__copy-top | flow">
                    <?php echo $top_copy; ?>
                </div>

                <div id="more" class="home-about__copy-bottom | flow">
                    <?php echo $bottom_copy; ?>
                </div>

                <a class="home-about__more-link" href="#more">Keep Reading >></a>

            </div>
        </div>
    </div>

</section>