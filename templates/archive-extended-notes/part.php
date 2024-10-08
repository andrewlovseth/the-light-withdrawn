<?php if( get_row_layout() == 'Part' ): ?>

	<?php
		$header = get_sub_field('header');
        $header_file = get_field('file', $header->ID);
        $header_display_title = get_field('display_title', $header->ID);

		$chapters = get_sub_field('chapters');
	?>

	<div class="part">
		<div class="header-note">
			<div class="header-note__title">
				<a href="<?php echo $header_file['url']; ?>" target="window"><?php echo $header_display_title; ?></a>
			</div>
		</div>

		<div class="chapters">
			<?php if( $chapters ): ?>
				<?php foreach( $chapters as $c ): ?>

					<?php
						$args = ['id' => $c->ID];
						get_template_part('templates/archive-extended-notes/note', null, $args);
					?>
					
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>






<?php endif; ?>