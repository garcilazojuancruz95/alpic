
<div class="container mt-5" id="login">
	<h1 class="panel-title2 text-center mb-4 text-danger">ELIMINAR CUENTA</h1>
	<form method="post" class="row justify-content-center">
		<div class="form-group col-7 mb-5">
			<p class="text-danger text-center">Esta a punto de eliminar la cuenta con correo : <b><?= $_SESSION["email"] ?></b> </p>
            <p class="text-danger text-center">¿Desea eliminar la cuenta?</p>
		</div>
		<div class="form-group col-7 mb-5">
			<button type="submit" name="submit" class="btn w-100" id="btn-env-contacto">Eliminar</button>
		</div>
	</form>
</div>

<?php
    if(isset($_POST['submit'])){
        $respuesta = UsuarioModel::eliminarCuenta(array("id"=> $_SESSION["id"]));
        if($respuesta){
            unset($_SESSION['id']);
            unset($_SESSION['email']);
            unset($_SESSION['es_admin']);
            unset($_SESSION['domicilio']);
            unset($_SESSION['telefono']);
            unset($_SESSION['nombre_completo']);
            header("location:/login/cuenta_eliminada");
        }
    }

?>