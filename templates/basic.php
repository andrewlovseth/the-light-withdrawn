<?php

/*

    Template Name: Basic

*/

get_header(); ?>

    <section class="page-header | content-grid">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </section>

    <section class="page-content | content-grid">
        <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

            <div class="page-content__wrapper | copy copy-1 flow">
                <?php the_content(); ?>
            </div>

        <?php endwhile; endif; ?>
    </section>

<?php get_footer(); ?>