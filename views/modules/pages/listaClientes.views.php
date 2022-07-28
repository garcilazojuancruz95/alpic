<?php if(isset($_GET["id"]) AND $_GET['id'] == "exito_crear"): ?>
	<script>
		Swal.fire(
		  'Creacion realizadas!',
		  'Cliente agregado!',
		  'success'
		)
	</script>
<?php endif; ?>
<?php if(isset($_GET["id"]) AND $_GET['id'] == "exito_editar"): ?>
	<script>
		Swal.fire(
		  'Cambios realizados!',
		  'Cliente editado!',
		  'success'
		)
	</script>
<?php endif; ?>
<?php if(isset($_GET["id"]) AND $_GET['id'] == "success_eliminar"): ?>
	<script>
		Swal.fire(
		  'Eliminado exitosamente!',
		  'Cliente Eliminado!',
		  'success'
		)
	</script>
<?php endif; ?>
<main class="container mt-3">
	<h1 class="text-light">LISTA DE Clientes</h1>
	<!-- el contenido de la pagina  -->
	<?php $listaClientes = ClientesModel::listaCliente();?>
	<table class="table">
		<tr class="text-light">
			<th>Id</th>
			<th>Correo</th>
			<th>Nombre</th>
			<th>Direccion</th>
			<th>Dni</th>
			<th>Telefono</th>
			<th>Acciones</th>
		</tr>
	<?php foreach ($listaClientes as $key => $value): ?>
		<tr class="text-light">
			<td><?= $value["id"] ?></td>
			<td><?= $value["email"] ?></td>
			<td><?= $value["name"] ?></td>
			<td><?= $value["address"] ?></td>
			<td><?= $value["dni"] ?></td>
			<td><?= $value["phone"] ?></td>
			<td>
				<div class="dropdown">
				  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
				    menu
				  </a>

				  <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
				    <li><a class="dropdown-item link-primary fw-bold" href="/editarCliente/<?= $value["id"] ?>"> <i class="fas fa-edit"></i> Editar</a></li>
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
        <h5 class="modal-title text-danger">ELIMINAR CLIENTE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Estas a punto de eliminar a <b style="text-transform: capitalize;"></b>.</p>
        <form method="post" id="form-eliminar">
        	<input type="hidden" name="id" value="" id="input-id">
        </form>
        <?php 
        if (isset($_POST["enviar"])) {
        	$a = ClientesModel::eliminarCliente(array("id"=>$_POST["id"]));
        	if ($a) {
        		header("location:/listaClientes/success_eliminar");
        	}
        	else{
        		header("location:/listaClientes/error_eliminar");
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



<!-- tipica sintaxis de echo -->
<?php echo "" ?>
<!-- Version corta de echo, los resultados de ambos son iguales -->
<?= "" ?>


<!-- Tipico inicio y cierre de foreach -->
<?php 
	foreach ($listaClientes as $key => $value) {
		echo "<span></span>";
	}
 ?>
 <!-- Misma foreach pero mas facil de escribir HTML en el medio -->
 <?php foreach ($listaClientes as $key => $value): ?>
		<span></span>
	<?php endforeach; ?>