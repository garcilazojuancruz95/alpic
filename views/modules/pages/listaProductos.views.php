<?php if(isset($_GET["id"]) AND $_GET['id'] == "exito_crear"): ?>
	<script>
		Swal.fire(
		  'Carga realizada!',
		  'Producto agregado!',
		  'success'
		)
	</script>
<?php endif; ?>
<?php if(isset($_GET["id"]) AND $_GET['id'] == "exito_editar"): ?>
	<script>
		Swal.fire(
		  'Cambios realizados!',
		  'Producto editado!',
		  'success'
		)
	</script>
<?php endif; ?>
<?php if(isset($_GET["id"]) AND $_GET['id'] == "success_eliminar"): ?>
	<script>
		Swal.fire(
		  'Eliminado exitosamente!',
		  'Producto Eliminado!',
		  'success'
		)
	</script>
<?php endif; ?>
<main class="container mt-3 text-light">
	<h1 class="text-light">LISTA DE PRODUCTOS</h1>
	<!-- el contenido de la pagina  -->
	<?php $listaProductos = ProductosModel::listaProducto();?>
	<table class="table">
		<tr class="text-light">
			<th>ID</th>
			<th>Producto</th>
			<th>Stock</th>
			<th>Categoría</th>
			<th>Acciones</th>
		</tr>
		<?php
					if (count($listaProductos) == 0) {
						echo "
							<tr>
								<td colspan='5' class='text-center fw-bold py-3'> Ningun producto encontrado.</td>
							</tr>
						 ";
					}
				 ?>
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
					else{
						$arrayProducto[$key] = ($value == 0) ? "sin stock" : $value;
					}
				}
			 ?>
	<?php foreach ($listaProductos as $key => $value): ?>
		<tr class="text-light">
			<td><?= $value["id"] ?></td>
			<td><?= $value["name"] ?></td>
			<td><?= $arrayProducto[$value["id"]] ?></td>
			<td><?= $value["categoria"] ?></td>
			<td>
				<div class="dropdown">
				  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
				    menu
				  </a>

				  <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
				    <li><a class="dropdown-item link-primary fw-bold" href="/editarProducto/<?= $value["id"] ?>"> <i class="fas fa-edit"></i> Editar</a></li>
				    <li>
				    	<a class="dropdown-item link-danger fw-bold" data-bs-toggle="modal" data-bs-target="#modal-eliminar" 
				    	onclick="modalEliminar(<?= $value["id"] ?>,'<?= $value["name"] ?>')"> 
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
</main>
<script>
	function modalEliminar(id,nombre){
		document.querySelector("#modal-eliminar #input-id").value = id;
		document.querySelector("#modal-eliminar .modal-body p b").innerHTML = nombre;
	}
</script>

<div class="modal" id="modal-eliminar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger">ELIMINAR PRODUCTO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Estas a punto de eliminar <b style="text-transform: capitalize;"></b>.</p>
        <form method="post" id="form-eliminar">
        	<input type="hidden" name="id" value="" id="input-id">
        </form>
        <?php 
        if (isset($_POST["enviar"])) {
        	$a = ProductosModel::eliminarProducto(array("id"=>$_POST["id"]));
        	if ($a) {
        		header("location:/listaProductos/success_eliminar");
        	}
        	else{
        		header("location:/listaProductos/error_eliminar");
        	}
        }
         ?>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" name="enviar" form="form-eliminar">Eliminar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>