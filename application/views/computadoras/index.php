<h1>Computadoras</h1>
<?=form_open('computadoras/buscar');?>
<div class="form-group">
	<?=form_label('ID de Computadora: ', 'id_computadora');?>
	<?=form_input('id_computadora', '0');?>
	<?=form_submit('buscar','Buscar');?>
</div>
<?=form_close();?>
<div class="pull-right">
	<a href="<?php echo site_url('computadoras/nuevo'); ?>" class="btn btn-success">Nuevo</a>
	<a href="<?php echo site_url('computadoras/imprimir'); ?>" class="btn btn-primary" target="_blank">Imprimir</a>
</div>
<table class="table table-light">

<tr>
	<th>ID</th>
	<th>Fecha de Ingreso</th>
	<th>Cliente</th>
	<th>Acciones</th>
</tr> 

<? foreach($lista_computadoras as $com): ?>
	<tr>
		<td><?=$com['ID_COMPUTADORA']?></td>
		<td><?=$com['FECHA_INGRESO']?></td>
		<td><?=$com['RAZON_SOCIAL']?></td>
		<td>
			<a class="btn btn-success" href="<?=site_url('computadoras/editar/'.$com['ID_COMPUTADORA'])?>" >Editar</a>
			<a class="btn btn-danger" href="<?=site_url('computadoras/eliminar/'.$com['ID_COMPUTADORA'])?>" >Eliminar</a>
		</td>
	</tr>
<? endforeach; ?>

</table>