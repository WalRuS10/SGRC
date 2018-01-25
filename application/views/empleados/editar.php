<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Empleado</h3>
            </div>
			<?php echo form_open('empleados/editar/'.$empleado['LEGAJO']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="NOMBRE" class="control-label">NOMBRE</label>
						<div class="form-group">
							<input type="text" name="NOMBRE" value="<?php echo ($this->input->post('NOMBRE') ? $this->input->post('NOMBRE') : $empleado['NOMBRE']); ?>" class="form-control" id="NOMBRE" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="APELLIDO" class="control-label">APELLIDO</label>
						<div class="form-group">
							<input type="text" name="APELLIDO" value="<?php echo ($this->input->post('APELLIDO') ? $this->input->post('APELLIDO') : $empleado['APELLIDO']); ?>" class="form-control" id="APELLIDO" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="DOMICILIO" class="control-label">DOMICILIO</label>
						<div class="form-group">
							<input type="text" name="DOMICILIO" value="<?php echo ($this->input->post('DOMICILIO') ? $this->input->post('DOMICILIO') : $empleado['DOMICILIO']); ?>" class="form-control" id="DOMICILIO" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="TELEFONO" class="control-label">TELEFONO</label>
						<div class="form-group">
							<input type="text" name="TELEFONO" value="<?php echo ($this->input->post('TELEFONO') ? $this->input->post('TELEFONO') : $empleado['TELEFONO']); ?>" class="form-control" id="TELEFONO" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="PASSWORD" class="control-label">PASSWORD</label>
						<div class="form-group">
							<input type="password" name="PASSWORD" value="" class="form-control" id="PASSWORD" />
						</div>
					</div>
					<div class="form-group">
						<label for="CARGO" class="col-md-4 control-label">CARGO</label>
						<div class="col-md-8">
							<select name="CARGO" class="form-control" id="CARGO">
								<option value="E" <?php if(($this->input->post('CARGO') ? $this->input->post('CARGO') : $empleado['CARGO']) == 'E') echo "selected";?> >Encargado</option>
								<option value="T" <?php if(($this->input->post('CARGO') ? $this->input->post('CARGO') : $empleado['CARGO']) == 'T') echo "selected";?> >Técnico</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a class="btn btn-danger" href="<?=site_url('empleados')?>" >Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>