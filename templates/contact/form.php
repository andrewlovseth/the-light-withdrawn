<?php

    $show_hide = get_field('show_hide_form');
    $form = get_field('form');

    if($show_hide):

?>

    <div class="contact__form | content-grid">
        <div class="contact__form-wrapper">
            <?php echo do_shortcode($form); ?>
        </div>
    </div>

<?php endif; ?>