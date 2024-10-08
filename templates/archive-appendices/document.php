<?php

    $args = wp_parse_args($args);

    if(!empty($args)) {
        $id = $args['id']; 
    }

    $label = get_field('label', $id);
    $title = get_field('title', $id);
    $file = get_field('file', $id);
    
?>

<div class="appendix">
    <h4 class="appendix__label"><?php echo $label; ?></h4>
    <a class="appendix__link" href="<?php echo $file['url']; ?>" target="window">
        <?php echo $title; ?>
    </a>
</div>
