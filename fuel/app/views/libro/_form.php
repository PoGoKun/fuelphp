<?php echo Form::open(array("class" => "form-horizontal")); ?>

<fieldset>
    <div class="form-group">
        <?php echo Form::label('Titulo', 'titulo', array('class' => 'control-label')); ?>
        <?php echo Form::input('titulo', Input::post('titulo', isset($libro) ? $libro->titulo : ''), array('class' => 'col-md-4 form-control', 'placeholder' => 'Titulo')); ?>
    </div>
    <div class="form-group">
        <?php echo Form::label('Resumen', 'resumen', array('class' => 'control-label')); ?>
        <?php echo Form::textarea('resumen', Input::post('resumen', isset($libro) ? $libro->resumen : ''), array('class' => 'col-md-4 form-control', 'placeholder' => 'Resumen')); ?>
    </div>
    <div class="form-group">
        <?php echo Form::label('Creador', 'creador', array('class' => 'control-label')); ?>
        <?php echo Form::input('creador', Input::post('creador', isset($libro) ? $libro->creador : ''), array('class' => 'col-md-4 form-control', 'placeholder' => 'Creador')); ?>
    </div>
    <div class="form-group">
        <label class='control-label'>&nbsp;</label>
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
    </div>
</fieldset>
<?php echo Form::close(); ?> 
