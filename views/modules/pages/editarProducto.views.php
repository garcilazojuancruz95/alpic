<main id="editarCliente">
 	<?php $cliente = ClientesModel::getClienteById(array("id"=>$_GET["id"]));
 	 ?>
	<!-- el contenido de la pagina  -->
	<form class="container" method="post">
		<input type="hidden" value="<?= $_GET["id"] ?>" name="id">
		<div class="row">
			<h1>Editar Producto</h1>
			<div class="col-12">
				<label for="">Producto</label>
				<input class="controls form-control" value="<?= $producto["nameProd"] ?>" type="text" name="nameProd">
			</div>
			
			<div class="col-12">
				<label for="">Stock</label>
				<input class="controls form-control" value="<?= $producto["stock"] ?>" type="number" name="stock">
			</div>

			<div class="col-6">
				<label for="">Categoría</label>
				<select class="controls form-control" value="<?= $producto["category"] ?>" type="" name="category"></select>
			</div>
			
			<div>
				<button type="submit" name="enviar" class="buttons">CARGAR</button>
			</div>
		</div>
		<?php 
			if (isset($_POST["enviar"])) {
				$a = new ProductosController;
				$a->setProducto("editar");
			}
		 ?>
	</form>
</main>