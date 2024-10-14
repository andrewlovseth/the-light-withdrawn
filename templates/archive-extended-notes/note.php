<?php

    $args = wp_parse_args($args);

    if(!empty($args)) {
        $id = $args['id']; 
    }

    $file = get_field('file', $id);
    $display_title = get_field('display_title', $id);
    $pages = get_field('pages', $id);
    
?>

<div class="single-note">
    <div class="single-note__title">
        <a href="<?php echo $file['url']; ?>"><?php echo $display_title; ?></a>
    </div>

    <div class="single-note__pages">
        <?php if($pages):?>
            <em><?php echo $pages; ?></em>
        <?php endif; ?>
    </div>
</div>
