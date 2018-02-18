<h1>Clientes</h1>
<?=form_open('clientes/buscar');?>
<div class="form-group">
	<?=form_label('CUIT: ', 'cuit');?>
	<?=form_input('cuit', '0');?>
	<?=form_submit('buscar','Buscar');?>
</div>
<?=form_close();?>

<div class="pull-right">
	<a href="<?php echo site_url('clientes/nuevo'); ?>" class="btn btn-success">Nuevo</a> 
	<a href="<?php echo site_url('clientes/imprimir'); ?>" class="btn btn-primary" target="_blank">Imprimir</a> 
</div>
<table class="table table-light">

<tr>
	<th>C.U.I.T.</th>
	<th>Razon Social</th>
	<th>Domicilio</th>
	<th>Telefono</th>
	<th>Encargado</th>
	<th>Estado</th>
	<th>Acciones</th>
</tr> 

<? foreach($lista_clientes as $cli): ?>
	<tr>
		<td><?=$cli['CUIT']?></td>
		<td><?=$cli['RAZON_SOCIAL']?></td>
		<td><?=$cli['DOMICILIO']?></td>
		<td><?=$cli['TELEFONO']?></td>
		<td><?=$cli['APELLIDO']?></td>
		<td><?=$cli['ESTADO']?></td>
		<td>
			<a class="btn btn-success" href="<?=site_url('clientes/editar/'.$cli['CUIT'])?>" >Editar</a>

		</td>
	</tr>
<? endforeach; ?>

</table>