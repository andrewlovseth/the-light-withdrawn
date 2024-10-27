<section class="posts">
    <?php
        $posts_query = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => -1
        ]);

        if ($posts_query->have_posts()): 
    ?>

        <section class="posts__featured | content-grid">
            <div class="posts__list">
                <?php $post_count = 0; while ($posts_query->have_posts() && $post_count < 2) : ?>
                    <?php $posts_query->the_post(); ?>
                    <?php get_template_part('templates/newsletter/teaser-large'); ?>
                <?php $post_count++; endwhile; ?>
            </div>

            <?php get_template_part('templates/newsletter/subscribe'); ?>
        </section>

        <?php if ($posts_query->post_count > 2) : ?>
            <section class="posts__archive | content-grid">
                <div class="fancy-header">
                    <h2 class="fancy-header__title">Previous Posts</h2>
                </div>

                <div class="posts__archive-grid">
                    <?php while ($posts_query->have_posts()) : ?>
                        <?php $posts_query->the_post(); ?>
                        <?php get_template_part('templates/newsletter/teaser-small'); ?>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

</section>