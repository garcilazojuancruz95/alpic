<?php 

	class Route
	{
		private $pages = ["home","servicios","flota","deposito","contacto","registro","login","perfil","envios","geolocalizacion","ayudas", "cerrar_sesion", "envios_paso2","editar_perfil","eliminar_cuenta"];
		public function getPage()
		{
			if (isset($_GET["action"])) {
				if (in_array($_GET["action"], $this->pages)) {
					$ruta = "views/modules/pages/".$_GET['action'].".views.php";
				}
				else{
					$ruta = "views/modules/error/404.views.php";
				}
			}
			else{
				$ruta = "views/modules/pages/home.views.php";
			}
			return $ruta;
		}
	}

 ?>

