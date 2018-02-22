
<h3>Editar Empleado</h3>

<?php echo form_open('empleados/editar/'.$empleado['LEGAJO']); ?>
<div class="form-group">
	<label for="NOMBRE" class="col-md-4 control-label">NOMBRE</label>
	<div class="col-md-8">
		<input type="text" name="NOMBRE" value="<?=$empleado['NOMBRE']; ?>" class="form-control" id="NOMBRE" />
		<?=form_error('NOMBRE');?>
	</div>
</div>
<div class="form-group">
	<label for="APELLIDO" class="col-md-4 control-label">APELLIDO</label>
	<div class="col-md-8">
		<input type="text" name="APELLIDO" value="<?=$empleado['APELLIDO']; ?>" class="form-control" id="APELLIDO" />
		<?=form_error('APELLIDO');?>
	</div>
</div>
<div class="form-group">
	<label for="DOMICILIO" class="col-md-4 control-label">DOMICILIO</label>
	<div class="col-md-8">
		<input type="text" name="DOMICILIO" value="<?=$empleado['DOMICILIO']; ?>" class="form-control" id="DOMICILIO" />
		<?=form_error('DOMICILIO');?>
	</div>
</div>
<div class="form-group">
	<label for="TELEFONO" class="col-md-4 control-label">TELEFONO</label>
	<div class="col-md-8">
		<input type="text" name="TELEFONO" value="<?=$empleado['TELEFONO']; ?>" class="form-control" id="TELEFONO" />
		<?=form_error('TELEFONO');?>
	</div>
</div>
<div class="form-group">
	<label for="PASSWORD" class="col-md-4 control-label">PASSWORD</label>
	<div class="col-md-8">
		<input type="password" name="PASSWORD" value=<?=$empleado['PASSWORD'];?> class="form-control" id="PASSWORD" />
		<?=form_error('PASSWORD');?>
	</div>
</div>
<div class="form-group">
	<label for="CARGO" class="col-md-4 control-label">CARGO</label>
	<div class="col-md-8">
		<select name="CARGO" class="form-control" id="CARGO">
			<option value="E" <?php if($empleado['CARGO'] == 'E') echo "selected";?> >Encargado</option>
			<option value="T" <?php if($empleado['CARGO'] == 'T') echo "selected";?> >Técnico</option>
		</select>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">
			Guardar
		</button>
		<a class="btn btn-danger" href="<?=site_url('empleados')?>" >Cancelar</a>
	</div>
</div>				
<?php echo form_close(); ?>