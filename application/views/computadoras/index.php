<h1>Computadoras</h1>
<?
$fields = array(
				'ID_COMPUTADORA' => "ID",
				'CUIT_CLIENTE' => "CUIT Cliente",
				 );?>
<?=form_open('computadoras/index');?>
<div class="form-group">
	<?=form_label('Buscar por: ', 'field');?>
	<?=form_dropdown('field', $fields);?>
	<?=form_input('searchword');?>
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