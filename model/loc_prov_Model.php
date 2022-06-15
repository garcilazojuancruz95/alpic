<?php 
	require_once("conexion/conexion.php");
	class Loc_prov_Model
	{
		public static function getLocalidad(){
			$sql = Conexion::conectar()->prepare("SELECT * FROM localidades");
			if ($sql->execute() == true) {
				$respuesta = $sql->fetchAll();
			}else{
				$respuesta = false;
			}
			return $respuesta;
		}
		public static function getProvincia(){
			$sql = Conexion::conectar()->prepare("SELECT * FROM provincias");
			if ($sql->execute() == true) {
				$respuesta = $sql->fetchAll();
			}else{
				$respuesta = false;
			}
			return $respuesta;
		}
	}
?>