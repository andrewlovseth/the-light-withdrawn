<?php if(have_rows('footer_social_links', 'options')): ?>
	
	<ul class="site-footer__social-links" role="nav">
		<?php while(have_rows('footer_social_links', 'options')): the_row(); ?>

			<?php
				$icon = get_sub_field('icon');
				$link = get_sub_field('link');
			?>

			<a href="<?php echo $link; ?>" target="window">
				<?php echo print_svg($icon['url']); ?>
			</a>
		
		
		<?php endwhile; ?>
	</ul>
<?php endif; ?>