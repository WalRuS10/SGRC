<h1>Componentes Usados y Gastos</h1>

<?php echo form_open('componentes/componentesgastototal'.$orden['NRO_ORDEN']); ?>

<table class="table table-light">

<tr>
	<th>ID</th>
	<th>Descripción</th>
	<th>Stock</th>
	<th>Precio de Compra</th>
</tr> 

<? foreach($lista_reparacionescomponentes as $rc): ?>
		<tr>
			<td><?=$rc['ID_COMPONENTE']?></td>
			<td><?=$rc['DESCRIPCION']?></td>
			<td><?=$rc['STOCK']?></td>
			<td><?=$rc['PRECIO_COMPRA']?></td>
		</tr>
<? endforeach; ?>

</table>

<div class="form-group">
         
				<a class="btn btn-danger" href="<?=site_url('reparaciones')?>" >VOLVER</a>
	        </div>	