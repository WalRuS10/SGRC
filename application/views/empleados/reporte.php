<h1>Empleados</h1>

<table class="table table-light">

<tr>
	<th>Legajo</th>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Domicilio</th>
	<th>Telefono</th>
	<th>Cargo</th>
	<th hidden>Password</th>
</tr> 

<? foreach($lista_empleados as $emp): ?>
	<tr>
		<td><?=$emp['LEGAJO']?></td>
		<td><?=$emp['NOMBRE']?></td>
		<td><?=$emp['APELLIDO']?></td>
		<td><?=$emp['DOMICILIO']?></td>
		<td><?=$emp['TELEFONO']?></td>
		<td><?if ($emp['CARGO'] == "T") echo "Técnico";
			  if ($emp['CARGO'] == "E") echo "Encargado"?></td>
		<td hidden><?=$emp['PASSWORD']?></td>
	</tr>
<? endforeach; ?>

</table>