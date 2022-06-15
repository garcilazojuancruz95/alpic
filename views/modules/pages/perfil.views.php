<section class="container" id="perfil">
	<div class="row justify-content-center">
		<h3 class=" text-center">PERFIL</h3>
		<div class="col-md-6 recuadro">
			<label for="imagen" id="label_imagen"><div><span>Subir imagen</span><i class="fas fa-camera fa-3x"></i></div>
				<?php if ($_SESSION['imagen'] != NULL ): ?>
				<img src="data:image/jpeg;base64,<?= $_SESSION['imagen'] ?>" alt="">
				<?php else: ?>
				<img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="">
				<?php endif ?>

			</label>
			<input type="file" name="imagen" id="imagen" form="form_imagen" onchange="document.getElementById('form_imagen').submit();" style="display: none;">
			<p class="texto">
				Nombre completo: <?= $_SESSION['nombre_completo'] ?>
				<br>
				<br>
				Email: <?= $_SESSION['email'] ?>
				<br>
				<br>
				Telefono: <?= $_SESSION['telefono'] ?>
			</p>
		</div>
		<div class="col-md-12 mb-2">
			<a href="/editar_perfil" class="btn w-50 btn-editar"> Editar Perfil</a>
		</div>
		<div class="col-md-12 mb-2">
			<a href="/eliminar_cuenta" class="btn w-50 btn-eliminar"> Eliminar Cuenta</a>
		</div>
	</div>
</section>
<form method="post" id="form_imagen" enctype="multipart/form-data">
	<?php 
		if (isset($_FILES['imagen']["name"])) {
			$a = new UsuarioController;
			$a->cambiarImagen();
		}
	 ?>
</form>