<h1>Empleados</h1>
<?=form_open('empleados/buscar');?>
<div class="form-group">
	<?=form_label('Legajo: ', 'legajo');?>
	<?=form_input('legajo', '0');?>
	<?=form_submit('buscar','Buscar');?>
</div>
<?=form_close();?>
<div class="pull-right">
	<a href="<?php echo site_url('empleados/nuevo'); ?>" class="btn btn-success">Nuevo</a> 
</div>
<table class="table table-light">

<tr>
	<th>Legajo</th>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Domicilio</th>
	<th>Telefono</th>
	<th hidden>Password</th>
	<th>Acciones</th>
</tr> 

<? foreach($lista_empleados as $emp): ?>
	<tr>
		<td><?=$emp['LEGAJO']?></td>
		<td><?=$emp['NOMBRE']?></td>
		<td><?=$emp['APELLIDO']?></td>
		<td><?=$emp['DOMICILIO']?></td>
		<td><?=$emp['TELEFONO']?></td>
		<td hidden><?=$emp['PASSWORD']?></td>
		<td>
			<a class="btn btn-success" href="<?=site_url('empleados/editar/'.$emp['LEGAJO'])?>" >Editar</a>
			<a class="btn btn-danger" href="<?=site_url('empleados/eliminar/'.$emp['LEGAJO'])?>" >Eliminar</a>
		</td>
	</tr>
<? endforeach; ?>

</table>