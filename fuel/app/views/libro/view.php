<h2>Viewing <span class='muted'>#<?php echo $libro->id; ?></span></h2>


<?php echo Html::anchor('libro/edit/'.$libro->id, 'Edit'); ?> |
<?php echo Html::anchor('libro', 'Back'); ?>