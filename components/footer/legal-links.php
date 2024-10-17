<?php if(have_rows('footer_legal_links', 'options')): ?>
    
    <ul class="site-footer__legal-links" role="nav">
        <?php while(have_rows('footer_legal_links', 'options')): the_row(); ?>

            <?php 
                $link = get_sub_field('link');
                if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>

                <div class="legal-link">
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                </div>

            <?php endif; ?>
    
        <?php endwhile; ?>
    </ul>
<?php endif; ?>