    <div class="login-box">
        <img class="avatar" src="img/iniciar-sesion.png" alt="Login">
        <h1>Iniciar Sesión</h1>
        <form method="post">
            <label for="username">Nombre de usuario</label>
            <input type="text" name="username" placeholder="Nombre de usuario">

            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Contraseña">

            <input type="submit" name="enviar" value="Ingresar">

            <a href="#">Olvidaste tu contraseña?</a><br/>
            <a href="#">Crear una cuenta nueva</a>
        </form>
        <?php 
            if (isset($_POST["enviar"])) {
                $a = new AuthController;
                $a->login();
            }
         ?>
    </div>