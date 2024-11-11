<?php get_header(); ?>

    <section class="video | content-grid">
        <div class="video__header">
            <h1 class="video__title"><?php the_title(); ?></h1>
        </div>

        <div class="video__embed">
            <?php echo get_field('embed'); ?>
        </div>



    </section>

<?php get_footer(); ?>