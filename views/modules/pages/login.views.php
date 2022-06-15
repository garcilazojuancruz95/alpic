<?php if (isset($_GET["id"]) AND $_GET["id"] == "cuenta_eliminada"):?>
 <p class="alert alert-success fs-5 ps-5">La cuenta fue eliminada!</p>
<?php endif; ?>
<div class="container mt-5" id="login">
	<h1 class="panel-title2 text-center mb-4">Log In</h1>
	<form method="post" class="row justify-content-center">
		<div class="form-group col-7 mb-5">
			<input type="text" class="form-control" name="email" placeholder="Email">
		</div>
		<div class="form-group col-7 mb-5">
			<input type="password" class="form-control" name="password" placeholder="Contraseña">
		</div>
		<div class="form-group col-7 mb-5">
			<button type="submit" name="submit" class="btn w-100" id="btn-env-contacto">Ingresar</button>
		</div>
		<div class="form-group col-7 text-center">
			<a href="/registro" class="link-dark">Crear cuenta - Registro</a>
		</div>
	</form>

</div>
<?php 
	if (isset($_POST['submit'])) {
		/*INSTANCIAMOS la clase Usuario , y la variable $a se convierte en un OBJETO. Osea en una copia de la clase.*/
		$a = new UsuarioController;
		$a->login();
	}
 ?>
<?php if (isset($_GET["id"]) AND strpos($_GET["id"], "registroExito") != false):?>
 <script>
 	Swal.fire(
	  'Exitos!',
	  'Se registro bien!',
	  'success'
	)
 </script>
<?php endif; ?>
