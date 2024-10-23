<?php
    $appendices = get_field('appendices', 'options');
    $book_cover = $appendices['book_cover'];


    $extended_notes = get_field('extended_notes', 'options');
    $combined_pdf_post = $extended_notes['combined_pdf'];
    $combined_pdf = get_field('file', $combined_pdf_post->ID);

?>

<section class="documents extended-notes | content-grid">
    <div class="documents__sidebar">
        <div class="book-cover">
            <?php echo wp_get_attachment_image($book_cover['ID'], 'full'); ?>
        </div>


        <div class="documents__selected">
            <p>Actions for selected content:</p>

            <div class="documents__selected-actions">
                <div class="documents__selected-action">
                    <a href="#" class="select-all-docs">Select All</a>
                </div>
                <div class="documents__selected-action">
                    <a href="#" class="deselect-all-docs">Deselect All</a>
                </div>
            </div>

            <button type="submit" form="batch-download-form" class="batch-download-btn documents__btn">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.57 7.28886C12.4093 7.12834 12.1914 7.03818 11.9643 7.03818C11.7371 7.03818 11.5193 7.12834 11.3586 7.28886L9.10714 9.54029V1.10714C9.10714 0.879814 9.01684 0.661797 8.85609 0.501051C8.69535 0.340306 8.47733 0.25 8.25 0.25C8.02267 0.25 7.80465 0.340306 7.64391 0.501051C7.48316 0.661797 7.39286 0.879814 7.39286 1.10714V9.54029L5.14143 7.28886C4.97894 7.13745 4.76403 7.05503 4.54197 7.05894C4.31992 7.06286 4.10805 7.15282 3.951 7.30986C3.79396 7.4669 3.704 7.67877 3.70009 7.90083C3.69617 8.12289 3.77859 8.3378 3.93 8.50029L7.64429 12.2146L8.25 12.8214L8.85571 12.2157L12.57 8.50143C12.6497 8.42183 12.7128 8.32731 12.7559 8.22328C12.7991 8.11926 12.8212 8.00775 12.8212 7.89514C12.8212 7.78254 12.7991 7.67103 12.7559 7.567C12.7128 7.46297 12.6497 7.36846 12.57 7.28886ZM1.96429 10.25C1.96429 10.0227 1.87398 9.80465 1.71323 9.64391C1.55249 9.48316 1.33447 9.39286 1.10714 9.39286C0.879814 9.39286 0.661797 9.48316 0.501051 9.64391C0.340306 9.80465 0.25 10.0227 0.25 10.25V13.9643C0.25 14.5705 0.490816 15.1519 0.91947 15.5805C1.34812 16.0092 1.92951 16.25 2.53571 16.25H13.9643C14.5705 16.25 15.1519 16.0092 15.5805 15.5805C16.0092 15.1519 16.25 14.5705 16.25 13.9643V10.25C16.25 10.0227 16.1597 9.80465 15.9989 9.64391C15.8382 9.48316 15.6202 9.39286 15.3929 9.39286C15.1655 9.39286 14.9475 9.48316 14.7868 9.64391C14.626 9.80465 14.5357 10.0227 14.5357 10.25V13.9643C14.5357 14.1158 14.4755 14.2612 14.3683 14.3683C14.2612 14.4755 14.1158 14.5357 13.9643 14.5357H2.53571C2.38416 14.5357 2.23882 14.4755 2.13165 14.3683C2.02449 14.2612 1.96429 14.1158 1.96429 13.9643V10.25Z" fill="#000000"/>
                    </svg>

                Download Selected (ZIP)
            </button>
        </div>

        <div class="documents__download-all">
            <a href="<?php echo $combined_pdf['url']; ?>" target="window" class="documents__btn">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.57 7.28886C12.4093 7.12834 12.1914 7.03818 11.9643 7.03818C11.7371 7.03818 11.5193 7.12834 11.3586 7.28886L9.10714 9.54029V1.10714C9.10714 0.879814 9.01684 0.661797 8.85609 0.501051C8.69535 0.340306 8.47733 0.25 8.25 0.25C8.02267 0.25 7.80465 0.340306 7.64391 0.501051C7.48316 0.661797 7.39286 0.879814 7.39286 1.10714V9.54029L5.14143 7.28886C4.97894 7.13745 4.76403 7.05503 4.54197 7.05894C4.31992 7.06286 4.10805 7.15282 3.951 7.30986C3.79396 7.4669 3.704 7.67877 3.70009 7.90083C3.69617 8.12289 3.77859 8.3378 3.93 8.50029L7.64429 12.2146L8.25 12.8214L8.85571 12.2157L12.57 8.50143C12.6497 8.42183 12.7128 8.32731 12.7559 8.22328C12.7991 8.11926 12.8212 8.00775 12.8212 7.89514C12.8212 7.78254 12.7991 7.67103 12.7559 7.567C12.7128 7.46297 12.6497 7.36846 12.57 7.28886ZM1.96429 10.25C1.96429 10.0227 1.87398 9.80465 1.71323 9.64391C1.55249 9.48316 1.33447 9.39286 1.10714 9.39286C0.879814 9.39286 0.661797 9.48316 0.501051 9.64391C0.340306 9.80465 0.25 10.0227 0.25 10.25V13.9643C0.25 14.5705 0.490816 15.1519 0.91947 15.5805C1.34812 16.0092 1.92951 16.25 2.53571 16.25H13.9643C14.5705 16.25 15.1519 16.0092 15.5805 15.5805C16.0092 15.1519 16.25 14.5705 16.25 13.9643V10.25C16.25 10.0227 16.1597 9.80465 15.9989 9.64391C15.8382 9.48316 15.6202 9.39286 15.3929 9.39286C15.1655 9.39286 14.9475 9.48316 14.7868 9.64391C14.626 9.80465 14.5357 10.0227 14.5357 10.25V13.9643C14.5357 14.1158 14.4755 14.2612 14.3683 14.3683C14.2612 14.4755 14.1158 14.5357 13.9643 14.5357H2.53571C2.38416 14.5357 2.23882 14.4755 2.13165 14.3683C2.02449 14.2612 1.96429 14.1158 1.96429 13.9643V10.25Z" fill="#000000"/>
                </svg>

                Download All (PDF)
            </a>
        </div>
    </div>

    <div class="documents__list extended-notes__list">
        <div class="documents__rule"></div>

        <form id="batch-download-form" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>">
            <input type="hidden" name="action" value="batch_download_extended_notes">

            <?php if(have_rows('extended_notes_table_of_contents', 'options')): while(have_rows('extended_notes_table_of_contents', 'options')) : the_row(); ?>

                <?php if(get_row_layout() == 'Part'): ?>

                    <?php get_template_part('templates/archive-extended-notes/part'); ?>

                <?php elseif(get_row_layout() == 'single_note'): ?>

                    <?php
                        $note = get_sub_field('Note');
                        $note_id = $note->ID;
                        $args = ['id' => $note_id];
                    ?>

                    <div class="document-item">
                        <input type="checkbox" name="selected_docs[]" value="<?php echo $note_id; ?>" id="doc-<?php echo $note_id; ?>">
                        <label for="doc-<?php echo $note_id; ?>">
                            <?php get_template_part('templates/archive-extended-notes/single-note', null, $args); ?>
                        </label>
                    </div>

                <?php endif; ?>

            <?php endwhile; endif; ?>
        </form>
    </div>
</section>
