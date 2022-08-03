<?php 
	class PrestamosController
	{
		public function setPrestamo($tipo){
			$idCliente = $_POST["idCliente"];
			$fechaDevolucion = $_POST["fechaDevolucion"];

			$array = ["idCliente"=>$idCliente,"fechaDevolucion"=>$fechaDevolucion];
			$id = PrestamosModel::setPrestamo($array);
			foreach ($_POST["prestamo"] as $key => $value) {
				if ($value > 0) {
					$arrayLista = ["prestamo"=>$value,"cantidad"=>$_POST["cantidad"][$key],"idPrestamo"=>$id];
					 PrestamosModel::setPrestamoLista($arrayLista);
				}
			}
		}
	}
 ?>