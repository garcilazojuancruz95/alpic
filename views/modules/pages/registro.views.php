

<div class="container" id="registro">
      <div class="container mt-2">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8">
            <div>
              <div class="d-flex justify-content-center">
                
              </div>
              <h1 class="panel-title2 text-center mb-4">Crear Usuario</h1>
              <div>
                <form method="POST" class="px-5">
                  
                  <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control mb-4 input_user"  placeholder="Email"/>
                  </div>

                  <?php if (isset($_GET["id"]) AND strpos($_GET["id"], "email") != false): ?>
                  <div>
                    <div class="alert alert-warning" role="alert">
                      <div>
                          El email debe tener mas de 6 caracteres.
                      </div>                 
                    </div>
                  </div>
                <?php endif; ?>

                  <div class="form-group">
                    <input type="text" name="nombre_completo" id="nombre_completo" class="form-control mb-4 input_user"  placeholder="Nombre completo"/>
                  </div>

                  <?php if (isset($_GET["id"]) AND strpos($_GET["id"], "nombre") != false): ?>
                  <div>
                    <div class="alert alert-warning" role="alert">
                      <div>
                          El nombre debe tener al menos 7 caracteres o mas.
                      </div>                 
                    </div>
                  </div>
                <?php endif; ?>

                  <div  class="form-group">
                    <input type="password" name="password" id="password" class="form-control mb-4 input_pass" placeholder="Contraseña"/>
                  </div>

                  <div class="form-group">
                    <input type="password" name="password2" id="password2"  class="form-control mb-4 input_pass" placeholder="Repetir Contraseña"/>
                  </div>

                  <?php if (isset($_GET["id"]) AND strpos($_GET["id"], "pass") != false): ?>
                  <div>
                    <div class="alert alert-warning" role="alert">
                      <div>
                          Ambas contraseñas deben ser iguales.
                      </div>                 
                    </div>
                  </div>
                <?php endif; ?>

                  <div class="form-group mt-4">
                    <button id="btn-registro" name="registro" type="submit" class="btn btn-lg btn-block w-100 d-block" ><i class="nav-item"></i>Crear Usuario</button>
                  </div>
                </form>
                <?php 
                  if (isset($_POST['registro'])) {
                    /*INSTANCIAMOS la clase Usuario , y la variable $a se convierte en un OBJETO. Osea en una copia de la clase.*/
                    $a = new UsuarioController;
                    $a->registro();
                  }
                ?>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>

