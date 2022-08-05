<?php 
	class PrestamosModel
	{
		public static function setPrestamo($array){
			$conexion = Conexion::conectar();
			$sql = $conexion->prepare("INSERT INTO prestamos (idCliente,fechaDevolucion) VALUES(:idCliente,:fechaDevolucion)");
			$sql->bindParam(":idCliente",$array["idCliente"],PDO::PARAM_INT);
			$sql->bindParam(":fechaDevolucion",$array["fechaDevolucion"],PDO::PARAM_STR);

			if( $sql->execute() ){
				return $conexion->lastInsertId();
			}
			else{
				return false;
			}
		}
		public static function editarFechaPrestamo($array)
        {
            $sql = Conexion::conectar()->prepare("UPDATE prestamos SET fechaDevolucion = :fechaDevolucion WHERE id = :id");
            $sql->bindParam(":id",$array["id"],PDO::PARAM_INT);
            $sql->bindParam(":fechaDevolucion",$array["fechaDevolucion"],PDO::PARAM_STR);
            if($sql->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        public static function finalizarPrestamo($array)
        {
            $sql = Conexion::conectar()->prepare("UPDATE prestamos SET estado = 'finalizado' WHERE id = :id");
            $sql->bindParam(":id",$array["id"],PDO::PARAM_INT);
            if($sql->execute()){
                return true;
            }
            else{
                return false;
            }
        }
		public static function setPrestamoLista($array){
			$sql = Conexion::conectar()->prepare("INSERT INTO prestamo_lista (prestamo,cantidad,idPrestamo) VALUES(:prestamo,:cantidad,:idPrestamo)");
			$sql->bindParam(":prestamo",$array["prestamo"],PDO::PARAM_INT);
			$sql->bindParam(":cantidad",$array["cantidad"],PDO::PARAM_INT);
			$sql->bindParam(":idPrestamo",$array["idPrestamo"],PDO::PARAM_INT);

			if( $sql->execute() ){
				return true;
			}
			else{
				return false;
			}
		}
		public static function getPrestamo(){
            $sql = Conexion::conectar()->prepare("SELECT p.id,p.fecha,p.fechaDevolucion,c.name,p.estado FROM prestamos as p INNER JOIN clientes as c ON p.idCliente = c.id ORDER BY p.fechaDevolucion ASC");
            if( $sql->execute()){
                $respuesta = $sql->fetchAll();
            }
            else{
                $respuesta = 0;
            }
            return $respuesta;
        }
        public static function getPrestamoById($array){
		$sql = Conexion::conectar()->prepare("SELECT p.id,p.fecha,p.fechaDevolucion,c.name FROM prestamos as p INNER JOIN clientes as c ON p.idCliente = c.id WHERE p.id = :id");
		$sql->bindParam(":id",$array["id"],PDO::PARAM_INT);

		if( $sql->execute()){
			$respuesta = $sql->fetch();
		}
		else{
			$respuesta = 0;
		}
		return $respuesta;
	}
        public static function getPrestamoLista($array){
            $sql = Conexion::conectar()->prepare("SELECT * FROM prestamo_lista INNER JOIN productos ON prestamo_lista.prestamo = productos.id WHERE idPrestamo = :idPrestamo");
			$sql->bindParam(":idPrestamo",$array["id"],PDO::PARAM_INT);

            if( $sql->execute()){
                $respuesta = $sql->fetchAll();
            }
            else{
                $respuesta = 0;
            }
            return $respuesta;
        }
	}
 ?>