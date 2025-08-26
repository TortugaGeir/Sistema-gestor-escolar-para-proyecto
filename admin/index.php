<?php
include ('../app/config.php');
include ('layout/parte_1.php');
include('../app/controllers/roles/listado_roles.php');

?>
    <div class="content-wrapper">
      <div class="container">
        <div class="container">
          <div class="row">
            <h1><?=APP_NAME;?></h1>
          </div>
          <br><br>
          <div class="form-row align-items-left">
            <div class="col">
            <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_roles = 0;
                  foreach($roles as $roles){
                    $contador_roles = $contador_roles + 1;
                  }
                ?>
                <h3><?=$contador_roles;?></h3>

                <p>Roles Registrados</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                      <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5z"/>
                      <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1z"/>
                    </svg>
                <a href="<?=APP_URL;?>/admin/roles"
                  class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                  Más información <i class="bi bi-link-45deg"></i>
                </a>
                </div>
                
              </div>
          <div class="form-row align-items-left">
            <div class="col">
            <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_roles = 0;
                  foreach($roles as $roles){
                    $contador_roles = $contador_roles + 1;
                  }
                ?>
                <h3><?=$contador_roles;?></h3>

                <p>Roles Registrados</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                      <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5z"/>
                      <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1z"/>
                    </svg>
                <a href="<?=APP_URL;?>/admin/roles"
                  class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                  Más información <i class="bi bi-link-45deg"></i>
                </a>
                </div>
                
              </div>
          
              
          
          </div>
        </div>
        
      </div>
    </div>






<?php
include ('layout/parte_2.php');
include ('../layout/mensajes.php');

?>