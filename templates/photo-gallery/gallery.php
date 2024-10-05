<section class="gallery | content-grid">

    <?php $items = get_field('list'); if( $items ): ?>
        <div class="gallery__items">

            <?php foreach( $items as $i ): ?>
                <?php
                    $thumbnail = get_field('photos_thumbnail', $i->ID);
                ?>

                <div class="gallery__item">
                    <a class="gallery__link" href="<?php echo get_permalink( $i->ID ); ?>">
                        <div class="gallery__photo">
                            <?php echo wp_get_attachment_image($thumbnail['ID'], 'full'); ?>
                        </div>

                        <div class="gallery__name">
                            <?php echo get_the_title( $i->ID ); ?>
                        </div>                        
                    </a>
                </div>

            <?php endforeach; ?>

        </div>
    <?php endif; ?>

    <?php if(have_rows('pagination')): ?>
        <nav class="gallery__pagination">
            <ul class="gallery__pagination-items" role="nav">

                <?php while(have_rows('pagination')): the_row(); ?>
                
                    <?php 
                        $link = get_sub_field('link');
                        if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>

                        <li class="gallery__pagination-item">
                            <a class="gallery__pagination-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        </li>

                    <?php endif; ?>

                <?php endwhile; ?>

            </ul>
        </nav>
    <?php endif; ?>
    
</section>
