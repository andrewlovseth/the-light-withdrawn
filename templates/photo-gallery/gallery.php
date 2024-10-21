<section class="gallery | content-grid">

    <?php $items = get_field('list'); if( $items ): ?>
        <div class="gallery__page" id="page-1">
            <div class="gallery__items">

                <?php foreach( $items as $i ): ?>

                <?php
                    $args = ['item' => $i];
                    get_template_part('templates/photo-gallery/gallery-item', null, $args);
                ?>

                <?php endforeach; ?>

            </div>
        </div>
    <?php endif; ?>

    <?php $page_2_items = get_field('page_2'); if( $page_2_items ): ?>
        <div class="gallery__page" id="page-2">
            <div class="gallery__items">

                <?php foreach( $page_2_items as $i ): ?>

                <?php
                    $args = ['item' => $i];
                    get_template_part('templates/photo-gallery/gallery-item', null, $args);
                ?>

                <?php endforeach; ?>

            </div>
        </div>
    <?php endif; ?>

    <nav class="gallery__pagination">
        <ul class="gallery__pagination-items" role="nav">

            <li class="gallery__pagination-item">
                <a class="gallery__pagination-link" href="#page-1">1</a>
            </li>

            <li class="gallery__pagination-item">
                <a class="gallery__pagination-link" href="#page-2">2</a>
            </li>

        </ul>
    </nav>
    
</section>
