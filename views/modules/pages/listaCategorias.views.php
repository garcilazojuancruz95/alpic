<?php if(isset($_GET["id"]) AND $_GET['id'] == "exito_crear"): ?>
	<script>
		Swal.fire(
		  'Carga realizada!',
		  'Categoria agregada!',
		  'success'
		)
	</script>
<?php endif; ?>
<?php if(isset($_GET["id"]) AND $_GET['id'] == "exito_editar"): ?>
	<script>
		Swal.fire(
		  'Cambios realizados!',
		  'Categoria editada!',
		  'success'
		)
	</script>
<?php endif; ?>
<?php if(isset($_GET["id"]) AND $_GET['id'] == "success_eliminar"): ?>
	<script>
		Swal.fire(
		  'Eliminado exitosamente!',
		  'Categoria Eliminada!',
		  'success'
		)
	</script>
<?php endif; ?>
<main class="container mt-3">
	<!-- el contenido de la pagina  -->
	<?php $listaCategoria = CategoriaModel::listaCategoria();?>
	<section class=" row justify-content-center">
		<div class="col-md-8">
			<h1 class="text-light">LISTA DE CATEGORIAS</h1>
			<table class="table">
				<tr class="text-light">
					<th>id</th>
					<th>Nombre</th>
					<th>Acciones</th>
				</tr>
				<?php 
					if (count($listaCategoria) == 0) {
						echo "
							<tr>
								<td colspan='3' class='text-center fw-bold py-3'> Ninguna categoria encontrada.</td>
							</tr>
						 ";
					}
				 ?>
			<?php foreach ($listaCategoria as $key => $value): ?>
				<tr class="text-light">
					<td><?= $value["id"] ?></td>
					<td><?= $value["categoria"] ?></td>
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
        <h5 class="modal-title text-danger">ELIMINAR CATEGORIA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Estas a punto de eliminar <b style="text-transform: capitalize;"></b>.</p>
        <form method="post" id="form-eliminar">
        	<input type="hidden" name="id" value="" id="input-id">
        </form>
        <?php 
        if (isset($_POST["enviar"])) {
        	$a = CategoriaModel::eliminarCategoria(array("id"=>$_POST["id"]));
        	if ($a) {
        		header("location:/listaCategorias/success_eliminar");
        	}
        	else{
        		header("location:/listaCategorias/error_eliminar");
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