<?php 
ob_start();

require_once("views/modules/template/header.views.php");

RouteController::enlace();

require_once("views/modules/template/footer.views.php");

ob_end_flush();
?>