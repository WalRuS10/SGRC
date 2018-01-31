
<h3>Editar Empleado</h3>

<?php echo form_open('empleados/editar/'.$empleado['LEGAJO']); ?>
	<div class="form-group">
		<label for="NOMBRE" class="col-md-4 control-label">NOMBRE</label>
		<div class="col-md-8">
			<input type="text" name="NOMBRE" value="<?php echo ($this->input->post('NOMBRE') ? $this->input->post('NOMBRE') : $empleado['NOMBRE']); ?>" class="form-control" id="NOMBRE" />
		</div>
	</div>
	<div class="form-group">
		<label for="APELLIDO" class="col-md-4 control-label">APELLIDO</label>
		<div class="col-md-8">
			<input type="text" name="APELLIDO" value="<?php echo ($this->input->post('APELLIDO') ? $this->input->post('APELLIDO') : $empleado['APELLIDO']); ?>" class="form-control" id="APELLIDO" />
		</div>
	</div>
	<div class="form-group">
		<label for="DOMICILIO" class="col-md-4 control-label">DOMICILIO</label>
		<div class="col-md-8">
			<input type="text" name="DOMICILIO" value="<?php echo ($this->input->post('DOMICILIO') ? $this->input->post('DOMICILIO') : $empleado['DOMICILIO']); ?>" class="form-control" id="DOMICILIO" />
		</div>
	</div>
	<div class="form-group">
		<label for="TELEFONO" class="col-md-4 control-label">TELEFONO</label>
		<div class="col-md-8">
			<input type="text" name="TELEFONO" value="<?php echo ($this->input->post('TELEFONO') ? $this->input->post('TELEFONO') : $empleado['TELEFONO']); ?>" class="form-control" id="TELEFONO" />
		</div>
	</div>
	<div class="form-group">
		<label for="PASSWORD" class="col-md-4 control-label">PASSWORD</label>
		<div class="col-md-8">
			<input type="password" name="PASSWORD" value="" class="form-control" id="PASSWORD" />
		</div>
	</div>
	<div class="form-group">
		<label for="CARGO" class="col-md-4 control-label">CARGO</label>
		<div class="col-md-8">
			<select name="CARGO" class="form-control" id="CARGO">
				<option value="E" <?php if(($this->input->post('CARGO') ? $this->input->post('CARGO') : $empleado['CARGO']) == 'E') echo "selected";?> >Encargado</option>
				<option value="T" <?php if(($this->input->post('CARGO') ? $this->input->post('CARGO') : $empleado['CARGO']) == 'T') echo "selected";?> >Técnico</option>
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