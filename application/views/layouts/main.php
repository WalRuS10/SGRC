<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="/resources/demos/style.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
		<style>
			body {
				background-image: url("<?=base_url()?>/images/fondo1.jpg");
				background-size:cover;
			}
		</style>
		<title>SGRC</title>
	</head>
	<body>
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
				<a class="navbar-brand" href="<?=site_url('home')?>">
				<img src='<?=base_url()?>/images/logo2.png' class='mx-auto d-block' alt='logo' width="120">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto ">
						<li class="nav-item">
							<a class="nav-link" href="<?=site_url('empleados')?>">
								Empleados
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=site_url('clientes')?>">
								Clientes
							</a>
						</li><li class="nav-item">
							<a class="nav-link" href="<?=site_url('proveedores')?>">
								Proveedores
							</a>
						</li><li class="nav-item">
							<a class="nav-link" href="<?=site_url('componentes')?>">
								Componentes
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=site_url('reparaciones')?>">
								Reparaciones
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=site_url('computadoras')?>">
								Computadoras
							</a>
						</li>
					</ul>
					<!--
					<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="..." aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
					</form>
					-->
					<ul class="navbar-nav pull-right">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Cuenta - <?=$_SESSION['NOMBRE']?>
							</a>
							
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							  <a class="dropdown-item" href="<?=site_url('cuenta/configuracion')?>">Configuracion</a>
							  <div class="dropdown-divider"></div>
							  <a class="dropdown-item" href="<?=site_url('cuenta/logout')?>">Salir</a>
							</div>
						</li>
					</ul>
				</div>
				
			</nav>
			
			<?php                    
			if(isset($_view) && $_view)
				$this->load->view($_view);
			?>   	
			
			
		</div> <!-- container-fluid -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	<script>$(document).ready( function() {
		$('.dropdown-toggle').dropdown();
		});
	</script>
	</body>
</html>
