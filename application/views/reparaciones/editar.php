
<div class="">
	<h3 class="">Editar Reparacion</h3>
</div>
<?php echo form_open('reparaciones/editar/'.$reparacion['NRO_ORDEN']); ?>

<div class="form-group">
	<label for="ESTADO_REPARACION" class="control-label">Estado</label>
	<select name="ESTADO_REPARACION" size=1>
		<? foreach($lista_estados as $est): ?>
		<option value=<?=$est['ID_ESTADO'];?> <?if(($this->input->post('ESTADO_REPARACION') ? $this->input->post('ESTADO_REPARACION') : $reparacion['ESTADO_REPARACION'])== $est['ID_ESTADO']) echo 'selected';?>><?=$est['DESCRIPCION'];?></option>
		<? endforeach; ?>
	</select>
</div>

<div class="form-group">
	<label for="FALLA" class="control-label">Falla</label>			
	<input type="text" name="FALLA" value="<?php echo ($this->input->post('FALLA') ? $this->input->post('FALLA') : $reparacion['FALLA']); ?>" class="form-control" id="FALLA" />
</div>

<div class="form-group">
	<label for="OBSERVACIONES" class="control-label">Observaciones</label>
	<input type="text" name="OBSERVACIONES" value="<?php echo ($this->input->post('OBSERVACIONES') ? $this->input->post('OBSERVACIONES') : $reparacion['OBSERVACIONES']); ?>" class="form-control" id="OBSERVACIONES" />
</div>

<div class="form-group">
	<label for="FECHA_ENTREGA" class="control-label">Fecha de Entrega</label>
	<input type="text" name="FECHA_ENTREGA" value="<?php echo ($this->input->post('FECHA_ENTREGA') ? $this->input->post('FECHA_ENTREGA') : $reparacion['FECHA_ENTREGA']); ?>" class="form-control" id="FECHA_ENTREGA" />
</div>
<div class="box-footer">
	<button type="submit" class="btn btn-success">
		Guardar
	</button>
	<a class="btn btn-danger" href="<?=site_url('reparaciones')?>" >Cancelar</a>
</div>				
<?php echo form_close(); ?>


<hr />

<h3>Agregar Componente:</h3>

<?php echo form_open('reparaciones/agregar_componente/'.$reparacion['NRO_ORDEN']); ?>

<div class="form-group">
	<label for="ID_COMPONENTE" class="control-label">Componente</label>
	<select name="ID_COMPONENTE" size=1>
		<? foreach($lista_componentes_no_usados as $lc): ?>
		<option value=<?=$lc['ID_COMPONENTE'];?>><?=$lc['DESCRIPCION'];?></option>
		<? endforeach; ?>
	</select>
</div>
	<div class="form-group">
		<label for="CANTIDAD" class="control-label">Cantidad</label>
		<input type="text" name="CANTIDAD" class="form-control" id="CANTIDAD" />
	</div>
	<button type="submit" class="btn btn-success">
		Agregar
	</button>

			
<?php echo form_close(); ?>


<hr />

<h3>Componentes Usados y Gastos</h3>


<table class="table table-light">

<tr>
	<th>ID</th>
	<th>Descripción</th>
	<th>Stock</th>
	<th>Precio de Compra</th>
	<th>Cantidad</th>
	<th>Sub Total</th>
	<th>Acciones</th>
</tr> 

<? foreach($lista_componentes_usados as $c): ?>
		<tr>
			<td><?=$c['ID_COMPONENTE']?></td>
			<td><?=$c['DESCRIPCION']?></td>
			<td><?=$c['STOCK']?></td>
			<td><?=$c['PRECIO_COMPRA']?></td>
			<td><?=$c['CANTIDAD']?></td>
			<td><?=$c['SUBTOTAL']?></td>
			<td>
				<a href="<?=site_url('reparaciones/remover_componente/'.$reparacion['NRO_ORDEN'].'/'.$c['ID_COMPONENTE']);?>">eliminar</a>
			</td>
		</tr>
<? endforeach; ?>

</table>

<div class="alert alert-success">Gasto Total: $<?=$gasto['TOTAL'];?></div>
