<?php
include ('../../app/config.php');
include ('../layout/parte_1.php');
include ('../../app/controllers/roles/listado_roles.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Listado de Categorias</h1> 
        <br> <br> <br> <br>

      <div class="col-md-10">
      <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Listado de Roles</h3>

                <div class="card-tools">
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Crear un nuevo rol</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table border 1 class= "table table-striped table-hover">
          <thead>
            <tr>
            <th>Nro.</th>
            <th>Nombre de rol</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_rol = 0;
            foreach ($roles as $roles) {
              $contador_rol = $contador_rol +1;
              $id_roles = $roles ['id_roles'];
              $nombre_rol = $roles ['nombre_rol'];?>
            <tr>
              <td><?=$contador_rol;?></td>
              <td><?=$nombre_rol;?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn btn-success btn-sm"><i class="bi bi-pen"></i></button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                </div>
              </td>
            </tr>
              <?php
            }  
            ?>

          </tbody>
        </table>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</div>


<?php
include ('../layout/parte_2.php');
include ('../../layout/mensajes.php');


?>