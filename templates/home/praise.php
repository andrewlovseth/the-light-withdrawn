


<section class="praise">
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php if(have_rows('praise')): while(have_rows('praise')): the_row(); ?>

                <?php $quote = get_sub_field('quote');
                $source = get_sub_field('source');
                ?>

                <div class="swiper-slide">
                    <div class="praise__item">
                        <blockquote class="praise__quote"><?php echo $quote; ?></blockquote>
                        <p class="praise__source">&mdash; <?php echo $source; ?></p>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>

        <div class="swiper-pagination"></div>
    </div>
</section>

