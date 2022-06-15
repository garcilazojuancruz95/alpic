<?php 
	$envioActual = EnviosModel::getEnvioById(array("id"=> $_GET["id"]));
 ?>
<section id="envios_paso2" class="container">
	<div class="row info_envio">
		<h3>Informacion del envio</h3>
		<hr class="col-md-8">
		<div class="col-md-6 row text-secondary">
			<h5 class="text-secondary">Origen</h5>
			<div class="form-group col-md-6">
				<label for="">Nombre completo</label>
				<p class="fw-bold"><?= $envioActual["nombre_completo"] ?></p>
			</div>
			<div class="form-group col-md-6">
				<label for="">Domicilio</label>
				<p class="fw-bold"><?= $envioActual["domicilio"] ?></p>
			</div>
		</div>
		<div class="col-md-6 row text-secondary">
			<h5 class="text-secondary">Destino</h5>
			<div class="form-group col-md-6">
				<label for="">Nombre completo</label>
				<p class="fw-bold"><?= $envioActual["nombre_completo2"] ?></p>
			</div>
			<div class="form-group col-md-6">
				<label for="">Domicilio</label>
				<p class="fw-bold"><?= $envioActual["domicilio2"] ?></p>
			</div>
		</div>
	</div>
	<form method="post" class="row mt-4 justify-content-center">
		<h2 class="text-secondary col-md-10">Datos del pago</h2>
		<div class="form-group col-md-10">
			<label for="">Nombre titular</label>
			<input type="text" name="titular" class="form-control">
		</div>
		<div class="form-group col-md-4">
			<label for="">Numero de titular</label>
			<input type="text" name="tarjeta" class="form-control">
		</div>
		<div class="form-group col-md-3">
			<label for="">Expiracion</label>
			<input type="text" name="expiracion" class="form-control">
		</div>
		<div class="form-group col-md-3">
			<label for="">CVV</label>
			<input type="text" name="cvv" class="form-control">
		</div>
		<button type="submit" class="btn col-md-10" name="submit"  id="btn-env-contacto">Confirmar</button>
		<input type="hidden" name="idEnvio" value="<?= $_GET["id"] ?>">
	</form>
	<?php 
	if (isset($_POST["submit"])) {
		$a = new EnviosController;
		$a->setPago();
	}
	 ?>
</section>