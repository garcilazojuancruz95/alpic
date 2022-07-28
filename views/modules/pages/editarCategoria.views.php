<main id="editarCliente" class="formulario">
 	<?php $categoria = CategoriaModel::getCategoriaById(array("id"=>$_GET["id"]));?>
	<!-- el contenido de la pagina  -->
	<form class="container" method="post">
		<input type="hidden" value="<?= $_GET["id"] ?>" name="id">
		<div class="row">
			<h1>Editar Categoría</h1>
			<div class="col-12">
				<label for="">Categoría</label>
				<input class="controls form-control" value="<?= $categoria["categoria"] ?>" type="text" name="categoria">
			</div>
			
			<div>
				<button type="submit" name="enviar" class="buttons">CARGAR</button>
			</div>
		</div>
		<?php 
			if (isset($_POST["enviar"])) {
				$a = new CategoriaController;
				$a->setCategoria("editar");
			}
		 ?>
	</form>
</main>