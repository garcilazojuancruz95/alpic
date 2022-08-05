 <?php 
 	$id = $_GET['id'];
 	$prestamo = PrestamosModel::getPrestamoById(array("id"=>$id));
  ?>
 <main id="asignarPrestamo" class="formulario">
	<!-- el contenido de la pagina  -->
	<form class="container" method="post">
		<div class="row justify-content-center">
			<h1>Editar fecha de Prestamo</h1>
			<div class="col-8 row px-0">
				<div class="col-8">
					<label for="">Cliente</label>
					<hr class="my-1">
					<p class="text-dark"><?= $prestamo["name"]  ?></p>
				</div>
				<div class="col-4">
					<label for="" class="mb-2 text-primary fw-bold">Fecha devolucion</label>

					<input type="date" value="<?= $prestamo["fechaDevolucion"] ?>" name="fechaDevolucion" class="form-control text-center border-primary text-primary">
				</div>
			</div>
			<?php 
				$prestamoLista = PrestamosModel::getPrestamoLista(array("id"=>$id));

			?>
			<?php foreach ($prestamoLista as $key => $lista): ?>
			<div class="col-8 row px-0">
				<div class="col-8">
					<label for="">Prestamo #1</label>
					<p class="text-dark"><?= $lista["name"]  ?></p>
				</div>
				<div class="col-4">
					<label for="">Cantidad</label>
					<p class="text-dark"><?= $lista["cantidad"]  ?></p>
				</div>
			</div>
			<?php endforeach ?>

			<div class="col-8 mt-3">
				<button type="submit" name="enviar" class="buttons">CARGAR</button>
			</div>
		</div>
		<?php 
			//Instancia de una clase, osea copiarla y meterla en una variable.
			if (isset($_POST["enviar"])) {
				$_POST["id"] = $id;
				$a = new PrestamosController;
				$a->editarFechaPrestamo();
			}
			//Con este codigo de arriba verificamos que ejecute la instancia y el metodo crearUsuario solamente cuando el usuario toca el el boton CARGAR.
		 ?>
	</form>
</main>