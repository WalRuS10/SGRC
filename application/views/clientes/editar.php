<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Cliente</h3>
            </div>
			<?php echo form_open('clientes/editar/'.$cliente['CUIT']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="RAZON_SOCIAL" class="control-label">RAZON_SOCIAL</label>
						<div class="form-group">
							<input type="text" name="RAZON_SOCIAL" value="<?php echo ($this->input->post('RAZON_SOCIAL') ? $this->input->post('RAZON_SOCIAL') : $cliente['RAZON_SOCIAL']); ?>" class="form-control" id="RAZON_SOCIAL" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="DOMICILIO" class="control-label">DOMICILIO</label>
						<div class="form-group">
							<input type="text" name="DOMICILIO" value="<?php echo ($this->input->post('DOMICILIO') ? $this->input->post('DOMICILIO') : $cliente['DOMICILIO']); ?>" class="form-control" id="DOMICILIO" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="TELEFONO" class="control-label">TELEFONO</label>
						<div class="form-group">
							<input type="text" name="TELEFONO" value="<?php echo ($this->input->post('TELEFONO') ? $this->input->post('TELEFONO') : $cliente['TELEFONO']); ?>" class="form-control" id="TELEFONO" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="LEGAJO_ENCARGADO" class="control-label">LEGAJO_ENCARGADO</label>
						<div class="form-group">
							<input type="text" name="LEGAJO_ENCARGADO" value="<?php echo ($this->input->post('LEGAJO_ENCARGADO') ? $this->input->post('LEGAJO_ENCARGADO') : $cliente['LEGAJO_ENCARGADO']); ?>" class="form-control" id="LEGAJO_ENCARGADO" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="ESTADO" class="control-label">ESTADO</label>
						<div class="form-group">
							<input type="text" name="ESTADO" value="<?php echo ($this->input->post('ESTADO') ? $this->input->post('ESTADO') : $cliente['ESTADO']); ?>" class="form-control" id="PASSWORD" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a class="btn btn-danger" href="<?=site_url('clientes')?>" >Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>