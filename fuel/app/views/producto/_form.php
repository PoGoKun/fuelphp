<?php echo Form::open(array("class"=>"form-horizontal")); ?>

    <fieldset>
        <div class="form-group">
            <?php echo Form::label('Nombre', 'nombre', array('class'=>'control-label')); ?>
            <?php echo Form::input('nombre', Input::post('nombre', isset($producto) ? $producto->nombre : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nombre')); ?>
        </div>

        <div class="form-group">
            <?php echo Form::label('Descripcion', 'descripcion', array('class'=>'control-label')); ?>
            <?php echo Form::textarea('descripcion', Input::post('descripcion', isset($producto) ? $producto->descripcion : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Descripcion')); ?>
        </div>

        <div class="form-group">
            <?php echo Form::label('Precio', 'precio', array('class'=>'control-label')); ?>
            <?php echo Form::input('precio', Input::post('precio', isset($producto) ? $producto->precio : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Precio')); ?>
        </div>

        <div class="form-group">
            <?php echo Form::submit('submit', 'Guardar', array('class' => 'btn btn-primary')); ?>
        </div>
    </fieldset>

<?php echo Form::close(); ?>
