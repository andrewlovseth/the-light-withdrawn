<?php

    $photos = get_field('photos');
    $watermark = $photos['watermark'];
    $original = $photos['original'];
    $enhanced = $photos['enhanced'];

    if($enhanced) {
        $width = $enhanced['width'];
        $height = $enhanced['height'];
    }

    $info = get_field('info');
    $original_year = $info['original_year'] ?? '';


    $current_post_id = get_the_ID();
    $pagination = get_photo_gallery_pagination_links($current_post_id);
    $prev_post_link = $pagination['prev_post_link'];
    $next_post_link = $pagination['next_post_link'];

?>

<div class="photo__preview">
    <div class="photo__pagination photo__prev">
        <a href="<?php echo esc_url($prev_post_link); ?>" class="photo__pagination-link">
            <svg width="29" height="50" viewBox="0 0 29 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.8462 49L2 25L27.8462 1" stroke="#8ACAD7" stroke-width="2" stroke-linecap="round"/>
            </svg>      
        </a>
    </div>

    <div class="photo__preview-pane">
        <div class="photo__preview-viewer">
            <div id="enhanced-photo" class="photo__preview-enchanced"  style="aspect-ratio: <?php echo $width; ?> / <?php echo $height; ?>;">
                <?php if(is_protected_content()): ?>
                    <?php echo wp_get_attachment_image($watermark['ID'], 'full'); ?>
                <?php else: ?>
                    <?php echo wp_get_attachment_image($enhanced['ID'], 'full'); ?>
                <?php endif; ?>
            </div>

                <div id="original-photo" class="photo__preview-original" style="aspect-ratio: <?php echo $width; ?> / <?php echo $height; ?>;">

                    <?php if($original): ?>
                        <?php echo wp_get_attachment_image($original['ID'], 'full'); ?>        
                    <?php endif; ?>
        
                </div>
        </div>

        <div class="photo__preview-tabs<?php if($original == ''): ?> hide<?php endif; ?>">
            <a href="#original" class="photo__preview-tab photo__preview-original-tab">
                <span class="photo__preview-view-label">View the</span>
                <span class="photo__preview-type-label">
                    <?php if($original_year): ?><span class="photo__preview-year-label"><?php echo $original_year; ?></span><?php endif; ?>
                     Image
                </span>
            </a>

            <a href="#enhanced" class="photo__preview-tab photo__preview-enhanced-tab active">
                <span class="photo__preview-view-label">View the</span>
                <span class="photo__preview-type-label">Enhanced Image</span>
            </a>
        </div>
    </div>

    <div class="photo__pagination photo__next">
        <a href="<?php echo esc_url($next_post_link); ?>" class="photo__pagination-link">
            <svg width="29" height="50" viewBox="0 0 29 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.00004 1L26.8462 25L1.00004 49" stroke="#8ACAD7" stroke-width="2" stroke-linecap="round"/>
            </svg>            
        </a>
    </div>
</div>