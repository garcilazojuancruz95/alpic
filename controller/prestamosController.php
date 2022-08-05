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
		public function editarFechaPrestamo(){
			$id = $_POST["id"];
			$fechaDevolucion = $_POST["fechaDevolucion"];
			$array = ["id"=> $id, "fechaDevolucion" => $fechaDevolucion];
			$respuesta = PrestamosModel::editarFechaPrestamo($array);
			if ($respuesta) {
				header("location:/index/success_fecha_editar");
			}
			else{
				header("location:/editarPrestamo/".$id."/error");
			}
		}
	}
 ?>