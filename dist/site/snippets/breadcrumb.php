<ul class="nav  breadcrumbs  hide@md  hide@sm">
	<?php foreach($site->breadcrumb() as $crumb): ?>
		<li>
			<a href="<?= $crumb->url() ?>" title="<?php echo html($crumb->title()) ?>" <?php if ( $crumb->is($page )) echo 'class="current"' ?>>
				<?= html($crumb->title()) ?>
			</a>
		</li>
    <?php endforeach ?>
</ul>
