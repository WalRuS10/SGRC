<?php $validuser = $this->Empleados_model->searchExact("NOMBRE", $this->session->NOMBRE); ?>
<h3>Editar Reparacion</h3>
	
<?php echo form_open('reparaciones/editar/'.$reparacion['NRO_ORDEN']); ?>

	<?php if($validuser['CARGO'] != "T") {?>
	<div class="form-group">
		<label for="ESTADO_REPARACION" class="col-md-4 control-label">Estado</label>
		<div class="col-md-8">
			<select name="ESTADO_REPARACION" size=1>
				<? foreach($lista_estados as $est): ?>
				<option value=<?=$est['ID_ESTADO'];?> <?if(($this->input->post('ESTADO_REPARACION') ? $this->input->post('ESTADO_REPARACION') : $reparacion['ESTADO_REPARACION'])== $est['ID_ESTADO']) echo 'selected';?>><?=$est['DESCRIPCION'];?></option>
				<? endforeach; ?>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="FALLA" class="col-md-4 control-label">Falla</label>	
		<div class="col-md-8">	
			<input type="text" name="FALLA" value="<?php echo ($this->input->post('FALLA') ? $this->input->post('FALLA') : $reparacion['FALLA']); ?>" class="form-control" id="FALLA" />
		</div>
	</div>
	<?php } ?>

	<div class="form-group">
		<label for="OBSERVACIONES" class="col-md-4 control-label">Observaciones</label>
		<div class="col-md-8">
			<input type="text" name="OBSERVACIONES" value="<?php echo ($this->input->post('OBSERVACIONES') ? $this->input->post('OBSERVACIONES') : $reparacion['OBSERVACIONES']); ?>" class="form-control" id="OBSERVACIONES" />
		</div>
	</div>

	<?php if($validuser['CARGO'] != "T") {?>
	<div class="form-group">
		<label for="FECHA_ENTREGA" class="col-md-4 control-label">Fecha de Entrega</label>
		<div class="col-md-8">
			<input type="text" name="FECHA_ENTREGA" value="<?php echo ($this->input->post('FECHA_ENTREGA') ? $this->input->post('FECHA_ENTREGA') : $reparacion['FECHA_ENTREGA']); ?>" class="form-control" id="FECHA_ENTREGA" />
		</div>
	</div>
	<?php } ?>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">
				Guardar
			</button>
			<a class="btn btn-danger" href="<?=site_url('reparaciones')?>" >Cancelar</a>
		</div>				
	</div>
	
	<script>
		$.noConflict();
		jQuery(document).ready(function ($) {
			$("#FECHA_ENTREGA").datepicker();
		});
	</script>
<?php echo form_close(); ?>

<hr />

<?php if($validuser['CARGO'] != "T") {?>
<h3>Asignar Técnico</h3>

<?php echo form_open('reparaciones/agregar_tecnico/'.$reparacion['NRO_ORDEN']); ?>

<div class="form-group">
	<label for="LEGAJO_TECNICO" class="col-md-4 control-label">Técnico</label>
	<div class="col-md-8">
		<select name="LEGAJO_TECNICO" size=1>
			<? foreach($lista_tecnicos_no_usados as $lc): ?>
			<option value=<?=$lc['LEGAJO'];?>><?=$lc['APELLIDO'];?></option>
			<? endforeach; ?>
		</select>
	</div>
</div>
<div class="form-group">
	<div class="col-md-8">
		<button type="submit" class="btn btn-success">
			Agregar
		</button>
	</div>
</div>
			
<?php echo form_close(); ?>


<hr />

<h3>Técnicos Asignados</h3>


<table class="table table-light">

<tr>
	<th>Técnico</th>
	<th>Acciones</th>
</tr> 

<? foreach($lista_tecnicos_usados as $c): ?>
		<tr>
			<td><?=$c['APELLIDO']?></td>
			<td>
				<a href="<?=site_url('reparaciones/remover_tecnico/'.$reparacion['NRO_ORDEN'].'/'.$c['LEGAJO']);?>">eliminar</a>
			</td>
		</tr>
<? endforeach; ?>

</table>


<hr />
<?php } ?>

<h3>Componentes</h3>

<?php echo form_open('reparaciones/agregar_componente/'.$reparacion['NRO_ORDEN']); ?>

<div class="form-group">
	<label for="ID_COMPONENTE" class="col-md-4 control-label">Componente</label>
	<div class="col-md-8">
		<select name="ID_COMPONENTE" size=1>
			<? foreach($lista_componentes_no_usados as $lc): ?>
			<option value=<?=$lc['ID_COMPONENTE'];?>><?=$lc['DESCRIPCION'];?></option>
			<? endforeach; ?>
		</select>
	</div>
</div>
<div class="form-group">
	<label for="CANTIDAD" class="col-md-4 control-label">Cantidad</label>
	<div class="col-md-8">
		<input type="text" name="CANTIDAD" class="form-control" id="CANTIDAD" />
	</div>
</div>
<div class="form-group">
	<div class="col-md-8">
		<button type="submit" class="btn btn-success">
			Agregar
		</button>
	</div>
</div>
			
<?php echo form_close(); ?>


<hr />

<h3>Componentes Usados y Gastos</h3>


<a href="<?=site_url('reparaciones/imprimir/'.$reparacion['NRO_ORDEN']);?>" class="btn btn-primary" target="_blank">Imprimir</a> 
<table class="table table-light">

<tr>
	<th hidden>ID</th>
	<th hidden>Stock</th>
	<th>Cantidad</th>
	<th>Descripción</th>
	<th>Precio x Unidad</th>
	<th>SubTotal</th>
	<th>Acciones</th>
</tr> 

<? foreach($lista_componentes_usados as $c): ?>
		<tr>
			<td hidden><?=$c['ID_COMPONENTE']?></td>
			<td hidden><?=$c['STOCK']?></td>
			<td><?=$c['CANTIDAD']?></td>
			<td><?=$c['DESCRIPCION']?></td>
			<td>$<?=number_format($c['PRECIO_COMPRA'],2);?>
			</td>
			<td>$<?=number_format($c['SUBTOTAL'],2);?></td>
			<td>
				<a href="<?=site_url('reparaciones/remover_componente/'.$reparacion['NRO_ORDEN'].'/'.$c['ID_COMPONENTE']);?>">eliminar</a>
			</td>
		</tr>
<? endforeach; ?>
	<tr>	
		<td style="font-weight:bold; font-size:24px" colspan="3">
			Total
		</td>
		<td style="font-weight:bold; font-size:24px" colspan="2">
			$<?=number_format($gasto['TOTAL'],2);?>
		</td>
	</tr>
</table>
