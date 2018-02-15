 
	<img src='<?=base_url()?>/images/logo.png'  class='mx-auto d-block' alt='logo'>     
	 <form action="<?=site_url('cuenta/login')?>" method="post" class="form-signin" accept-charset="utf-8">
	 
        <h2 class="form-signin-heading">Login</h2>
        <label for="nombre" class="sr-only">Usuario</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
       <!-- <div class="checkbox">
          <label>
            <input type="checkbox" name="remember-me"> Recordarme
          </label>
        </div>
		-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesion</button>
      </form>
	  
	  <?=validation_errors()?>
	  <?if(isset($errorMessage)) echo $errorMessage?>