<h2>Listing <span class='muted'>Libros</span></h2>
<br>
<?php if ($libros): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Titulo</th>
			<th>Resumen</th>
			<th>Creador</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($libros as $item): ?>		
		<tr>
			<td><?php echo $item->titulo; ?></td>
			<td><?php echo $item->resumen; ?></td>
			<td><?php echo $item->creador; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('libro/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						
						<?php echo Html::anchor('libro/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						
						<?php echo Html::anchor('libro/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>
			</td>
		</tr>
<?php endforeach; ?>	
	</tbody>
</table>

<?php else: ?>
<p>No Libros.</p>

<?php endif; ?>
<p>
	<?php echo Html::anchor('libro/create', 'Add new Libro', array('class' => 'btn btn-success')); ?>
</p>
