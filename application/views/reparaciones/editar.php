
<div class="box-header with-border">
	<h3 class="box-title">Editar Reparacion</h3>
</div>
<?php echo form_open('reparaciones/editar/'.$reparacion['NRO_ORDEN']); ?>
<div class="box-body">
	<div class="row clearfix">
		<div class="col-md-6">
			<label for="ESTADO_REPARACION" class="control-label">Estado</label>
			<div class="form-group">
			
				<select name="ESTADO_REPARACION" size=1>
				<? foreach($lista_estados as $est): ?>
				<option value=<?=$est['ID_ESTADO'];?> <?if(($this->input->post('ESTADO_REPARACION') ? $this->input->post('ESTADO_REPARACION') : $reparacion['ESTADO_REPARACION'])== $est['ID_ESTADO']) echo 'selected';?>><?=$est['DESCRIPCION'];?></option>
				<? endforeach; ?>
				</select>
		
			</div>
		</div>
		<div class="col-md-6">
			<label for="FALLA" class="control-label">Falla</label>
			<div class="form-group">
				<input type="text" name="FALLA" value="<?php echo ($this->input->post('FALLA') ? $this->input->post('FALLA') : $reparacion['FALLA']); ?>" class="form-control" id="FALLA" />
			</div>
		</div>
		<div class="col-md-6">
			<label for="OBSERVACIONES" class="control-label">Observaciones</label>
			<div class="form-group">
				<input type="text" name="OBSERVACIONES" value="<?php echo ($this->input->post('OBSERVACIONES') ? $this->input->post('OBSERVACIONES') : $reparacion['OBSERVACIONES']); ?>" class="form-control" id="OBSERVACIONES" />
			</div>
		</div>
		<div class="col-md-6">
			<label for="FECHA_ENTREGA" class="control-label">Fecha de Entrega</label>
			<div class="form-group">
				<input type="text" name="FECHA_ENTREGA" value="<?php echo ($this->input->post('FECHA_ENTREGA') ? $this->input->post('FECHA_ENTREGA') : $reparacion['FECHA_ENTREGA']); ?>" class="form-control" id="FECHA_ENTREGA" />
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


<h3 class="box-title">Componentes Usados y Gastos</h3>


<table class="table table-light">

<tr>
	<th>ID</th>
	<th>Descripción</th>
	<th>Stock</th>
	<th>Precio de Compra</th>
	<th>Acciones</th>
</tr> 

<? foreach($lista_componentes_usados as $c): ?>
		<tr>
			<td><?=$c['ID_COMPONENTE']?></td>
			<td><?=$c['DESCRIPCION']?></td>
			<td><?=$c['STOCK']?></td>
			<td><?=$c['PRECIO_COMPRA']?></td>
			<td><a href='#'>eliminar</a></td>
		</tr>
<? endforeach; ?>

</table>
