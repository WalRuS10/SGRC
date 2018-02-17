<h1>Orden De Reparacion: #<?=$reparacion['NRO_ORDEN']?></h1>

<h3>Detalles</h3>
<ul>
<li type="square">
	Codigo PC: <?=$reparacion['ID_COMPUTADORA'];?> 
</li>
<li type="square">
<? 
	foreach($lista_estados as $est): 
		if($reparacion['ESTADO_REPARACION'] == $est['ID_ESTADO']) 
			echo 'Estado: ' . $est['DESCRIPCION'];
	endforeach; 
?>
</li>
<li type="square">
	Falla: <?=$reparacion['FALLA'];?> 
</li>
<li type="square">
	Observaciones: <?=$reparacion['OBSERVACIONES'];?> 
</li>
<li type="square">
	Fecha de entrega: <?=$reparacion['FECHA_ENTREGA'];?> 
</li>

</ul>

<hr />

<h3>Técnicos Asignados</h3>

<ul>
<? foreach($lista_tecnicos_usados as $c): ?>
		<li type="square">
			<?=$c['APELLIDO']?>
		</li>
<? endforeach; ?>

</ul>


<hr />

<h3>Componentes Usados y Gastos</h3>

<table class="table table-light">

<tr>
	<th hidden>ID</th>
	<th>Descripción</th>
	<th hidden>Stock</th>
	<th>Cantidad</th>
	<th>Precio de Compra</th>
	<th>Sub Total</th>
</tr> 

<? foreach($lista_componentes_usados as $c): ?>
		<tr>
			<td hidden><?=$c['ID_COMPONENTE']?></td>
			<td><?=$c['DESCRIPCION']?></td>
			<td hidden><?=$c['STOCK']?></td>
			<td><?=$c['CANTIDAD']?></td>
			<td>$<?=number_format($c['PRECIO_COMPRA'],2);?>
			</td>
			<td>$<?=number_format($c['SUBTOTAL'],2);?></td>
		</tr>
<? endforeach; ?>

</table>

<h1>Gasto Total: $<?=number_format($gasto['TOTAL'],2);?></h1>
