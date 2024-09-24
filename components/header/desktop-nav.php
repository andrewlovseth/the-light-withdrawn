<div class="site-header__desktop | content-grid">

    <?php if(have_rows('header_nav_left', 'options')): ?>

        <ul class="site-nav site-nav__desktop site-nav__left" role="nav">
    
            <?php while(have_rows('header_nav_left', 'options')): the_row(); ?>

                <?php 
                    $link = get_sub_field('link');
                    if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                    <li>
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                            <?php echo esc_html($link_title); ?>
                        </a>
                    </li>

                <?php endif; ?>
            
            <?php endwhile; ?>

        </ul>
        
    <?php endif; ?>

    <div class="site-logo site-logo__desktop">
        LOGO
    </div>


    <?php if(have_rows('header_nav_right', 'options')): ?>

        <ul class="site-nav site-nav__desktop site-nav__right" role="nav">
    
            <?php while(have_rows('header_nav_right', 'options')): the_row(); ?>

                <?php 
                    $link = get_sub_field('link');
                    if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                    <li>
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                            <?php echo esc_html($link_title); ?>
                        </a>
                    </li>

                <?php endif; ?>
            
            <?php endwhile; ?>

        </ul>
        
    <?php endif; ?>

</div>