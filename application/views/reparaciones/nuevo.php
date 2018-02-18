<h3>Nueva Reparación</h3>

<?php echo form_open('reparaciones/nuevo',array("class"=>"form-horizontal")); ?>
	<div class="form-group">
		<label for="ID_COMPUTADORA" class="col-md-4 control-label">ID_COMPUTADORA</label>
		<div class="col-md-8">
			<input type="text" name="ID_COMPUTADORA" value="<?=$this->input->post('ID_COMPUTADORA'); ?>" class="form-control" id="ID_COMPUTADORA" />
		</div>
	</div>
	<div class="form-group">
		<label for="ESTADO_REPARACION" class="col-md-4 control-label">ESTADO_REPARACION</label>
		<div class="col-md-8">
			<select name="ESTADO_REPARACION" size=1>
			<? foreach($lista_estados as $est): ?>
			<option value=<?=$est['ID_ESTADO'];?>><?=$est['DESCRIPCION'];?></option>
			<? endforeach; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="FALLA" class="col-md-4 control-label">FALLA</label>
		<div class="col-md-8">
			<input type="text" name="FALLA" value="<?=$this->input->post('FALLA'); ?>" class="form-control" id="FALLA" />
		</div>
	</div>
	<div class="form-group">
		<label for="OBSERVACIONES" class="col-md-4 control-label">OBSERVACIONES</label>
		<div class="col-md-8">
			<input type="text" name="OBSERVACIONES" value="<?=$this->input->post('OBSERVACIONES'); ?>" class="form-control" id="OBSERVACIONES" />
		</div>
	</div>
	<div class="form-group">
		<label for="FECHA_ENTREGA" class="col-md-4 control-label">FECHA_ENTREGA</label>
		<div class="col-md-8">
			<input type="text" name="FECHA_ENTREGA" value="<?=$this->input->post('FECHA_ENTREGA'); ?>" class="form-control" id="FECHA_ENTREGA" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Guardar</button>
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