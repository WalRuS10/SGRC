 
	     
	 <form action="<?=site_url('cuenta/login')?>" method="post" class="form-signin" accept-charset="utf-8">
	 <img src='<?=base_url()?>/images/logo.png'  class='mx-auto d-block' alt='logo' width = '100%'> </br>
        <!--<h2 class="form-signin-heading">Login</h2>-->
		<div class="form-group">
			<label for="nombre">Usuario</label>
			<input type="text" name="nombre" class="form-control" placeholder="Nombre" required autofocus autocorrect="off">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password" required>
		</div>
       <!-- <div class="checkbox">
          <label>
            <input type="checkbox" name="remember-me"> Recordarme
          </label>
        </div>
		-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesion</button>
      </form>
	  

		<? if(validation_errors() != "" or isset($errorMessage)) 
			echo "<div class='alert alert-danger' style='margin-top: 30px; background-color: rgba(255,255,255,0.5)'> 
					<strong>Error!</strong> " .  validation_errors();
					
			if(isset($errorMessage))
				echo "</br> $errorMessage";
			
			echo "</div>";
		?>
