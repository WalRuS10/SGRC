<h1>Clientes</h1>

<table class="table table-light">

<tr>
	<th>C.U.I.T.</th>
	<th>Razon Social</th>
	<th>Domicilio</th>
	<th>Telefono</th>
	<th>Encargado</th>
	<th>Estado</th>
</tr> 

<? foreach($lista_clientes as $cli): ?>
	<tr>
		<td><?=$cli['CUIT']?></td>
		<td><?=$cli['RAZON_SOCIAL']?></td>
		<td><?=$cli['DOMICILIO']?></td>
		<td><?=$cli['TELEFONO']?></td>
		<td><?=$cli['APELLIDO']?></td>
		<td><?=$cli['ESTADO']?></td>
	</tr>
<? endforeach; ?>

</table>