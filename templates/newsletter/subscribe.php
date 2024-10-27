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


    <form action="https://cox.us22.list-manage.com/subscribe/post?u=d7ce75f7005ed4d56629b349e&amp;id=facef28f03&amp;f_id=0098d5e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_self" novalidate="">
            <div class="mc-field-group subscribe__form">
                <input type="email" name="EMAIL" class="subscribe__input required email" id="mce-EMAIL" placeholder="Type your email address here" required="" value="">
                <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button subscribe__btn" value="Subscribe">

            </div>
            <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display: none;"></div>
                    <div class="response" id="mce-success-response" style="display: none;"></div>
                            </div>
                <div aria-hidden="true" style="position: absolute; left: -5000px;"><input type="text" name="b_d7ce75f7005ed4d56629b349e_facef28f03" tabindex="-1" value=""></div>
            </div>
        </form>





</section>