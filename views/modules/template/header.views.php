<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Etiqueta base , sirve para decirle desde arranca todos los href y src, osea podemos renombrar cual es la raiz inicia, esto lo usamos para que siempre arranque desde la raiz zulhow, sino cada vista arrancaria asi
  
  http://localhost/CLASES/zulhow/login
  http://localhost/CLASES/zulhow/registro
  
  Lo que sucede si tenemos MVC de esta forma y no usamos base 
  es que cuando se utilize <link href="css/estilos.css">
  la ruta que busca seria esta.

  http://localhost/CLASES/zulhow/login/css/estilos.css 

  y esto tira error ,con base le quitamos el /login del final y /registro tambien para todas las paginas
   -->
  <base href="http://zulhow.com/">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Zulhow S.A</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="shortcut icon" href="views/assets/img/icono.ico">
  <link rel="stylesheet" href="views/assets/css/estilos.css">
  <link rel="stylesheet" href="views/assets/css/bootstrap.css">   
  <link rel="stylesheet" href="views/assets/css/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <!-- <link rel="stylesheet" href="views/assets/css/skeleton.css">
  <link rel="stylesheet" href="views/assets/css/normalize.css">-->
 
  <script src="/views/assets/js/precio_caja.js" defer></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" defer></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Scripts de zulhow -->
  <script src="/views/assets/js/provincias.js"></script>
</head>
<body>
<main>
  
<?php 
  $action = "";
  if (isset($_GET['action'])) {

    $action = $_GET["action"]; 
  }

?>
 <nav class="navbar navbar-expand-lg navbar-light bg-navbar text-center bg-color py-3">
        <div class="container-fluid">
        <a id="logo">Zullow S.A</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        
          <ul class="navbar-nav mr-auto">
            <?php if (!isset($_SESSION['email'])):?>

            <li class="nav-item <?php if($action == 'home') echo 'active'; ?>">
              <a class="nav-link" href="/home">Home</a>
            </li>
            <li class="nav-item <?php if($action == 'servicios') echo 'active'; ?>">
              <a class="nav-link" href="/servicios">Servicios</a>
            </li>
            <li class="nav-item <?php if($action == 'flota') echo 'active'; ?>">
              <a class="nav-link" href="/flota">Flota</a>
            </li>
			      <li class="nav-item <?php if($action == 'deposito') echo 'active'; ?>">
              <a class="nav-link" href="/deposito">Depósito </a>
            </li>
			      <li class="nav-item <?php if($action == 'contacto') echo 'active'; ?>">
              <a class="nav-link" href="/contacto">Contacto</a>
            </li>
            <?php endif; ?>
            <!-- USUARIOS COMUNES -->
            <?php if (isset($_SESSION['es_admin']) AND $_SESSION['es_admin'] == 0):?>
            <li class="nav-item" class="nav-item <?php if($action == 'perfil') echo 'active'; ?>">
              <a class="nav-link" href="perfil">Perfil</a>
            </li>
            <li class="nav-item" class="nav-item <?php if($action == 'Envios') echo 'active'; ?>">
              <a class="nav-link" href="envios">Envios</a>
            </li>
            <li class="nav-item" class="nav-item <?php if($action == 'Geolocalizacion') echo 'active'; ?>">
              <a class="nav-link" href="geolocalizacion">Geolocalizacion</a>
            </li>
            <li class="nav-item" class="nav-item <?php if($action == 'ayuda') echo 'active'; ?>">
              <a class="nav-link" href="ayudas">Ayuda</a>
            </li>
            <?php endif; ?>
            <!-- Para el administrador -->
            <?php if (isset($_SESSION['es_admin']) AND $_SESSION['es_admin'] == 1):?>
              <li class="nav-item">
                <a class="nav-link" href="">PARA EL ADMIN </a>
              </li>

            <?php endif; ?>


          </ul>
          
          <?php if (!isset($_SESSION['email'])):?>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php if($action == 'registro') echo 'active'; ?>">
              <a class="nav-link" href="/registro">Registro</a>
            </li>
            <li class="nav-item <?php if($action == 'login') echo 'active'; ?>">
              <a class="nav-link" href="/login">Login</a>
            </li>
          </ul>
          <?php else: ?>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="/cerrar_sesion">Cerrar sesion</a>
            </li>
          </ul>
          <?php endif; ?>
        </div>
  </div>
</nav>
