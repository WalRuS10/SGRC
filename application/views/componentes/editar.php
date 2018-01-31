<h3>Editar Componente</h3>
<?php echo form_open('componentes/editar/'.$componente['ID_COMPONENTE']); ?>

	<div class="form-group">
		<label for="DESCRIPCION" class="col-md-4 control-label">Descripción</label>
		<div class="col-md-8">
			<input type="text" name="DESCRIPCION" value="<?php echo ($this->input->post('DESCRIPCION') ? $this->input->post('DESCRIPCION') : $componente['DESCRIPCION']); ?>" class="form-control" id="DESCRIPCION" />
		</div>
	</div>

	<div class="form-group">
		<label for="STOCK" class="col-md-4 control-label">Stock</label>
		<div class="col-md-8">
			<input type="text" name="STOCK" value="<?php echo ($this->input->post('STOCK') ? $this->input->post('STOCK') : $componente['STOCK']); ?>" class="form-control" id="STOCK" />
		</div>
	</div>

	<div class="form-group">
		<label for="PRECIO_COMPRA" class="col-md-4 control-label">Precio de Compra</label>
		<div class="col-md-8">
			<input type="text" name="PRECIO_COMPRA" value="<?php echo ($this->input->post('PRECIO_COMPRA') ? $this->input->post('PRECIO_COMPRA') : $componente['PRECIO_COMPRA']); ?>" class="form-control" id="PRECIO_COMPRA" />
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">
				<i class="fa fa-check"></i> Guardar
			</button>
			<a class="btn btn-danger" href="<?=site_url('componentes')?>" >Cancelar</a>
		</div>
	</div>				
<?php echo form_close(); ?>


<table class="table table-light">

<tr>
	<th>Proveedor</th>
	<th>Precio de Compra</th>
	<th>Acciones</th>
</tr> 
<? foreach($proveedores_componente as $pc): ?>
	<tr>
		<td><?=$pc['RAZON_SOCIAL']?></td>
		<td><?=$pc['PRECIO']?></td>
		<td><a href='#'>eliminar</a></td>
	</tr>
<? endforeach ?>
</table>
