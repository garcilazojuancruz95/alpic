<?php 
	$localidades = Loc_prov_Model::getLocalidad();
	$provincias = Loc_prov_Model::getProvincia();
?>
<section id="envios" class="container">
	<form method="post" class="row">
		<h3 class="text-secondary">Origen</h3>
		<div class="form-group col-md-6">
			<label for="">Nombre completo</label>
			<input type="text" name="nombre_completo" class="form-control">
		</div>
		<div class="form-group col-md-6">
			<label for="">Correo electronico</label>
			<input type="email" name="email" class="form-control" value="<?= $_SESSION['email'] ?>">
		</div>
		<div class="form-group col-md-6">
			<label for="">Telefono</label>
			<input type="number" name="telefono" class="form-control" value="<?= $_SESSION['telefono'] ?>">
		</div>
		<div class="form-group col-md-6">
			<label for="">Domicilio</label>
			<input type="text" name="domicilio" class="form-control" value="<?= $_SESSION['domicilio'] ?>">
		</div>
		<div class="form-group col-md-6">
			<label for="">Provincia</label>
			<select name="origen_provincia" class="form-control">
				<option value="-1">Elija el origen</option>
				<?php foreach ($provincias as $key => $value): ?>
					<option value="<?= $value["id"] ?>"><?= $value["provincia"] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group col-md-6">
			<label for="">Localidad</label>
			<select name="origen_localidad" class="form-control">
				<option value="-1">Elija el origen</option>
				<?php foreach ($localidades as $key => $value): ?>
					<option value="<?= $value["id"] ?>"><?= $value["localidad"] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<h3 class="text-secondary">Destino</h3>
		<div class="form-group col-md-6">
			<label for="">Nombre completo</label>
			<input type="text" name="nombre_completo2" class="form-control">
		</div>
		<div class="form-group col-md-6">
			<label for="">Correo electronico</label>
			<input type="email" name="email2" class="form-control" value="<?= $_SESSION['email'] ?>">
		</div>
		<div class="form-group col-md-6">
			<label for="">Telefono</label>
			<input type="number" name="telefono2" class="form-control" value="<?= $_SESSION['telefono'] ?>">
		</div>
		<div class="form-group col-md-6">
			<label for="">Domicilio</label>
			<input type="text" name="domicilio2" class="form-control" value="<?= $_SESSION['domicilio'] ?>">
		</div>
		<div class="form-group col-md-6">
			<label for="">Provincia</label>
			<select name="destino_provincia" class="form-control" onchange="ajaxProvincias(this)">
				<option value="-1">Elija el destino</option>
				<?php foreach ($provincias as $key => $value): ?>
					<option value="<?= $value["id"] ?>"><?= $value["provincia"] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group col-md-6">
			<label for="">Localidad</label>
			<select name="destino_localidad" class="form-control">
				<option value="-1">Elija el destino</option>
				<?php foreach ($localidades as $key => $value): ?>
					<option value="<?= $value["id"] ?>"><?= $value["localidad"] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<hr>
		<h3 class="text-secondary">Datos del paquete</h3>
		<div class="form-group col-md-4 text-center">
			<label for="">Franja Horaria del Remitente  (8-00)</label>
			<div class="row">
				<div class=" col-md-6">
					<select name="franja_inicio" class="form-control" id="">
						<option value="-1"></option>
						<option value="8">08:00</option>
						<option value="9">09:00</option>
						<option value="10">10:00</option>
						<option value="">11:00</option>
						<option value="">12:00</option>
						<option value="">13:00</option>
						<option value="">14:00</option>
						<option value="">15:00</option>
						<option value="">16:00</option>
						<option value="">17:00</option>
						<option value="">18:00</option>
						<option value="">19:00</option>
						<option value="">20:00</option>
						<option value="">21:00</option>
						<option value="">22:00</option>
						<option value="">23:00</option>
						<option value="">00:00</option>
					</select>
				</div>
				<div class=" col-md-6">
					<select name="franja_fin" class="form-control" id="">
						<option value="-1"></option>
						<option value="8">08:00</option>
						<option value="9">09:00</option>
						<option value="10">10:00</option>
						<option value="">11:00</option>
						<option value="">12:00</option>
						<option value="">13:00</option>
						<option value="">14:00</option>
						<option value="">15:00</option>
						<option value="">16:00</option>
						<option value="">17:00</option>
						<option value="">18:00</option>
						<option value="">19:00</option>
						<option value="">20:00</option>
						<option value="">21:00</option>
						<option value="">22:00</option>
						<option value="">23:00</option>
						<option value="">00:00</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group col-md-3">
			<label for="">Tamaño de la caja</label>
			<select name="tamano_caja" class="form-control" onchange="precio_caja(this)">
				<option value="-1">Elija el tamaño</option>
				<option value="grande">Grande (3000kg - 10000kg)</option>
				<option value="media">Mediano (200kg - 2999kg)</option>
				<option value="chico">Chico (20kg - 199kg)</option>
			</select>
		</div>

		<div class="form-group col-md-3" id="envios-precio">
			<label for="">Precio</label>
			<span class="text-danger"> </span>
			<input type="hidden" name="precio" value="-1">
		</div>
		<button type="submit" class="btn mb-3" name="envio" id="btn-env-contacto">Siguiente</button>
	</form>
</section>
<?php 
	if (isset($_POST["envio"])) {
		$a = new EnviosController;
		$a->setEnvio();
	}
 ?>