 <main id="editarCliente">
 	<?php $cliente = ClientesModel::getClienteById(array("id"=>$_GET["id"]));
 	 ?>
	<!-- el contenido de la pagina  -->
	<form class="container" method="post">
		<div class="row">
			<h1>Editar Cliente</h1>
			<div class="col-12">
				<label for="">Nombre completo</label>
				<input class="controls form-control" value="<?= $cliente["name"] ?>" type="text" name="name">
			</div>
			
			<div class="col-12">
				<label for="">Email</label>
				<input class="controls form-control" value="<?= $cliente["email"] ?>" type="email" name="email">
			</div>

			<div class="col-6">
				<label for="">Direccion</label>
				<input class="controls form-control" value="<?= $cliente["address"] ?>" type="text" name="address">
			</div>
			
			<div class="col-6">
				<label for="">Telefono</label>
				<input class="controls form-control" value="<?= $cliente["phone"] ?>" type="number" name="phone">
			</div>
			
			<div class="col-6">
				<label for="">Fecha de nacimiento</label>
				<input class="controls form-control" value="<?= $cliente["birthDate"] ?>" type="date" name="birthDate">
			</div>
			
			<div class="col-6" >
				<label for="">DNI</label>
				<input class="controls form-control" value="<?= $cliente["dni"] ?>" name="dni" type="number">
			</div>
			
			<div>
				<button type="submit" name="enviar" class="buttons">CARGAR</button>
			</div>
		</div>
		<?php 
			//Instancia de una clase, osea copiarla y meterla en una variable.
			if (isset($_POST["enviar"])) {
				$a = new ClientesController;
				$a->editarCliente();
			}
			//Con este codigo de arriba verificamos que ejecute la instancia y el metodo crearUsuario solamente cuando el usuario toca el el boton CARGAR.
		 ?>
	</form>
</main>