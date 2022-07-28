<?php 
require_once("conexion/conexion.php");
class ProductosModel
{
	public static function crearProducto ($array)
	{
		$sql = Conexion::conectar()->prepare("INSERT INTO productos (producto, stock, idCategoria) VALUES(:producto, :stock, :idCategoria)");
	
		$sql->bindParam(":producto",$array["nameProd"],PDO::PARAM_STR);
		$sql->bindParam(":stock",$array["stock"],PDO::PARAM_INT);
		$sql->bindParam(":idCategoria",$array["idCategoria"],PDO::PARAM_INT);

		if( $sql->execute() ){
			return true;
		}
		else{
			return false;
		}
	}
	public static function editarProductos($array)
	{
		$sql = Conexion::conectar()->prepare("UPDATE productos SET nameProd = :nameProd, tipo = :tipo");
		$sql->bindParam(":nameProd",$array["nameProd"],PDO::PARAM_STR);
		$sql->bindParam(":tipo",$array["tipo"],PDO::PARAM_STR);

		if($sql->execute()){
			return true;
		}
		else{
			return false;
		}
	}
	public static function getProductoById($array){
		$sql = Conexion::conectar()->prepare("SELECT * FROM productos WHERE id = :id ORDER BY id DESC");
		$sql->bindParam(":id",$array["id"],PDO::PARAM_INT);

		if( $sql->execute()){
			$respuesta = $sql->fetch();
		}
		else{
			$respuesta = 0;
		}
		return $respuesta;
	}
	public static function listaProductos(){
		$sql = Conexion::conectar()->prepare("SELECT * FROM productos ORDER BY id DESC");
		if( $sql->execute()){
			$respuesta = $sql->fetchAll();
		}
		else{
			$respuesta = 0;
		}
		return $respuesta;
	}
	public static function eliminarProductos($array){
		$sql = Conexion::conectar()->prepare("DELETE FROM productos WHERE id = :id");
		$sql->bindParam(":id",$array["id"],PDO::PARAM_INT);

		if( $sql->execute()){
			$respuesta = true;
		}
		else{
			$respuesta = false;
		}
		return $respuesta;
	}
}
?>