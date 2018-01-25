<h1>Nuevo Empleado</h1>

<?php echo form_open('empleados/nuevo',array("class"=>"form-horizontal")); ?>
	<div class="form-group">
		<label for="LEGAJO" class="col-md-4 control-label">LEGAJO</label>
		<div class="col-md-8">
			<input type="text" name="LEGAJO" value="<?=$this->input->post('LEGAJO'); ?>" class="form-control" id="LEGAJO" />
		</div>
	</div>
	<div class="form-group">
		<label for="NOMBRE" class="col-md-4 control-label">NOMBRE</label>
		<div class="col-md-8">
			<input type="text" name="NOMBRE" value="<?=$this->input->post('NOMBRE'); ?>" class="form-control" id="NOMBRE" />
		</div>
	</div>
	<div class="form-group">
		<label for="APELLIDO" class="col-md-4 control-label">APELLIDO</label>
		<div class="col-md-8">
			<input type="text" name="APELLIDO" value="<?=$this->input->post('APELLIDO'); ?>" class="form-control" id="APELLIDO" />
		</div>
	</div>
	<div class="form-group">
		<label for="DOMICILIO" class="col-md-4 control-label">DOMICILIO</label>
		<div class="col-md-8">
			<input type="text" name="DOMICILIO" value="<?=$this->input->post('DOMICILIO'); ?>" class="form-control" id="DOMICILIO" />
		</div>
	</div>
	<div class="form-group">
		<label for="TELEFONO" class="col-md-4 control-label">TELEFONO</label>
		<div class="col-md-8">
			<input type="text" name="TELEFONO" value="<?=$this->input->post('TELEFONO'); ?>" class="form-control" id="TELEFONO" />
		</div>
	</div>
	<div class="form-group">
		<label for="PASSWORD" class="col-md-4 control-label">PASSWORD</label>
		<div class="col-md-8">
			<input type="text" name="PASSWORD" value="<?=$this->input->post('PASSWORD'); ?>" class="form-control" id="PASSWORD" />
		</div>
	</div>
	<div class="form-group">
		<label for="CARGO" class="col-md-4 control-label">CARGO</label>
		<div class="col-md-8">
			<select name="CARGO" class="form-control" id="CARGO">
				<option value="E">Encargado</option>
				<option value="T">Técnico</option>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Guardar</button>
			<a class="btn btn-danger" href="<?=site_url('empleados')?>" >Cancelar</a>
        </div>
	</div>

<?php echo form_close(); ?>