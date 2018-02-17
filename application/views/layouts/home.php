<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
		<style>
			body {
				background-image: url("<?=base_url()?>/images/fondo1.jpg");
				background-size:cover;
			}
			
			.card {
				font-size: 1em;
				overflow: hidden;
				padding: 0;
				border: none;
				border-radius: .28571429rem;
				box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
			}

			.card-block {
				font-size: 1em;
				position: relative;
				margin: 0;
				padding: 1em;
				border: none;
				border-top: 1px solid rgba(34, 36, 38, .1);
				box-shadow: none;
			}

			.card-img-top {
				display: block;
				width: 100%;
				height: 130px;
			}

			.card-title {
				font-size: 1.28571429em;
				font-weight: 700;
				line-height: 1.2857em;
			}

			.card-text {
				clear: both;
				margin-top: .5em;
				color: rgba(0, 0, 0, .68);
			}

			.card-footer {
				font-size: 1em;
				position: static;
				top: 0;
				left: 0;
				max-width: 100%;
				padding: .75em 1em;
				color: rgba(0, 0, 0, .4);
				border-top: 1px solid rgba(0, 0, 0, .05) !important;
				background: #fff;
			}

			.card-inverse .btn {
				border: 1px solid rgba(0, 0, 0, .05);
			}

			.profile {
				position: absolute;
				top: -12px;
				display: inline-block;
				overflow: hidden;
				box-sizing: border-box;
				width: 25px;
				height: 25px;
				margin: 0;
				border: 1px solid #fff;
				border-radius: 50%;
			}

			.profile-avatar {
				display: block;
				width: 100%;
				height: auto;
				border-radius: 50%;
			}

			.profile-inline {
				position: relative;
				top: 0;
				display: inline-block;
			}

			.profile-inline ~ .card-title {
				display: inline-block;
				margin-left: 4px;
				vertical-align: top;
			}

			.text-bold {
				font-weight: 700;
			}

			.meta {
				font-size: 1em;
				color: rgba(0, 0, 0, .4);
			}

			.meta a {
				text-decoration: none;
				color: rgba(0, 0, 0, .4);
			}

			.meta a:hover {
				color: rgba(0, 0, 0, .87);
			}
			a.boton {
				padding:5px; background-color:#0a0aff; color:#fff
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
						<li class="nav-item" hidden>
							<a class="nav-link" href="<?=site_url('empleados')?>">
								Empleados
							</a>
						</li>
						<li class="nav-item" hidden>
							<a class="nav-link" href="<?=site_url('clientes')?>">
								Clientes
							</a>
						</li><li class="nav-item" hidden>
							<a class="nav-link" href="<?=site_url('proveedores')?>">
								Proveedores
							</a>
						</li><li class="nav-item" hidden>
							<a class="nav-link" href="<?=site_url('componentes')?>">
								Componentes
							</a>
						</li>
						<li class="nav-item" hidden>
							<a class="nav-link" href="<?=site_url('reparaciones')?>">
								Reparaciones
							</a>
						</li>
						<li class="nav-item" hidden>
							<a class="nav-link" href="<?=site_url('computadoras')?>">
								Computadoras
							</a>
						</li>
					</ul>
				
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
