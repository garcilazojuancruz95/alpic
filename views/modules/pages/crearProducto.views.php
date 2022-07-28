<main id="crearCliente" class="formulario">
	<!-- el contenido de la pagina  -->
	<form class="container" method="post">
		<div class="row justify-content-center">
			<h1>Cargar producto</h1>
			<div class="col-11">
				<label for="">Producto</label>
				<input class="controls form-control" type="text" name="name">
			</div>

            <div class="col-11">
				<label for="">Stock</label>
				<input class="controls form-control" type="number" name="stock">
			</div>

            <div class="col-11">
                <label for="">Categoría</label>
                <select class="controls form-control" name="idCategoria">
                	<option value="">Seleccione una categoría</option>
                	<?php 
                		$categorias = CategoriaModel::listaCategoria(); 
                		foreach ($categorias as $key => $value) {
                			echo "<option value='".$value["id"]."'>".$value["categoria"]."</option>";
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
				$a->setProducto("crear");
			}
		 ?>
	</form>
</main>