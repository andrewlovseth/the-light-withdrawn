<?php get_header(); ?>

    <section class="page-header">
        <h1 class="page-title">Events</h1>
    </section>

    <?php get_template_part('templates/archive-events/podcasts'); ?>

    <?php get_template_part('templates/archive-events/past-event-list'); ?>

    <?php if (get_field('events', 'options')['show']) : ?>
        <?php get_template_part('templates/archive-events/event-list'); ?>
    <?php endif; ?>

<?php get_footer(); ?>