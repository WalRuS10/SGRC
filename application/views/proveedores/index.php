<h1>Proveedores</h1>
<?=form_open('proveedores/buscar');?>
<div class="form-group">
	<?=form_label('CUIT: ', 'cuit');?>
	<?=form_input('cuit', '0');?>
	<?=form_submit('buscar','Buscar');?>
</div>
<?=form_close();?>
<div class="pull-right">
	<a href="<?php echo site_url('proveedores/nuevo'); ?>" class="btn btn-success">Nuevo</a> 
	<a href="<?php echo site_url('proveedores/imprimir'); ?>" class="btn btn-primary" target="_blank">Imprimir</a>
</div>
<table class="table table-light">

<tr>
	<th>C.U.I.T.</th>
	<th>Razon Social</th>
	<th>Domicilio</th>
	<th>Telefono</th>
	<th>Acciones</th>
</tr> 

<? foreach($lista_proveedores as $pro): ?>
	<tr>
		<td><?=$pro['CUIT']?></td>
		<td><?=$pro['RAZON_SOCIAL']?></td>
		<td><?=$pro['DOMICILIO']?></td>
		<td><?=$pro['TELEFONO']?></td>
		<td>
			<a class="btn btn-success" href="<?=site_url('proveedores/editar/'.$pro['CUIT'])?>" >Editar</a>
			
		</td>
	</tr>
<? endforeach; ?>

</table>