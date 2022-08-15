<?php 
date_default_timezone_set('America/Argentina/Buenos_Aires');
 ?>
<?php if(isset($_GET["id"]) AND $_GET['id'] == "success_asignar"): ?>
	<script>
		Swal.fire(
		  'Prestamo asignado!',
		  'Exito al asignar el prestamo a un cliente!',
		  'success'
		)
	</script>
<?php endif; ?>
<?php if(isset($_GET["id"]) AND $_GET['id'] == "success_fecha_editar"): ?>
	<script>
		Swal.fire(
		  'Fecha editada!',
		  'Exito al editar la fecha del prestamo a un cliente!',
		  'success'
		)
	</script>
<?php endif; ?>
<?php if(isset($_GET["id"]) AND $_GET['id'] == "success_finalizar"): ?>
	<script>
		Swal.fire(
		  'Prestamo finalizado!',
		  'Los productos fueron devueltos por el cliente!',
		  'success'
		)
	</script>
<?php endif; ?>
<?php if(isset($_GET["id"]) AND $_GET['id'] == "error_finalizar"): ?>
	<script>
		Swal.fire(
		  'Prestamo error!',
		  'Error inesperado al intentar finalizar el prestamo!',
		  'error'
		)
	</script>
<?php endif; ?>

<main class="container mt-3">
	<!-- el contenido de la pagina  -->
	<?php $lista = PrestamosModel::getPrestamo();?>
	<section class=" row justify-content-center">
		<div class="col-md-12">
			<h1 class="text-light">LISTA DE PRESTAMOS</h1>
			<table class="table">
				<tr class="text-light">
					<th>id</th>
					<th>Cliente</th>
					<th>ESTADO</th>
					<th>Fecha de creacion</th>
					<th>Fecha de devolucion</th>
					<th>Prestamo #1</th>
					<th>Prestamo #2</th>
					<th>Prestamo #3</th>
					<th>Accion</th>
				</tr>
				<?php 
					if (count($lista) == 0) {
						echo "
							<tr>
								<td colspan='3' class='text-center fw-bold py-3'> Ningún prestamo encontrado.</td>
							</tr>
						 ";
					}
				 ?>
			<?php foreach ($lista as $key => $value): ?>
				<tr class="text-light">
					<td><?= $value["id"] ?></td>
					<td><?= $value["name"] ?></td>
					<?php if ($value["estado"] == "asignado"): ?>
						<td class="fs-5 text-warning"><?= $value["estado"] ?></td>	
					<?php elseif ($value["estado"] == "finalizado"): ?>	
						<td class="fs-5 text-success"><?= $value["estado"] ?></td>	
					<?php endif ?>
					<td>
						<?= $value["fecha"] ?>
					</td>
					<td><?= $value["fechaDevolucion"] ?>
						<?php 
						if ($value["fechaDevolucion"] == date("Y-m-d")) {
							echo '<div class="border border-2 border-danger d-inline-block rounded-circle d-inline-flex align-items-center bg-light justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="DEVOLUCION HOY!" style="height:30px;width:30px;"><i class="fas fa-exclamation text-danger fa-lg "></i></div>';
						}
						?>

					</td>
					<?php 
						$prestamoLista = PrestamosModel::getPrestamoLista(array("id"=>$value["id"]));
						$contador = 0;
					?>

					<?php foreach ($prestamoLista as $key => $value_lista): ?>
						<td><?= $value_lista["name"]."(".$value_lista["cantidad"].")" ?></td>
						<?php $contador++ ?>
					<?php endforeach ?>

					<?php for ($i=$contador; $i < 3; $i++) { 
						echo "<td></td>";
					} ?>

					<td>
						<div class="dropdown">
						  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
						    menu
						  </a>

						  <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
						    <li><a class="dropdown-item link-primary fw-bold" href="/editarPrestamo/<?= $value["id"] ?>"> <i class="fas fa-edit"></i> Editar</a></li>
						    <li>
						    	<a class="dropdown-item link-danger fw-bold" data-bs-toggle="modal" data-bs-target="#modal-eliminar" 
						    	onclick="modalEliminar(<?= $value["id"] ?>,'<?= $value["id"] ?>')"> 
						    		<i class="fas fa-times"></i> Eliminar
						    	</a>
						    </li>
						    <?php if ($value["estado"] != "finalizado"): ?>
						    <li><a class="dropdown-item link-success fw-bold" data-bs-toggle="modal" data-bs-target="#modal-finalizar" 
						    	onclick="modalFinalizar(<?= $value["id"] ?>,'<?= $value["name"] ?>')"> 
						    		<i class="fas fa-check"></i> Finalizar prestamo
						    	</a></li>
						    <?php endif ?>
						  </ul>
						</div>
						</td>
				</tr>
			<?php endforeach ?>
			</table>
		</div>
	</section>
</main>

<!--/// MODAL FINALIZAR ///-->
<script>
	function modalFinalizar(id,cliente){
		document.querySelector("#modal-finalizar #input-id").value = id;
		document.querySelector("#modal-finalizar .modal-body .text-1 b").innerHTML = id;
		document.querySelector("#modal-finalizar .modal-body .text-2 b").innerHTML = cliente;
	}
</script>
<div class="modal" id="modal-finalizar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success">FINALIZAR PRESTAMO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-1">Estas a punto de finalizar el siguiente prestamo: #<b style="text-transform: capitalize;"></b>.</p>
        <p class="text-2">Para el cliente: <b style="text-transform: capitalize;"></b>.</p>
        <p class="text-center border border-1 border-secondary"><b>nota</b>: finalizar prestamo <u>no elimina</u> el registro, solamente lo marca como finalizado, si quiere eliminar totalmente utilize la funcionar <span class="text-danger fw-bold">Eliminar Prestamo</span>.</p>
        <form method="post" id="form-finalizar">
        	<input type="hidden" name="id" value="" id="input-id">
        </form>
        <?php 
        if (isset($_POST["finalizar"])) {
        	$a = PrestamosModel::finalizarPrestamo(array("id"=>$_POST["id"]));
        	if ($a) {
        		header("location:/index/success_finalizar");
        	}
        	else{
        		header("location:/index/error_finalizar");
        	}
        }
         ?>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="finalizar" form="form-finalizar">Finalizar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!--/// MODAL ELIMINAR ///-->
<script>
	function modalEliminar(id,nombre){
		document.querySelector("#modal-eliminar #input-id").value = id;
		document.querySelector("#modal-eliminar .modal-body p b").innerHTML = "#"+nombre;
	}
</script>
<div class="modal" id="modal-eliminar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger">ELIMINAR PRESTAMO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Estas a punto de eliminar el prestamo <b style="text-transform: capitalize;"></b>.</p>
        <form method="post" id="form-eliminar">
        	<input type="hidden" name="id" value="" id="input-id">
        </form>
        <?php 
        if (isset($_POST["eliminar"])) {
        	$a = PrestamosModel::eliminarPrestamo(array("id"=>$_POST["id"]));
        	if ($a) {
        		header("location:/index/success_eliminar");
        	}
        	else{
        		header("location:/index/error_eliminar");
        	}
        }
         ?>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" name="eliminar" form="form-eliminar">Eliminar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>