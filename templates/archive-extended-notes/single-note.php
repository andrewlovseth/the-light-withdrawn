<?php if( get_row_layout() == 'single_note' ): ?>

    <?php
        $note = get_sub_field('Note');
        $args = ['id' => $note->ID];
        get_template_part('templates/archive-extended-notes/note', null, $args);
    ?>

<?php endif; ?>