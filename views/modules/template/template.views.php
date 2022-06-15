<?php 
    /*Cuando php envia funciones header() son de redireccion , la pagina necesita que php limpie las cabaceras de reenvio, ob_start() junto con ob_end_flush() lo que hace en encerrar todo el codigo php en el cual sucede las redirecciones header. Esto sirve para evitar el error.

    Cannot modify header information - headers already sent by (output started at */
    ob_start();
    session_start();
    require_once("views/modules/template/header.views.php");

    $route = new Route;
    require_once($route->getPage());

    require_once("views/modules/template/footer.views.php");
    ob_end_flush();
?>