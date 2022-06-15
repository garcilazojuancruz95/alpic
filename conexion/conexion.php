<?php 

	class Conexion
	{
		public static function conectar()
		{
			$dbname = "zulhow";
			$userdb = "root";
			$passdb = "";
			$ip = "localhost";

			$link = new PDO ("mysql:host=".$ip.";dbname=".$dbname."",$userdb,$passdb,array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
			$link->exec("SET CHARACTER SET utf8");
			return $link;
		}
	}
?>
