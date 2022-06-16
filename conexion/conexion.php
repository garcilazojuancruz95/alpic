<?php 
/*Una clase que trae la conexion a la base de dato para que lo maneje el modelo y le envie consultas a MYSQL.*/
/*Al momento que llamamos a conectar() traemos la conexion.*/
class Conexion
{
	public static function conectar()
	{
		/*LOCALHOST*/
		$dbname = "alpic";
		$userdb = "root";
		$passdb = "";
		$ip = "localhost";

		$link = new PDO ("mysql:host=".$ip.";dbname=".$dbname."",$userdb,$passdb,array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
		$link->exec("SET CHARACTER SET utf8");
		return $link;

	}
}

 ?>