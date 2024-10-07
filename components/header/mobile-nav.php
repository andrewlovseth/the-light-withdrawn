<div class="site-header__mobile">

    <div class="site-logo site-logo__mobile">
        <a href="<?php echo site_url('/'); ?>">
            <?php $logo = get_field('header_logo', 'options'); echo wp_get_attachment_image($logo['ID'], 'full'); ?>
        </a>
    </div>

    <div class="site-header__hamburger hamburger">
        <a href="#" class="hamburger__link js-nav-trigger">
            <div class="hamburger__buns">
                <div class="hamburger__patty"></div>
            </div>
        </a>
    </div>

    <div id="mobile-nav">
        <ul class="site-nav site-nav__mobile">
            <?php if(have_rows('footer_nav', 'options')): while(have_rows('footer_nav', 'options')): the_row(); ?>

                <?php 
                    $link = get_sub_field('link');
                    if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                    <li class="site-nav__mobile-item">
                        <a class="site-nav__mobile-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    </li>

                <?php endif; ?>
            <?php endwhile; endif; ?>    
        </ul>    
    </div>
    
</div>