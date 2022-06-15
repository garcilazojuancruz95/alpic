<?php 
require($_SERVER["DOCUMENT_ROOT"].'/vendor/autoload.php');
 class EnviosController
 {
 	
 	public function setEnvio()
 	{
 		$precio = htmlentities($_POST["precio"],ENT_COMPAT,"UTF-8");
 		$email = htmlentities($_POST["email"],ENT_COMPAT,"UTF-8");
 		$nombre_completo = htmlentities($_POST["nombre_completo"],ENT_COMPAT,"UTF-8");
 		$telefono = htmlentities($_POST["telefono"],ENT_COMPAT,"UTF-8");
 		$domicilio = htmlentities($_POST["domicilio"],ENT_COMPAT,"UTF-8");
        $email2 = htmlentities($_POST["email2"],ENT_COMPAT,"UTF-8");
        $nombre_completo2 = htmlentities($_POST["nombre_completo2"],ENT_COMPAT,"UTF-8");
        $telefono2 = htmlentities($_POST["telefono2"],ENT_COMPAT,"UTF-8");
        $domicilio2 = htmlentities($_POST["domicilio2"],ENT_COMPAT,"UTF-8");
 		$tamano_caja = htmlentities($_POST["tamano_caja"],ENT_COMPAT,"UTF-8");
 		$origen_provincia = htmlentities($_POST["origen_provincia"],ENT_COMPAT,"UTF-8");
 		$origen_localidad = htmlentities($_POST["origen_localidad"],ENT_COMPAT,"UTF-8");
 		$destino_provincia = htmlentities($_POST["destino_provincia"],ENT_COMPAT,"UTF-8");
        $destino_localidad = htmlentities($_POST["destino_localidad"],ENT_COMPAT,"UTF-8");
        $franja_inicio = htmlentities($_POST["franja_inicio"],ENT_COMPAT,"UTF-8");
 		$franja_fin = htmlentities($_POST["franja_fin"],ENT_COMPAT,"UTF-8");

 		$array = ["precio"=>$precio,"email"=>$email,"nombre_completo"=>$nombre_completo,"telefono"=>$telefono,"domicilio"=>$domicilio,"email2"=>$email2,"nombre_completo2"=>$nombre_completo2,"telefono2"=>$telefono2,"domicilio2"=>$domicilio2,"tamano_caja"=>$tamano_caja,"origen_provincia"=>$origen_provincia,"origen_localidad"=>$origen_localidad,"destino_provincia"=>$destino_provincia,"destino_localidad"=>$destino_localidad,"franja_inicio"=>$franja_inicio,"franja_fin"=>$franja_fin];
 		$respuesta = EnviosModel::setEnvio($array);
 		if ($respuesta) {
 			header("location:/envios_paso2/".$respuesta."/envio_success");
 		}else{
 			header("location:/envios/error");

 		}
 	}
    public function setPago()
    {
        $idEnvio = htmlentities($_POST["idEnvio"],ENT_COMPAT,"UTF-8");
        $titular = htmlentities($_POST["titular"],ENT_COMPAT,"UTF-8");
        $pagado = 1;
        $code = rand(10000, 999999);//123456
        $array = ["idEnvio"=>$idEnvio,"titular"=>$titular,"pagado"=>$pagado,"codigo"=>$code];
        $respuesta = EnviosModel::setPago($array);
        if ($respuesta) {
            $envioActual = EnviosModel::getEnvioById(array("id"=>$idEnvio));

            /*Para verificar si ya codigo existe en la tabla pagos. Tenemos que realizar un verificacion atraves de consulta SQL, seleccionando si una fila ya existe apartir del codigo que tenemos en la variable $code, while esta para repetir la consulta hasta que el codigo no exista en la tabla pagos.*/
            $codigoExiste = true;
            /*while ($codigoExiste) {
                $check = EnviosModel::getEnvioByCode(array("codigo"=>$code));
                //El codigo no se repite, no existe una fila que tenga ese codigo 
                if ($check == 0) {
                    $codigoExiste = false;
                }
                //el codigo se repite, existe una fila con ese codigo
                else{
                    $code = rand(10000, 999999);//578123
                }
            }*/

            //En este punto ya sabemos que el codigo no se repite, empezamos el envio de EMAIL
            
            $email = $envioActual["email"];
            $email2 = $envioActual["email2"];
            $message = 
            "<h1>Este es un mensaje automatico</h1>
            <p>El pago del envio de la persona: <b>".$envioActual["nombre_completo"]."</b> y hacia destino persona:<b>".$envioActual["nombre_completo2"]."</b>.<br> Esta en proceso, el siguiente link es para el seguimiento del envio.<br>El codigo es <h3>".$code."</h3> <br> <a href='zulhow.com/seguimiento/".$code."'>Seguimiento</a></p>";
            $subject = "Confirmacion de un pago - ZULHOW S.A.";
            MailerController::sendEmail($email, $message, $subject);
            MailerController::sendEmail($email2, $message, $subject);

        }
        else{
            header("location:/envios_paso2/".$idEnvio."/error");
        }
    }
 } 
?>