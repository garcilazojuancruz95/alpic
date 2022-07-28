<?php
    class CategoriaModel
    {
        public static function crearCategoria ($array) {

            $sql = Conexion::conectar()->prepare("INSERT INTO categorias (categoria) VALUES(:categoria)");
            $sql->bindParam(":categoria",$array["nameCategoria"],PDO::PARAM_STR);

            if($sql->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        public static function listaCategoria(){
        $sql = Conexion::conectar()->prepare("SELECT * FROM categorias ORDER BY id DESC");
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