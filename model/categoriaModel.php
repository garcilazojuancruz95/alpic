<?php
    class CategoriaModel
    {
        public static function crearCategoria ($array) {

            $sql = Conexion::conectar()->prepare("INSERT INTO categorias (categoria) VALUES(:categoria)");
            $sql->bindParam(":categoria",$array["categoria"],PDO::PARAM_STR);

            if($sql->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        public static function editarCategoria($array)
        {
            $sql = Conexion::conectar()->prepare("UPDATE categorias SET categoria = :categoria WHERE id = :id");
            $sql->bindParam(":id",$array["id"],PDO::PARAM_INT);
            $sql->bindParam(":categoria",$array["categoria"],PDO::PARAM_STR);
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
        public static function eliminarCategoria($array){
            $sql = Conexion::conectar()->prepare("DELETE FROM categorias WHERE id = :id");
            $sql->bindParam(":id",$array["id"],PDO::PARAM_INT);

            if( $sql->execute()){
                $respuesta = true;
            }
            else{
                $respuesta = false;
            }
            return $respuesta;
        }
        public static function getCategoriaById($array){
            $sql = Conexion::conectar()->prepare("SELECT * FROM categorias WHERE id = :id ORDER BY id DESC");
            $sql->bindParam(":id",$array["id"],PDO::PARAM_INT);

            if( $sql->execute()){
                $respuesta = $sql->fetch();
            }
            else{
                $respuesta = 0;
            }
            return $respuesta;
        }
    }
    
?>