<h1>Reparaciones</h1>
<?=form_open('reparaciones/buscar');?>
<div class="form-group">
	<?=form_label('Nro. de Orden: ', 'nro_orden');?>
	<?=form_input('nro_orden', '0');?>
	<?=form_submit('buscar','Buscar');?>
</div>
<?=form_close();?>


<div class="pull-right">
	<a href="<?php echo site_url('reparaciones/nuevo'); ?>" class="btn btn-success">Nuevo</a> 
	<a href="<?php echo site_url('reparaciones/imprimir'); ?>" class="btn btn-primary" target="_blank">Imprimir</a> 
</div>

<table class="table table-light">
<tr>
	<th>Orden</th>
	<th>F. Entrega</th>
	<th>Id de PC</th>
	<th>Tecnico</th>
	<th>Falla</th>
	<th>Observaciones</th>
	<th>Estado</th>
	<th>Acciones</th>
</tr> 

<? foreach($lista_reparaciones as $rep): ?>
	<tr>
		<td><?=$rep['NRO_ORDEN']?></td>
		<td><?=$rep['FECHA_ENTREGA']?></td>
		<td><?=$rep['ID_COMPUTADORA']?></td>
		<td><?=$rep['APELLIDO']?></td>
		<td><?=$rep['FALLA']?></td>
		<td><?=$rep['OBSERVACIONES']?></td>
		<td><?=$rep['ESTADO']?></td>
		<td>
			<a class="btn btn-success" href="<?=site_url('reparaciones/editar/'.$rep['NRO_ORDEN'])?>" >Editar</a>
			<a class="btn btn-danger" href="<?=site_url('reparaciones/eliminar/'.$rep['NRO_ORDEN'])?>" >Eliminar</a>
		</td>
	</tr>
<? endforeach; ?>
</table>
