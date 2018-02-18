<h1>Reparaciones</h1>

<table class="table table-light">
<tr>
	<th>Orden</th>
	<th>F. Entrega</th>
	<th>Id de PC</th>
	<th>Tecnico</th>
	<th>Falla</th>
	<th>Observaciones</th>
	<th>Estado</th>
</tr> 

<? foreach($lista_reparaciones as $rep): ?>
	<tr>
		<td><?=$rep['NRO_ORDEN']?></td>
		<td><?=$rep['FECHA_ENTREGA']?></td>
		<td><?=$rep['ID_COMPUTADORA']?></td>
		<td><?=$rep['APELLIDO']?></td>
		<td><?=$rep['FALLA']?></td>
		<td><?=$rep['OBSERVACIONES']?></td>
		<td><?=$rep['ESTADO']?></td>
	</tr>
<? endforeach; ?>
</table>
