<h3>Nuevo cliente</h3>

<?php echo form_open('clientes/nuevo',array("class"=>"form-horizontal")); ?>
	<div class="form-group">
		<label for="CUIT" class="col-md-4 control-label">CUIT</label>
		<div class="col-md-8">
			<input type="text" name="CUIT" value="<?=$this->input->post('CUIT'); ?>" class="form-control" id="CUIT" />
		</div>
	</div>
	<div class="form-group">
		<label for="RAZON_SOCIAL" class="col-md-4 control-label">Razon Social</label>
		<div class="col-md-8">
			<input type="text" name="RAZON_SOCIAL" value="<?=$this->input->post('RAZON_SOCIAL'); ?>" class="form-control" id="RAZON_SOCIAL" />
		</div>
	</div>
	<div class="form-group">
		<label for="DOMICILIO" class="col-md-4 control-label">Domicilio</label>
		<div class="col-md-8">
			<input type="text" name="DOMICILIO" value="<?=$this->input->post('DOMICILIO'); ?>" class="form-control" id="DOMICILIO" />
		</div>
	</div>
	<div class="form-group">
		<label for="TELEFONO" class="col-md-4 control-label">Telefono</label>
		<div class="col-md-8">
			<input type="text" name="TELEFONO" value="<?=$this->input->post('TELEFONO'); ?>" class="form-control" id="TELEFONO" />
		</div>
	</div>
	<div class="form-group">
		<label for="LEGAJO_ENCARGADO" class="col-md-4 control-label">Empleado</label>
		<div class="col-md-8">
			<select name="LEGAJO_ENCARGADO" size=1>
			<? foreach($lista_empleados as $emp): ?>
			<? if ($emp['CARGO'] == "E"){?>
			<option value=<?=$emp['LEGAJO'];?>><?=$emp['APELLIDO'];?></option>
			<? }?>
			<? endforeach; ?>
			</select>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Guardar</button>
			<a class="btn btn-danger" href="<?=site_url('clientes')?>" >Cancelar</a>
		</div>
	</div>

<?php echo form_close(); ?>