<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Computadora</h3>
            </div>
			<?php echo form_open('computadoras/editar/'.$computadora['ID_COMPUTADORA']); ?>
					<div class="form-group">
						<label for="CLIENTE" class="col-md-4 control-label">Cliente</label>
						<div class="col-md-8">
							<select name="CUIT_CLIENTE" size=1>
							<? foreach($lista_clientes as $cli): ?>
								<option value=<?=$cli['CUIT'];?> <? if($cli['CUIT']==$computadora['CUIT_CLIENTE']) echo 'selected'  ;?>><?=$cli['RAZON_SOCIAL'];?></option>
							<? endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="FECHA_INGRESO" class="col-md-4 control-label">Fecha de Ingreso</label>
						<div class="col-md-8">
							<input type="text" name="FECHA_INGRESO" value="<?php echo ($this->input->post('FECHA_INGRESO') ? $this->input->post('FECHA_INGRESO') : $computadora['FECHA_INGRESO']); ?>" class="form-control" id="FECHA_INGRESO" />
						</div>
					</div>

			<div class="form-group">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a class="btn btn-danger" href="<?=site_url('computadoras')?>" >Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>