<?php
include ('../../app/config.php');
include ('../layout/parte_1.php');
include ('../../app/controllers/usuarios/listado_de_usuarios.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Listado de Usuarios</h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Usuarios Registrados</h3>

                <div class="card-tools">
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Crear un nuevo usuario</a>
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
            <th>Correo</th>
            <th>Estado</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_usuarios = 0;
            foreach ($usuarios as $usuarios) {
              $contador_usuarios = $contador_usuarios +1;
              $id_usuarios = $usuarios ['id_usuarios'];
              $nombres_usuarios = $usuarios ['nombres'];
              $Apellidos_usuarios = $usuarios ['apellidos'];
              $Rol = $usuarios ['nombre_rol'];
              $correo = $usuarios ['email'];
              $estado = $usuarios ['estado'];
              ?>
            <tr>
              <td><?=$contador_usuarios;?></td>
              <td><?=$nombres_usuarios;?></td>
              <td><?=$Apellidos_usuarios;?></td>
              <td><?=$Rol;?></td>
              <td><?=$correo;?></td>
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
                  <a href="show.php?id=<?=$id_usuarios;?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                  <a href="edit.php?id=<?=$id_usuarios;?>" class="btn btn-success btn-sm"><i class="bi bi-pen"></i></a>
                  <form action="<?=APP_URL;?>/app/controllers/usuarios/delete.php" onclick="preguntar<?=$id_usuarios;?>(event)" method="post" id="miFormulario<?=$id_usuarios;?>">
                    <input type="text" name="id_usuarios" value="<?=$id_usuarios;?>" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                  </form>
              <script>
              function preguntar<?=$id_usuarios;?>(event) {
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
                      var form = $('#miFormulario<?=$id_usuarios;?>');
                      form.submit();
                        }
                      });
                }
              </script>
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