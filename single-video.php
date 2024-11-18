<?php get_header(); ?>


<?php

    $current_post_id = get_the_ID();
    $pagination = get_video_pagination_links($current_post_id);
    $prev_post_link = $pagination['prev_post_link'];
    $next_post_link = $pagination['next_post_link'];

?>

    <section class="video | content-grid">
        <div class="video__header">
            <div class="video__header-wrapper">
                <h1 class="video__title"><?php the_title(); ?></h1>

                <a href="<?php echo site_url('/photo-gallery/'); ?>" class="photo__info-utilities-link | back">
                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.265313 5.38056C0.0954333 5.55049 0 5.78094 0 6.02122C0 6.2615 0.0954333 6.49195 0.265313 6.66188L5.3915 11.7881C5.56241 11.9531 5.79131 12.0445 6.0289 12.0424C6.26649 12.0403 6.49377 11.945 6.66178 11.777C6.82979 11.609 6.92509 11.3817 6.92716 11.1441C6.92922 10.9066 6.83789 10.6777 6.67282 10.5067L3.09346 6.92739H15.0938C15.3342 6.92739 15.5647 6.83192 15.7346 6.66198C15.9045 6.49204 16 6.26155 16 6.02122C16 5.78089 15.9045 5.5504 15.7346 5.38046C15.5647 5.21052 15.3342 5.11505 15.0938 5.11505H3.09346L6.67282 1.53569C6.83789 1.36479 6.92922 1.13589 6.92716 0.898293C6.92509 0.660699 6.82979 0.433421 6.66178 0.26541C6.49377 0.0973993 6.26649 0.00209888 6.0289 3.42555e-05C5.79131 -0.00203037 5.56241 0.0893061 5.3915 0.254372L0.265313 5.38056Z" fill="#8ACAD7"/>
                    </svg>
                    <span class="photo__info-utilities-link-label">Back to Main Gallery</span>
                </a>    
            </div>   

            <div class="video__pagination">
                <div class="video__prev">
                    <a href="<?php echo esc_url($prev_post_link); ?>" class="video__pagination-link">
                        <svg width="6" height="12" viewBox="0 0 29 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27.8462 49L2 25L27.8462 1" stroke="#8ACAD7" stroke-width="5" stroke-linecap="round"/>
                        </svg>
                        
                        <span class="video__pagination-label">Previous</span>
                    </a>
                </div>


                <div class="video__next">
                    <a href="<?php echo esc_url($next_post_link); ?>" class="video__pagination-link">
                        <span class="video__pagination-label">Next </span>

                        <svg width="6" height="12" viewBox="0 0 29 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.00004 1L26.8462 25L1.00004 49" stroke="#8ACAD7" stroke-width="5" stroke-linecap="round"/>
                        </svg>   
                        
                    </a>
                </div>
            </div>
        </div>

        <div class="video__embed">
            <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="https://www.youtube.com/embed/<?php echo get_field('youtube_id'); ?>?controls=0&modestbranding=1&rel=0&showinfo=0&vq=hd1080" title="YouTube video player" frameborder="0" allow="accelerometer" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
        </div>
    </section>

<?php get_footer(); ?>