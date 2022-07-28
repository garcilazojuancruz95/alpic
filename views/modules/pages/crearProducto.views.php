<main id="crearCliente" class="formulario">
	<!-- el contenido de la pagina  -->
	<form class="container" method="post">
		<div class="row">
			<h1>Cargar producto</h1>
			<div class="col-12">
				<label for="">Producto</label>
				<input class="controls form-control" type="text" name="nameProd">
			</div>

            <div class="col-12">
				<label for="">Stock</label>
				<input class="controls form-control" type="number" name="stock">
			</div>

            <div class="col-12">
                <label for="">Categoría</label>
                <select class="controls form-control" name="idCategoria">
					<option value="">Seleccione una categoría</option> 
					<option value="1">Silla</option>
				</select>
            </div>

			<div>
				<button type="submit" name="enviar" class="buttons">CARGAR</button>
			</div>
		</div>
		<?php 
			if (isset($_POST["enviar"])) {
				$a = new ProductosController;
				$a->setProductos("crear");
			}
		 ?>
	</form>
</main>