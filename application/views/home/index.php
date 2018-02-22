<?php $validuser = $this->Empleados_model->searchExact("NOMBRE", $this->session->NOMBRE); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-lg-3 mt-4">
			<div class="card">
				<img class="card-img-top" src="<?=base_url()?>/images/reparaciones.jpg">
				<div class="card-block">
					<h4 class="card-title">Reparaciones</h4>
					<div class="card-text">
						
					</div>
				</div>
				<div class="card-footer">
					<?php if($validuser['CARGO'] != "T") { ?> <a class="boton" href="<?=site_url('reparaciones/nuevo')?>">Nuevo</a> <?php } ?>
					<a class="boton" href="<?=site_url('reparaciones')?>">Listado</a>
				</div>
			</div>
		</div>
		<?php if($validuser['CARGO'] == "A") { ?>
		<div class="col-sm-6 col-md-4 col-lg-3 mt-4">
			<div class="card">
				<img class="card-img-top" src="<?=base_url()?>/images/empleados.jpg">
				<div class="card-block">
					<h4 class="card-title">Empleados</h4>
					<div class="card-text">
						
					</div>
				</div>
				<div class="card-footer">
					<a class="boton" href="<?=site_url('empleados/nuevo')?>">Nuevo</a>
					<a class="boton" href="<?=site_url('empleados')?>">Listado</a>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<?php if($validuser['CARGO'] != "T") { ?>
		<div class="col-sm-6 col-md-4 col-lg-3 mt-4">
			<div class="card">
				<img class="card-img-top" src="<?=base_url()?>/images/clientes.jpg">
				<div class="card-block">
					<h4 class="card-title">Clientes</h4>
					<div class="card-text">
						
					</div>
				</div>
				<div class="card-footer">
					<a class="boton" href="<?=site_url('clientes/nuevo')?>">Nuevo</a>
					<a class="boton" href="<?=site_url('clientes')?>">Listado</a>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<?php if($validuser['CARGO'] != "T") { ?>
		<div class="col-sm-6 col-md-4 col-lg-3 mt-4">
			<div class="card">
				<img class="card-img-top" src="<?=base_url()?>/images/proveedores.jpg">
				<div class="card-block">
					<h4 class="card-title">Proveedores</h4>
					<div class="card-text">
						
					</div>
				</div>
				<div class="card-footer">
					<a class="boton" href="<?=site_url('proveedores/nuevo')?>">Nuevo</a>
					<a class="boton" href="<?=site_url('proveedores')?>">Listado</a>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<?php if($validuser['CARGO'] != "T") { ?>
		<div class="col-sm-6 col-md-4 col-lg-3 mt-4">
			<div class="card">
				<img class="card-img-top" src="<?=base_url()?>/images/componentes.jpg">
				<div class="card-block">
					<h4 class="card-title">Componentes</h4>
					<div class="card-text">
						
					</div>
				</div>
				<div class="card-footer">
					<a class="boton" href="<?=site_url('componentes/nuevo')?>">Nuevo</a>
					<a class="boton" href="<?=site_url('componentes')?>">Listado</a>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<?php if($validuser['CARGO'] != "T") { ?>
		<div class="col-sm-6 col-md-4 col-lg-3 mt-4">
			<div class="card">
				<img class="card-img-top" src="<?=base_url()?>/images/computadoras.jpg">
				<div class="card-block">
					<h4 class="card-title">Computadoras</h4>
					<div class="card-text">
						
					</div>
				</div>
				<div class="card-footer">
					<a class="boton" href="<?=site_url('computadoras/nuevo')?>">Nuevo</a>
					<a class="boton" href="<?=site_url('computadoras')?>">Listado</a>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
