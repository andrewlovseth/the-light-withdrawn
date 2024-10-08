<?php 
	$link = get_field('footer_cta', 'options');
	$show = get_field('footer_show_cta', 'options');
	if( $link ): 
	$link_url = $link['url'];
	$link_title = $link['title'];
	$link_target = $link['target'] ? $link['target'] : '_self';
 ?>

	<?php if($show == TRUE): ?>

		<div class="site-footer__cta">
			<a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
		</div>

	<?php endif; ?>

<?php endif; ?>