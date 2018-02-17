<h1>Proveedores</h1>

<table class="table table-light">

<tr>
	<th>C.U.I.T.</th>
	<th>Razon Social</th>
	<th>Domicilio</th>
	<th>Telefono</th>
</tr> 

<? foreach($lista_proveedores as $pro): ?>
	<tr>
		<td><?=$pro['CUIT']?></td>
		<td><?=$pro['RAZON_SOCIAL']?></td>
		<td><?=$pro['DOMICILIO']?></td>
		<td><?=$pro['TELEFONO']?></td>
	</tr>
<? endforeach; ?>

</table>