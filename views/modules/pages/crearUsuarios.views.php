<main id="crearUsuario">
	<!-- el contenido de la pagina  -->
<?php 
	echo $_GET["action"];

 ?>	
	<div class="crearUsuario">
		<h1>Crear Usuarios</h1>
		<form>
			<label for="nombre">Nombre completo</label>
			<input type="text">
			
			<label for="email">Email</label>
			<input type="email">

			<label for="direccion">Direccion</label>
			<input type="text">

			<label for="telefono">Telefono</label>
			<input type="number">

			<label for="fecha">Fecha de nacimiento</label>
			<input type="date">

			<label for="dni">DNI</label>
			<input type="number">

			<input type="submit" value="CARGAR">

		</form>
	</div>
	
</main>