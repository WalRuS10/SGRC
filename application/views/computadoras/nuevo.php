<h1>Nueva computadora</h1>

<?php echo form_open('computadoras/nuevo',array("class"=>"form-horizontal")); ?>
<div class="form-group">
	<label for="CLIENTE" class="col-md-4 control-label">Cliente</label>
	<div class="col-md-8">
		<select name="CUIT_CLIENTE" size=1>
		<? foreach($lista_clientes as $cli): ?>
		<option value=<?=$cli['CUIT'];?>><?=$cli['RAZON_SOCIAL'];?></option>
		<? endforeach; ?>
		</select>
	</div>
</div>
<div class="form-group">
	<label for="FECHA_INGRESO" class="col-md-4 control-label">Fecha de Ingreso</label>
	<div class="col-md-8">
		<input type="text" name="FECHA_INGRESO" value="<?=$this->input->post('FECHA_INGRESO'); ?>" class="form-control" id="FECHA_INGRESO" />
	</div>
</div>


<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Guardar</button>
		<a class="btn btn-danger" href="<?=site_url('computadoras')?>" >Cancelar</a>
	</div>
</div>

<script>
$.noConflict();
jQuery(document).ready(function ($) {
    $("#FECHA_INGRESO").datepicker();
});
</script>

<?php echo form_close(); ?>