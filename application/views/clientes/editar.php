<h3>Editar Cliente</h3>

<?php echo form_open('clientes/editar/'.$cliente['CUIT']); ?>

	<div class="form-group">
		<label for="RAZON_SOCIAL" class="col-md-4 control-label">Razon Social</label>
		<div class="col-md-8">
			<input type="text" name="RAZON_SOCIAL" value="<?=$cliente['RAZON_SOCIAL'];?>" class="form-control" id="RAZON_SOCIAL" />
			<?=form_error('RAZON_SOCIAL');?>
		</div>
	</div>

	<div class="form-group">
		<label for="DOMICILIO" class="col-md-4 control-label">Domicilio</label>
		<div class="col-md-8">
			<input type="text" name="DOMICILIO" value="<?=$cliente['DOMICILIO']; ?>" class="form-control" id="DOMICILIO" />
			<?=form_error('DOMICILIO');?>
		</div>
	</div>

	<div class="form-group">
		<label for="TELEFONO" class="col-md-4 control-label">Telefono</label>
		<div class="col-md-8">
			<input type="text" name="TELEFONO" value="<?=$cliente['TELEFONO']; ?>" class="form-control" id="TELEFONO" />
			<?=form_error('TELEFONO');?>
		</div>
	</div>

	<div class="form-group">
		<label for="LEGAJO_ENCARGADO" class="col-md-4 control-label">Encargado</label>
		<div class="col-md-8">
			<select name="LEGAJO_ENCARGADO" size=1>
			<? foreach ($lista_empleados as $emp){?>
			<? if ($emp['CARGO'] == "E"){?>
			<option value=<?=$emp['LEGAJO'];?> <? if($emp['LEGAJO']==$cliente['LEGAJO_ENCARGADO']) echo 'selected';?>><?=$emp['APELLIDO'];?></option>
			<? }?>
			<? }?>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="ESTADO" class="col-md-4 control-label">ESTADO</label>
		<div class="col-md-8">
			<select name="ESTADO" class="form-control" id="ESTADO">
				<option value="ACTIVO" <?php if($cliente['ESTADO'] == 'ACTIVO') echo "selected";?> >Activo</option>
				<option value="INACTIVO" <?php if($cliente['ESTADO'] == 'INACTIVO') echo "selected";?> >Inactivo</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">
				<i class="fa fa-check"></i> Guardar
			</button>
			<a class="btn btn-danger" href="<?=site_url('clientes')?>" >Cancelar</a>
		</div>
	</div>
<?php echo form_close(); ?>