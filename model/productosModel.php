<?php 
require_once("conexion/conexion.php");
class ProductosModel
{
	public static function crearProducto ($array)
	{
		$sql = Conexion::conectar()->prepare("INSERT INTO productos (name, stock, idCategoria) VALUES(:name,:stock,:idCategoria)");
	
		$sql->bindParam(":name",$array["name"],PDO::PARAM_STR);
		$sql->bindParam(":idCategoria",$array["idCategoria"],PDO::PARAM_STR);
		$sql->bindParam(":stock",$array["stock"],PDO::PARAM_STR);

		if( $sql->execute() ){
			return true;
		}
		else{
			return false;
		}
	}
	public static function editarProducto($array)
	{
		$sql = Conexion::conectar()->prepare("UPDATE productos SET name = :name, idCategoria = :idCategoria, stock = :stock WHERE id = :id");
		$sql->bindParam(":id",$array["id"],PDO::PARAM_INT);
		$sql->bindParam(":name",$array["name"],PDO::PARAM_STR);
		$sql->bindParam(":idCategoria",$array["idCategoria"],PDO::PARAM_INT);
		$sql->bindParam(":stock",$array["stock"],PDO::PARAM_INT);

		if($sql->execute()){
			return true;
		}
		else{
			return false;
		}
	}
	public static function getProductById($array){
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
	public static function listaProducto(){
		$sql = Conexion::conectar()->prepare("SELECT prod.id,prod.name,prod.stock,cat.categoria FROM productos as prod INNER JOIN categorias as cat ON prod.idCategoria = cat.id GROUP BY prod.id ORDER BY prod.id DESC");
		if( $sql->execute()){
			$respuesta = $sql->fetchAll();
		}
		else{
			$respuesta = 0;
		}
		return $respuesta;
	}
	public static function eliminarProducto($array){
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