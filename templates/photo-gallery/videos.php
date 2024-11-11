<?php

    $videos = get_field('videos');
    $header = $videos['header'];
    $copy = $videos['copy'];
    $list = $videos['list'];
    $show = $videos['show'];

    if($show):

?>

    <section class="videos grid | content-grid">
        <div class="videos__header | fancy-header">
            <h2 class="fancy-header__title"><?php echo $header; ?></h2>
        </div>

        <div class="videos__copy | copy copy-1">
            <?php echo $copy; ?>
        </div>

        <?php if( $list ): ?>
            <div class="videos__grid">
                <?php foreach( $list as $video ): ?>
                    <?php 
                        $poster = get_field('poster', $video->ID); 
                    ?>

                    <div class="videos__item">
                        <a class="videos__link" href="<?php echo get_permalink( $video->ID ); ?>">
                            <div class="play-btn">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/play-btn.png" alt="Play video">
                            </div>
                            <?php echo wp_get_attachment_image($poster['ID'], 'full'); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

<?php endif; ?>