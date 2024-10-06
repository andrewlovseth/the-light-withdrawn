<?php

    $note = get_field('note');
    $headline = $note['headline'];
    $copy = $note['copy'];
    $instructions = $note['instructions'];
    $photo = $note['photo'];

    if(have_rows('note')): while(have_rows('note')): the_row(); ?>

    <section class="note | content-grid">

        <div class="note__headline | fancy-header">
            <h3 class="note__title | fancy-header__title"><?php echo $headline; ?></h3>
        </div>

        <div class="note__copy | copy copy-1">
            <?php echo $copy; ?>
        </div>

        <div class="note__instructions | copy copy-2">
            <p><?php echo $instructions; ?></p>
        </div>

        <div class="note__photo">

            <div class="note__photo-wrapper">
                <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
            </div>

            <?php if(have_rows('features')): while(have_rows('features')): the_row(); ?>
                <?php
                    $feature_id = get_sub_field('id');
                    $feature_copy = get_sub_field('copy');
                ?>
                
            
                <div class="note__feature" id="note__<?php echo $feature_id; ?>">
         
                    <a href="#<?php echo $feature_id; ?>" class="note__feature-anchor">
                        <div class="note__feature-ring"></div>
                    </a>

                    <div class="note__feature-modal">
                        <div class="note__feature-modal-line"></div>
                        <div class="note__feature-modal-wrapper">
                            <a href="#" class="note__feature-modal-close">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M32 16C32 24.8368 24.8368 32 16 32C7.1632 32 0 24.8368 0 16C0 7.1632 7.1632 0 16 0C24.8368 0 32 7.1632 32 16ZM11.152 11.152C11.377 10.9273 11.682 10.8011 12 10.8011C12.318 10.8011 12.623 10.9273 12.848 11.152L16 14.304L19.152 11.152C19.3795 10.94 19.6804 10.8246 19.9912 10.8301C20.3021 10.8356 20.5987 10.9615 20.8186 11.1814C21.0385 11.4013 21.1644 11.6979 21.1699 12.0088C21.1754 12.3196 21.06 12.6205 20.848 12.848L17.696 16L20.848 19.152C21.06 19.3795 21.1754 19.6804 21.1699 19.9912C21.1644 20.3021 21.0385 20.5987 20.8186 20.8186C20.5987 21.0385 20.3021 21.1644 19.9912 21.1699C19.6804 21.1754 19.3795 21.06 19.152 20.848L16 17.696L12.848 20.848C12.6205 21.06 12.3196 21.1754 12.0088 21.1699C11.6979 21.1644 11.4013 21.0385 11.1814 20.8186C10.9615 20.5987 10.8356 20.3021 10.8301 19.9912C10.8246 19.6804 10.94 19.3795 11.152 19.152L14.304 16L11.152 12.848C10.9273 12.623 10.8011 12.318 10.8011 12C10.8011 11.682 10.9273 11.377 11.152 11.152Z" fill="#8ACAD7"/>
                                </svg>
                            </a>

                            <div class="note__feature-modal-copy | copy copy-3" id="<?php echo $feature_id; ?>">
                                <?php echo $feature_copy; ?>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endwhile; endif; ?>
        </div>

    </section>

<?php endwhile; endif; ?>