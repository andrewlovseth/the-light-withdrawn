<?php get_header(); ?>
    <?php get_template_part('templates/newsletter/masthead'); ?>

    <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

        <article class="article | content-grid">
            <section class="article-header">

                <?php if (has_post_thumbnail()) : ?>
                    <div class="article__image">
                        <?php the_post_thumbnail(); ?>

                        <?php if (get_post(get_post_thumbnail_id())->post_excerpt) : ?>
                            <div class="article__image-caption">
                                <p><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <h1 class="article__title"><?php the_title(); ?></h1>
            </section>

            <section class="article-body | copy copy-1">
                <?php the_content(); ?>
            </section>

            <section class="article-footer">
                <div class="article__pagination">
                    <a href="<?php echo site_url('/newsletter/'); ?>" class="article__pagination-link prev-post">
                        <?php get_template_part('svg/icon-arrow-left'); ?>
                        Back to Main
                    </a>
                    <a href="<?php 
                        $next_post = get_adjacent_post(false, '', false);
                        if ($next_post) {
                            echo get_permalink($next_post);
                        } else {
                            $first_post = get_posts(array('posts_per_page' => 1, 'order' => 'ASC'));
                            echo get_permalink($first_post[0]->ID);
                        }
                    ?>" class="article__pagination-link next-post">
                        Next Post
                        <?php get_template_part('svg/icon-arrow-right'); ?>
                    </a>
                </div>

                <div class="article__subscribe">
                    <div class="article__subscribe-form">
                        <h4 class="article__subscribe-title">Subscribe to the free <em>Official Bulletin</em> newsletter:</h4>
                        <?php get_template_part('templates/newsletter/mailchimp-form'); ?>
                    </div>

                    <div class="article__subscribe-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/letterbox.jpg" alt="Letter Box">
                    </div>
                </div>
            </section>
        </article>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>