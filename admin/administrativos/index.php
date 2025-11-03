<?php
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/administrativos/listado_administrativos.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Listado del Personal Administrativos</h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Personal Registrados</h3>

                <div class="card-tools">
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Crear un nuevo administrativo</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table  id="example2" class= "table table-striped table-hover">
          <thead>
            <tr>
            <th>Nro.</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Rol</th>
            <th>Carnet Identidad</th>
            <th>Correo</th>
            <th>Profesión</th>
            <th>Estado</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_administrativos = 0;
            foreach ($administrativos as $administrativos) {
              $contador_administrativos = $contador_administrativos +1;
              $id_administrativos = $administrativos ['id_administrativos'];
              $nombres_administrativos = $administrativos ['nombres'];
              $Apellidos_administrativos = $administrativos ['apellidos'];
              $Rol = $administrativos ['nombre_rol'];
              $ci = $administrativos ['ci'];
              $correo = $administrativos ['email'];
              $profesion = $administrativos ['profesion'];
              $estado = $administrativos ['estado'];
              ?>
            <tr>
              <td><?=$contador_administrativos;?></td>
              <td><?=$nombres_administrativos;?></td>
              <td><?=$Apellidos_administrativos;?></td>
              <td><?=$Rol;?></td>
              <td><?=$ci;?></td>
              <td><?=$correo;?></td>
              <td><?=$profesion;?></td>
            <td>
            <?php
            if($estado == "1"){?>

            <button class="btn btn-success btn-sm" style="border-radius: 20px;">Activo</button>
            <?php
            }else{?>
            <button class="btn btn-danger btn-sm" style="border-radius: 20px;">Inactivo</button>
            <?php
            }
            ?>
            </td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="show.php?id=<?=$id_administrativos;?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                  <a href="edit.php?id=<?=$id_administrativos;?>" class="btn btn-success btn-sm"><i class="bi bi-pen"></i></a>
              <!--    <form action="<?=APP_URL;?>/app/controllers/usuarios/delete.php" onclick="preguntar<?=$id_administrativos;?>(event)" method="post" id="miFormulario<?=$id_administrativos;?>">
                    <input type="text" name="id_usuarios" value="<?=$id_administrativos;?>" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                  </form>
              <script>
              function preguntar<?=$id_administrativos;?>(event) {
                event.preventDefault();
                  Swal.fire({
                    title: 'Eliminar registro',
                    text: '¿Desea eliminar este registro?',
                    icon: 'question',
                    showDenyButton: true,
                    confirmButtonText: 'Eliminar',
                    confirmButtonColor: '#a5161d',
                    denyButtonColor: '#270a0a',
                    denyButtonText: 'Cancelar',
                    }).then((result) => {
                      if (result.isConfirmed) {
                      var form = $('#miFormulario<?=$id_administrativos;?>');
                      form.submit();
                        }
                      });
                }
              </script>
          -->
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
include_once ('../layout/parte_2.php');
include_once ('../../layout/mensajes.php');


?>