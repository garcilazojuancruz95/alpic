 <main id="asignarPrestamo" class="formulario">
	<!-- el contenido de la pagina  -->
	<form class="container" method="post">
		<div class="row justify-content-center">
			<h1>Asignar Prestamo</h1>
			<div class="col-8 row px-0">
				<div class="col-8">
					<label for="">Cliente</label>
					<select name="idCliente" class="form-control">
						<option value="-1">Elija una opcion</option>
						<?php 
							$listaClientes = ClientesModel::listaCliente();
							foreach ($listaClientes as $key => $value) {
								echo "<option value='".$value["id"]."'>".$value["name"]."</option>";
							}
						 ?>
					</select>
				</div>
				<div class="col-4">
					<label for="">Fecha devolucion</label>
					
					<input type="date" name="fechaDevolucion" class="form-control text-center">
				</div>
			</div>
					<?php 
					$stockPrestamos = PrestamosModel::stockPrestamos();
					$stockProductos = PrestamosModel::stockProductos();
					$arrayPrestamo = [];
					$arrayProducto = [];
					foreach($stockPrestamos as $key => $value){
						$arrayPrestamo[$value["prestamo"]] = $value["cantidad"]; 
					}
					foreach($stockProductos as $key => $value){
						$arrayProducto[$value["id"]] = $value["stock"]; 
					}

					foreach ($arrayProducto as $key => $value) {
						if (isset($arrayPrestamo[$key])) {
							$arrayProducto[$key] = $arrayProducto[$key] - $arrayPrestamo[$key];
							if ($arrayProducto[$key] < 1) {
								$arrayProducto[$key] = "sin stock";
							}
						}
					}
					 ?>
			<div class="col-8 row px-0">
				<div class="col-8">
					<label for="">Prestamo #1</label>
					<select name="prestamo[]" class="form-control">
						<option value="-1">Elija una opcion</option>
						<?php

							$listaProducto = ProductosModel::listaProducto();
							foreach ($listaProducto as $key => $value) {
								if ($arrayProducto[$value["id"]] != "sin stock") {
									echo "<option value='".$value["id"]."'>".$value["name"]."</option>";
								}
							}
						 ?>
					</select>
				</div>
				<div class="col-4">
					<label for="">Cantidad</label>
					<input type="number" class="form-control" min="1" name="cantidad[]">
				</div>
			</div>

			<div class="col-8 row px-0">
				<div class="col-8">
					
					<label for="">Prestamo #2</label>
					<select name="prestamo[]" class="form-control">
						<option value="-1">Elija una opcion</option>
						<?php 
							$listaProducto = ProductosModel::listaProducto();
							foreach ($listaProducto as $key => $value) {
								echo "<option value='".$value["id"]."'>".$value["name"]."</option>";
							}
						 ?>
					</select>
				</div>
				<div class="col-4">
					<label for="">Cantidad</label>
					<input type="number" class="form-control" min="1" name="cantidad[]">
				</div>
			</div>

			<div class="col-8 row px-0">
				<div class="col-8">
					
					<label for="">Prestamo #3</label>
					<select name="prestamo[]" class="form-control">
						<option value="-1">Elija una opcion</option>
						<?php 
							$listaProducto = ProductosModel::listaProducto();
							foreach ($listaProducto as $key => $value) {
								echo "<option value='".$value["id"]."'>".$value["name"]."</option>";
							}
						 ?>
					</select>
				</div>
				<div class="col-4">
					<label for="">Cantidad</label>
					<input type="number" class="form-control" min="1" name="cantidad[]">
				</div>
			</div>

			<div class="col-8 mt-3">
				<button type="submit" name="enviar" class="buttons">CARGAR</button>
			</div>
		</div>
		<?php 
			//Instancia de una clase, osea copiarla y meterla en una variable.
			if (isset($_POST["enviar"])) {
				$a = new PrestamosController;
				$a->setPrestamo("crear");
			}
			//Con este codigo de arriba verificamos que ejecute la instancia y el metodo crearUsuario solamente cuando el usuario toca el el boton CARGAR.
		 ?>
	</form>
</main>