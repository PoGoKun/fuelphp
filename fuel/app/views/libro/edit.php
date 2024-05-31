<h2>Editing <span class='muted'>Libro</span></h2>
<br>

<?php echo render('libro/_form'); ?>
<p>
	<?php echo Html::anchor('libro/view/'.$libro->id, 'View'); ?> |
	<?php echo Html::anchor('libro', 'Back'); ?></p>
