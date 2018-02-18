<h3>Editar Proveedor</h3>
<?php echo form_open('proveedores/editar/'.$proveedor['CUIT']); ?>
<div class="form-group">
	<label for="RAZON_SOCIAL" class="control-label">RAZON_SOCIAL</label>
	<div class="col-md-8">
		<input type="text" name="RAZON_SOCIAL" value="<?php echo ($this->input->post('RAZON_SOCIAL') ? $this->input->post('RAZON_SOCIAL') : $proveedor['RAZON_SOCIAL']); ?>" class="form-control" id="RAZON_SOCIAL" />
	</div>
</div>
<div class="form-group">
	<label for="DOMICILIO" class="control-label">DOMICILIO</label>
	<div class="col-md-8">
		<input type="text" name="DOMICILIO" value="<?php echo ($this->input->post('DOMICILIO') ? $this->input->post('DOMICILIO') : $proveedor['DOMICILIO']); ?>" class="form-control" id="DOMICILIO" />
	</div>
</div>
<div class="form-group">
	<label for="TELEFONO" class="control-label">TELEFONO</label>
	<div class="col-md-8">
		<input type="text" name="TELEFONO" value="<?php echo ($this->input->post('TELEFONO') ? $this->input->post('TELEFONO') : $proveedor['TELEFONO']); ?>" class="form-control" id="TELEFONO" />
	</div>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-success">
		<i class="fa fa-check"></i> Guardar
	</button>
	<a class="btn btn-danger" href="<?=site_url('proveedores')?>" >Cancelar</a>
</div>				
<?php echo form_close(); ?>