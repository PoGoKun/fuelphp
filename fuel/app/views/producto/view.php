<h2>Viewing <span class='muted'>#<?php echo $producto->id; ?></span></h2>


<?php echo Html::anchor('producto/edit/'.$producto->id, 'Edit'); ?> |
<?php echo Html::anchor('producto', 'Back'); ?>