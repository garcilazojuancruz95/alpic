<main id="crearUsuario">
	<!-- el contenido de la pagina  -->
<?php 
	echo $_GET["action"];

 ?>	
	<form class="container">

		<div class="row">
			<h1>Crear usuarios</h1>

			<div class="col-12">
				<label for="">Nombre completo</label>
				<input class="controls" type="text" name="name">
			</div>
			
			<div class="col-12">
				<label for="">Email</label>
				<input class="controls" type="email" name="email">
			</div>
			
			
			<div class="col-6">
				<label for="">Direccion</label>
				<input class="controls" type="text" name="direction">
			</div>
			
			<div class="col-6">
				<label for="">Telefono</label>
				<input class="controls" type="text" name="telephone">
			</div>
			
			<div class="col-6">
				<label for="">Fecha de nacimiento</label>
				<input class="controls" type="date" name="birthDate">
			</div>
			
			<div class="col-6" >
				<label for="">DNI</label>
				<input class="controls" type="text">
			</div>
			
			<div>
				<button class="buttons">CARGAR</button>
			</div>
			
		</div>

	</form>
	
</main>