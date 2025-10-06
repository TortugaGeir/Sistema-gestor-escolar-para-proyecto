<?php
include_once ('../app/config.php');
include_once ('layout/parte_1.php');
include_once('../app/controllers/roles/listado_roles.php');
include_once('../app/controllers/usuarios/listado_de_usuarios.php');
include_once('../app/controllers/niveles/listado_niveles.php');
include_once('../app/controllers/grados/listado_grados.php');
include_once('../app/controllers/asignaturas/listado_asignaturas.php');
?>
    <div class="content-wrapper">
      <div class="container">
        <div class="container">
          <div class="row">
            <h1 style="margin-bottom: 24px;"><?=APP_NAME;?></h1>
          </div>
          <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info ">
              <div class="inner">
                <?php
                $contador_roles = 0;
                  foreach($roles as $roles){
                    $contador_roles = $contador_roles + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_roles;?></h3>

                <p class="text-light">Roles registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-bookmarks-fill fs-1 opacity-50"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/roles" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                $contador_usuarios = 0;
                  foreach($usuarios as $usuarios){
                    $contador_usuarios = $contador_usuarios + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_usuarios;?></h3>

                <p class="text-light">Usuarios Registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-people-fill fs-1 opacity-50"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/usuarios" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_niveles = 0;
                  foreach($niveles as $niveles){
                    $contador_niveles = $contador_niveles + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_niveles;?></h3>

                <p class="text-light">Niveles Registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-bar-chart-fill fs-1 opacity-50"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/niveles" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $contador_grados = 0;
                  foreach($grados as $grados){
                    $contador_grados = $contador_grados + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_grados;?></h3>

                <p class="text-light">Grados Registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-bookshelf fs-1 opacity-50"></i>
              </div>
              <a href="<?=APP_URL;?>/admin/grados" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          
<!-- segunda columna -->
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger ">
              <div class="inner">
                <?php
                $contador_asignaturas = 0;
                  foreach($asignaturas as $asignaturas){
                    $contador_asignaturas = $contador_asignaturas + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_asignaturas;?></h3>

                <p class="text-light">Asignaturas registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-journals fs-1 opacity-50"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/asignaturas" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                $contador_usuarios = 0;
                  foreach($usuarios as $usuarios){
                    $contador_usuarios = $contador_usuarios + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_usuarios;?></h3>

                <p class="text-light">Usuarios Registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-people-fill fs-1 opacity-50"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/usuarios" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_niveles = 0;
                  foreach($niveles as $niveles){
                    $contador_niveles = $contador_niveles + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_niveles;?></h3>

                <p class="text-light">Niveles Registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-bar-chart-fill fs-1 opacity-50"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/niveles" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $contador_grados = 0;
                  foreach($grados as $grados){
                    $contador_grados = $contador_grados + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_grados;?></h3>

                <p class="text-light">Grados Registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-bookshelf fs-1 opacity-50"></i>
              </div>
              <a href="<?=APP_URL;?>/admin/grados" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          
        </div>
        

                




<?php
include ('layout/parte_2.php');
include ('../layout/mensajes.php');

?>