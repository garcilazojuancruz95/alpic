<?php 
require_once("conexion/conexion.php");
class EnviosModel
{

	public static function setEnvio($array)
	{
		$conexion = Conexion::conectar();
		$sql = $conexion->prepare("INSERT INTO envios 
			(precio,email,nombre_completo,domicilio,telefono,email2,nombre_completo2,domicilio2,telefono2,tamano_caja,origen_provincia,origen_localidad,destino_provincia,destino_localidad,franja_inicio,franja_fin) 
			VALUES(:precio,:email,:nombre_completo,:domicilio,:telefono,:email2,:nombre_completo2,:domicilio2,:telefono2,:tamano_caja,:origen_provincia,:origen_localidad,:destino_provincia,:destino_localidad,:franja_inicio,:franja_fin)");
		$sql->bindParam(":precio",$array["precio"],PDO::PARAM_INT);
		$sql->bindParam(":email",$array["email"],PDO::PARAM_STR);
		$sql->bindParam(":nombre_completo",$array["nombre_completo"],PDO::PARAM_STR);
		$sql->bindParam(":domicilio",$array["domicilio"],PDO::PARAM_STR);
		$sql->bindParam(":telefono",$array["telefono"],PDO::PARAM_INT);
		$sql->bindParam(":email2",$array["email2"],PDO::PARAM_STR);
		$sql->bindParam(":nombre_completo2",$array["nombre_completo2"],PDO::PARAM_STR);
		$sql->bindParam(":domicilio2",$array["domicilio2"],PDO::PARAM_STR);
		$sql->bindParam(":telefono2",$array["telefono2"],PDO::PARAM_INT);
		$sql->bindParam(":tamano_caja",$array["tamano_caja"],PDO::PARAM_STR);
		$sql->bindParam(":origen_provincia",$array["origen_provincia"],PDO::PARAM_INT);
		$sql->bindParam(":origen_localidad",$array["origen_localidad"],PDO::PARAM_INT);
		$sql->bindParam(":destino_provincia",$array["destino_provincia"],PDO::PARAM_INT);
		$sql->bindParam(":destino_localidad",$array["destino_localidad"],PDO::PARAM_INT);
		$sql->bindParam(":franja_inicio",$array["franja_inicio"],PDO::PARAM_INT);
		$sql->bindParam(":franja_fin",$array["franja_fin"],PDO::PARAM_INT);

		if ($sql->execute()) {
			$respuesta = $conexion->lastInsertId();
		}
		else{
			$respuesta = false;
		}
		return $respuesta;
	}
	public static function setPago($array)
	{
		$conexion = Conexion::conectar();
		$sql = $conexion->prepare("INSERT INTO pagos 
			(idEnvio,titular,pagado,codigo) 
			VALUES(:idEnvio,:titular,:pagado,:codigo)");
		$sql->bindParam(":idEnvio",$array["idEnvio"],PDO::PARAM_INT);
		$sql->bindParam(":titular",$array["titular"],PDO::PARAM_STR);
		$sql->bindParam(":pagado",$array["pagado"],PDO::PARAM_INT);
		$sql->bindParam(":codigo",$array["codigo"],PDO::PARAM_INT);

		if ($sql->execute()) {
			$respuesta = $conexion->lastInsertId();
		}
		else{
			$respuesta = false;
		}
		return $respuesta;
	}
	public static function getEnvioById($array)
	{
		$sql = Conexion::conectar()->prepare("SELECT * FROM envios WHERE id = :id");
		$sql->bindParam(":id",$array["id"],PDO::PARAM_INT);
		if ($sql->execute()) {
			$respuesta = $sql->fetch();
		}
		else{
			$respuesta = false;
		}
		return $respuesta;
	}
	//Esta consulta trae una fila comparando el codigo enviado en $array con la columna codigo en Pagos.
	public static function getEnvioByCode($array)
	{
		$sql = Conexion::conectar()->prepare("SELECT COUNT(id) FROM pagos WHERE codigo = :codigo");
		$sql->bindParam(":codigo",$array["codigo"],PDO::PARAM_INT);
		if ($sql->execute()) {
			$respuesta = $sql->fetch();
		}
		else{
			$respuesta = false;
		}
		return $respuesta;
	}
}
 ?>