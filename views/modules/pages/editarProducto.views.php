<main id="crearCliente" class="formulario">
	<?php $product = ProductosModel::getProductById(array("id"=>$_GET["id"]));?>
	<!-- el contenido de la pagina  -->
	<form class="container" method="post">
		<input type="hidden" value="<?= $_GET["id"] ?>" name="id">
		<div class="row justify-content-center">
			<h1>Cargar producto</h1>
			<div class="col-11">
				<label for="">Producto</label>
				<input class="controls form-control" type="text" value="<?= $product["name"] ?>" name="name">
			</div>

            <div class="col-11">
				<label for="">Stock</label>
				<input class="controls form-control" type="number" value="<?= $product["stock"] ?>" name="stock">
			</div>

            <div class="col-11">
                <label for="">Categoría</label>
                <select class="controls form-control" name="idCategoria">
                	<option value="">Seleccione una categoría</option>
                	<?php 
                		$categorias = CategoriaModel::listaCategoria(); 
                		foreach ($categorias as $key => $value) {
                			if ($value["id"] == $product["idCategoria"]) {
                			    echo "<option value='".$value["id"]."' selected>".$value["categoria"]."</option>";

                			}else{
                				echo "<option value='".$value["id"]."'>".$value["categoria"]."</option>";

                			}
                		}
                	?>
                </select>
            </div>

			<div class="col-md-11 my-4">
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