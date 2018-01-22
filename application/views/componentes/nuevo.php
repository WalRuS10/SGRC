<h1>Nuevo componente</h1>

<?php echo form_open('componentes/nuevo',array("class"=>"form-horizontal")); ?>
	<div class="form-group">
		<label for="ID_COMPONENTE" class="col-md-4 control-label">ID de Componente</label>
		<div class="col-md-8">
			<input type="text" name="ID_COMPONENTE" value="<?=$this->input->post('ID_COMPONENTE'); ?>" class="form-control" id="ID_COMPONENTE" />
		</div>
	</div>
	<div class="form-group">
		<label for="DESCRIPCION" class="col-md-4 control-label">Descripción</label>
		<div class="col-md-8">
			<input type="text" name="DESCRIPCION" value="<?=$this->input->post('DESCRIPCION'); ?>" class="form-control" id="DESCRIPCION" />
		</div>
	</div>
	<div class="form-group">
		<label for="STOCK" class="col-md-4 control-label">Stock</label>
		<div class="col-md-8">
			<input type="text" name="STOCK" value="<?=$this->input->post('STOCK'); ?>" class="form-control" id="STOCK" />
		</div>
	</div>
	<div class="form-group">
		<label for="PRECIO_COMPRA" class="col-md-4 control-label">Precio de Compra</label>
		<div class="col-md-8">
			<input type="text" name="PRECIO_COMPRA" value="<?=$this->input->post('PRECIO_COMPRA'); ?>" class="form-control" id="PRECIO_COMPRA" />
		</div>
	</div>

	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Guardar</button>
			<a class="btn btn-danger" href="<?=site_url('componentes')?>" >Cancelar</a>
        </div>
	</div>

<?php echo form_close(); ?>