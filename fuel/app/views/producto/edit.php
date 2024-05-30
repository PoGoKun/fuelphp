<h2>Editing <span class='muted'>Producto</span></h2>
<br>

<?php echo render('producto/_form'); ?>
<p>
    <?php echo Html::anchor('producto/view/'.$producto->id, 'View'); ?> |
    <?php echo Html::anchor('producto', 'Back'); ?>
</p>
