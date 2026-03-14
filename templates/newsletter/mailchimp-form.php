<?php
$shortcode = get_field('newsletter', 'options')['form_shortcode'];
if ($shortcode) {
    echo do_shortcode($shortcode);
}
