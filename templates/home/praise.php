


<section class="praise">
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php if(have_rows('praise')): while(have_rows('praise')): the_row(); ?>

                <?php $photo = get_sub_field('image'); ?>

                <div class="swiper-slide">
                    <div class="praise__image">
                        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>

        <div class="swiper-pagination"></div>
    </div>
</section>

