<h1>Componentes</h1>

<table class="table table-light">

<tr>
	<th>ID</th>
	<th>Descripción</th>
	<th>Stock</th>
	<th>Precio de Compra</th>
</tr> 

<? foreach($lista_componentes as $pro): ?>
	<tr>
		<td><?=$pro['ID_COMPONENTE']?></td>
		<td><?=$pro['DESCRIPCION']?></td>
		<td><?=$pro['STOCK']?></td>
		<td><?=$pro['PRECIO_COMPRA']?></td>
	</tr>
<? endforeach; ?>

</table>