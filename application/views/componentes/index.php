<h1>Componentes</h1>
<?
$fields = array(
				'ID_COMPONENTE' => "ID",
				'DESCRIPCION' => "Descripción",
				'STOCK' => "Stock",
				'PRECIO_COMPRA' => "Precio",
				 );?>
<?=form_open('componentes/index');?>
<div class="form-group">
	<?=form_label('Buscar por: ', 'field');?>
	<?=form_dropdown('field', $fields);?>
	<?=form_input('searchword');?>
	<?=form_submit('buscar','Buscar');?>
<div class="pull-right">
	<a href="<?php echo site_url('componentes/nuevo'); ?>" class="btn btn-success">Nuevo</a>
	<a href="<?php echo site_url('componentes/imprimir'); ?>" class="btn btn-primary" target="_blank">Imprimir</a>
</div>
<table class="table table-light">

<tr>
	<th>ID</th>
	<th>Descripción</th>
	<th>Stock</th>
	<th>Precio de Compra</th>
	<th>Acciones</th>
</tr> 

<? foreach($lista_componentes as $pro): ?>
	<tr>
		<td><?=$pro['ID_COMPONENTE']?></td>
		<td><?=$pro['DESCRIPCION']?></td>
		<td><?=$pro['STOCK']?></td>
		<td>$<?=number_format($pro['PRECIO_COMPRA'],2)?></td>
		<td>
			<a class="btn btn-success" href="<?=site_url('componentes/editar/'.$pro['ID_COMPONENTE'])?>" >Editar</a>
			<a class="btn btn-danger" href="<?=site_url('componentes/eliminar/'.$pro['ID_COMPONENTE'])?>" >Eliminar</a>
		</td>
	</tr>
<? endforeach; ?>

</table>