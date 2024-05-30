<ul class="nav nav-pills">
    <li class='<?php echo Arr::get($subnav, "index"); ?>'><?php echo Html::anchor('producto/index', 'Index');?></li>
    <li class='<?php echo Arr::get($subnav, "create"); ?>'><?php echo Html::anchor('producto/create', 'Create');?></li>
</ul>

<h2>Listado de Productos</h2>

<?php if ($productos): ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo $producto->nombre; ?></td>
            <td><?php echo $producto->descripcion; ?></td>
            <td><?php echo $producto->precio; ?></td>
            <td>
                <?php echo Html::anchor('producto/view/'.$producto->id, 'View'); ?> |
                <?php echo Html::anchor('producto/edit/'.$producto->id, 'Edit'); ?> |
                <?php echo Html::anchor('producto/delete/'.$producto->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
<p>No hay productos.</p>
<?php endif; ?>

<?php echo Html::anchor('producto/create', 'Añadir nuevo Producto', array('class' => 'btn btn-success')); ?>
