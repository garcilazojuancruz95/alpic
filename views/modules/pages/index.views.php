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
								<td colspan='3' class='text-center fw-bold py-3'> Ninguna categoria encontrada.</td>
							</tr>
						 ";
					}
				 ?>
			<?php foreach ($lista as $key => $value): ?>
				<tr class="text-light">
					<td><?= $value["id"] ?></td>
					<td><?= $value["name"] ?></td>
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

					<?php foreach ($prestamoLista as $key => $value): ?>
						<td><?= $value["name"]."(".$value["cantidad"].")" ?></td>
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
						    <li><a class="dropdown-item link-primary fw-bold" href="/editarCategoria/<?= $value["id"] ?>"> <i class="fas fa-edit"></i> Editar</a></li>
						    <li>
						    	<a class="dropdown-item link-danger fw-bold" data-bs-toggle="modal" data-bs-target="#modal-eliminar" 
						    	onclick="modalEliminar(<?= $value["id"] ?>,'<?= $value["categoria"] ?>')"> 
						    		<i class="fas fa-times"></i> Eliminar
						    	</a>
						    </li>
						    <li><a class="dropdown-item" href="#"></a></li>
						  </ul>
						</div>
						</td>
				</tr>
			<?php endforeach ?>
			</table>
		</div>
	</section>
</main>