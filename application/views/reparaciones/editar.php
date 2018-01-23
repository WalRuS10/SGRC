<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Reparacion</h3>
            </div>
			<?php echo form_open('reparaciones/editar/'.$orden['NRO_ORDEN']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="ESTADO_REPARACION" class="control-label">ESTADO_REPARACION</label>
						<div class="form-group">
							<input type="text" name="ESTADO_REPARACION" value="<?php echo ($this->input->post('ESTADO_REPARACION') ? $this->input->post('ESTADO_REPARACION') : $orden['ESTADO_REPARACION']); ?>" class="form-control" id="ESTADO_REPARACION" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="FALLA" class="control-label">FALLA</label>
						<div class="form-group">
							<input type="text" name="FALLA" value="<?php echo ($this->input->post('FALLA') ? $this->input->post('FALLA') : $orden['FALLA']); ?>" class="form-control" id="FALLA" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="OBSERVACIONES" class="control-label">OBSERVACIONES</label>
						<div class="form-group">
							<input type="text" name="OBSERVACIONES" value="<?php echo ($this->input->post('OBSERVACIONES') ? $this->input->post('OBSERVACIONES') : $orden['OBSERVACIONES']); ?>" class="form-control" id="OBSERVACIONES" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="FECHA_ENTREGA" class="control-label">FECHA_ENTREGA</label>
						<div class="form-group">
							<input type="text" name="FECHA_ENTREGA" value="<?php echo ($this->input->post('FECHA_ENTREGA') ? $this->input->post('FECHA_ENTREGA') : $orden['FECHA_ENTREGA']); ?>" class="form-control" id="FECHA_ENTREGA" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a class="btn btn-danger" href="<?=site_url('reparaciones')?>" >Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>