<h1>Proveedores</h1>
<?
$fields = array(
				'CUIT' => "CUIT",
				'RAZON_SOCIAL' => "Razón Social",
				'DOMICILIO' => "Domicilio",
				'TELEFONO' => "Teléfono"
				 );?>
<?=form_open('proveedores/index');?>
<div class="form-group">
	<?=form_label('Buscar por: ', 'field');?>
	<?=form_dropdown('field', $fields);?>
	<?=form_input('searchword');?>
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
			<a class="btn btn-danger" href="<?=site_url('proveedores/eliminar/'.$pro['CUIT'])?>" >Eliminar</a>
		</td>
	</tr>
<? endforeach; ?>

</table>