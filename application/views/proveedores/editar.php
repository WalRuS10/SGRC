<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Proveedor</h3>
            </div>
			<?php echo form_open('proveedores/editar/'.$proveedor['CUIT']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="RAZON_SOCIAL" class="control-label">RAZON_SOCIAL</label>
						<div class="form-group">
							<input type="text" name="RAZON_SOCIAL" value="<?php echo ($this->input->post('RAZON_SOCIAL') ? $this->input->post('RAZON_SOCIAL') : $proveedor['RAZON_SOCIAL']); ?>" class="form-control" id="RAZON_SOCIAL" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="DOMICILIO" class="control-label">DOMICILIO</label>
						<div class="form-group">
							<input type="text" name="DOMICILIO" value="<?php echo ($this->input->post('DOMICILIO') ? $this->input->post('DOMICILIO') : $proveedor['DOMICILIO']); ?>" class="form-control" id="DOMICILIO" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="TELEFONO" class="control-label">TELEFONO</label>
						<div class="form-group">
							<input type="text" name="TELEFONO" value="<?php echo ($this->input->post('TELEFONO') ? $this->input->post('TELEFONO') : $proveedor['TELEFONO']); ?>" class="form-control" id="TELEFONO" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a class="btn btn-danger" href="<?=site_url('proveedores')?>" >Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>