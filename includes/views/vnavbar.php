      <aside class="sidebar">
          <div class="vertical-nav bg-white active" id="sidebar">
              <div class="py-4 px-3 mb-4 bg-light">
                <div class="media d-flex align-items-center">
                  <img src="<?php echo $_SESSION["url_foto"]; ?>" alt="foto" width="70" class="mr-3 rounded-circle img-thumbnail shadow-sm height-perfil-70">
                  <div class="px-3 media-body">
                    <h4 class="m-0"><?php echo $_SESSION["nick"]; ?></h4>
                    <p class="font-weight-light text-muted mb-0 mt-1">
                      <?php if ($_SESSION["tipoUsuario"]!="administrador"): ?>
                        NIVEL: <?php echo $_SESSION['nivel']; ?>
                      <?php endif; ?>
                    </p>
                  </div>
                </div>
              </div>
            
              <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">MAIN</p>
            
              <?php 
              
              switch($_SESSION["tipoUsuario"]) {
                case "administrador":
                  require_once 'items-menu/admin.php';
                break;
                case "cliente":
                  require_once 'items-menu/cliente.php';
                break;
                case "entrenador":
                  require_once 'items-menu/entrenador.php';
                break;
              }

              ?>
              
            </div>
            <!-- End vertical navbar -->
      </aside>