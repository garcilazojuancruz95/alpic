<?php
    class CategoriaModel
    {
        public static function crearCategoria ($array) {

            $sql = Conexion::conectar()->prepare("INSERT INTO categoria (categoria) VALUES(:categoria)");
            $sql->bindParam(":categoria",$array["nameCategoria"],PDO::PARAM_STR);

            if($sql->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
    
?>