<h1>Computadoras</h1>

<table class="table table-light">

<tr>
	<th>ID</th>
	<th>Fecha de Ingreso</th>
	<th>Cliente</th>
</tr> 

<? foreach($lista_computadoras as $com): ?>
	<tr>
		<td><?=$com['ID_COMPUTADORA']?></td>
		<td><?=$com['FECHA_INGRESO']?></td>
		<td><?=$com['RAZON_SOCIAL']?></td>
	</tr>
<? endforeach; ?>

</table>