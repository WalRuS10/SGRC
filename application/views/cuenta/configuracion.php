 
	<!--<img src='../images/logo.png' class='mx-auto d-block' alt='logo'>     -->
	 <form action="<?=site_url('cuenta/configuracion')?>" method="post" class="form-signin" accept-charset="utf-8">
	 
        <h2 class="form-signin-heading">Configuracion</h2>
		
		<div class="form-group">
			<label for="oldpassword">Password Actual</label>
			<input type="password" name="oldpassword" class="form-control" placeholder="Password Actual" required>
		</div>
		<div class="form-group">
			<label for="newpassword">Password Nuevo</label>
			<input type="password" name="newpassword" class="form-control" placeholder="Password Nuevo" required>
		</div>
		<div class="form-group">
			<label for="newpasswordr">Confirmar Password</label>
			<input type="password" name="newpasswordr" class="form-control" placeholder="Confirmar Password" required>
		</div>
       <!-- <div class="checkbox">
          <label>
            <input type="checkbox" name="remember-me"> Recordarme
          </label>
        </div>
		-->
		<button class="btn btn-primary" type="submit">Guardar</button>
		<a class="btn btn-danger" href="<?=site_url('empleados')?>" >Cancelar</a>
		</form>

		<? if(validation_errors() != "" or isset($errorMessage)) 
			echo "<div class='alert alert-danger' style='margin-top: 30px; background-color: rgba(255,255,255,0.5)'> 
					<strong>Error!</strong> " .  validation_errors();
					
			if(isset($errorMessage))
				echo "</br> $errorMessage";
			
			echo "</div>";
		?>
	
	  