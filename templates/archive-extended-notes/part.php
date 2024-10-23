<?php if( get_row_layout() == 'Part' ): ?>

	<?php
		$header = get_sub_field('header');
        $header_file = get_field('file', $header->ID);
        $header_display_title = get_field('display_title', $header->ID);

		$chapters = get_sub_field('chapters');
	?>

	<div class="part">
		<div class="document-item">
			<input type="checkbox" name="selected_docs[]" value="<?php echo $header->ID; ?>" id="doc-<?php echo $header->ID; ?>">
			<label for="doc-<?php echo $header->ID; ?>">
				<div class="header-note">
					<div class="header-note__title">
						<a href="<?php echo $header_file['url']; ?>" target="window"><?php echo $header_display_title; ?></a>
					</div>
				</div>
			</label>
		</div>

		<div class="chapters">
			<?php if( $chapters ): ?>
				<?php foreach( $chapters as $c ): ?>
					<div class="document-item">
						<input type="checkbox" name="selected_docs[]" value="<?php echo $c->ID; ?>" id="doc-<?php echo $c->ID; ?>">
						<label for="doc-<?php echo $c->ID; ?>">
							<?php
								$args = ['id' => $c->ID];
								get_template_part('templates/archive-extended-notes/note', null, $args);
							?>
						</label>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>

<?php endif; ?>
