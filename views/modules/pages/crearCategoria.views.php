<main id="crearCategoria" class="formulario">
	<form class="container" method="post">
		<div class="row">
			<h1>Crear categoría</h1>
			<div class="col-12">
				<label for="">Nombre categoría</label>
				<input class="controls form-control" type="text" name="categoria">
			</div>

			<div>
				<button type="submit" name="enviar" class="buttons">CARGAR</button>
			</div>
		</div>
		<?php 
			if (isset($_POST["enviar"])) {
				$a = new CategoriaController;
				$a->setCategoria("crear");
			}
		 ?>
	</form>
</main>
