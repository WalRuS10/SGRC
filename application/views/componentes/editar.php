<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Componente</h3>
            </div>
			<?php echo form_open('componentees/editar/'.$componente['ID_COMPONENTE']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="DESCRIPCION" class="control-label">Descripción</label>
						<div class="form-group">
							<input type="text" name="DESCRIPCION" value="<?php echo ($this->input->post('DESCRIPCION') ? $this->input->post('DESCRIPCION') : $componente['DESCRIPCION']); ?>" class="form-control" id="DESCRIPCION" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="STOCK" class="control-label">Stock</label>
						<div class="form-group">
							<input type="text" name="STOCK" value="<?php echo ($this->input->post('STOCK') ? $this->input->post('STOCK') : $componente['STOCK']); ?>" class="form-control" id="STOCK" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="PRECIO_COMPRA" class="control-label">Precio de Compra</label>
						<div class="form-group">
							<input type="text" name="PRECIO_COMPRA" value="<?php echo ($this->input->post('PRECIO_COMPRA') ? $this->input->post('PRECIO_COMPRA') : $componente['PRECIO_COMPRA']); ?>" class="form-control" id="PRECIO_COMPRA" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a class="btn btn-danger" href="<?=site_url('componentes')?>" >Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>