 
	<!--<img src='../images/logo.png' class='mx-auto d-block' alt='logo'>     -->
	 <form action="<?=site_url('cuenta/configuracion')?>" method="post" class="form-signin" accept-charset="utf-8">
	 
        <h2 class="form-signin-heading">Configuracion</h2>
		
        <label for="oldpassword" class="sr-only">Password Actual</label>
        <input type="password" name="oldpassword" class="form-control" placeholder="Password Actual" required>
		
		<label for="newpassword" class="sr-only">Password Nuevo</label>
        <input type="password" name="newpassword" class="form-control" placeholder="Password Nuevo" required>
		
		<label for="newpasswordr" class="sr-only">Confirmar Password</label>
        <input type="password" name="newpasswordr" class="form-control" placeholder="Confirmar Password" required>
       <!-- <div class="checkbox">
          <label>
            <input type="checkbox" name="remember-me"> Recordarme
          </label>
        </div>
		-->
        <button class="btn btn-primary" type="submit">Guardar</button>
		<a class="btn btn-danger" href="<?=site_url('empleados')?>" >Cancelar</a>
      </form>
	  
	  <?=validation_errors()?>
	  <?if(isset($errorMessage)) echo $errorMessage?>