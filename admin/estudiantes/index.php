<?php
require_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/estudiantes/listado_estudiantes.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Listado de Estudiantes</h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Estudiantes Registrados</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body overflow-y-scroll">
              <table  id="example2" class= "table table-striped table-hover">
          <thead>
            <tr>
            <th>Nro.</th>
            <th>Foto</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cedula Escolar</th>
            <th>Grado</th>
            <th>Sección</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Estatus</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_estudiantes = 0;
            foreach ($estudiantes as $estudiantes) {
              $contador_estudiantes = $contador_estudiantes +1;
              $id_estudiantes = $estudiantes ['id_estudiante'];
              $nombres = $estudiantes ['nombres'];
              $apellidos = $estudiantes ['apellidos'];
              $foto = $estudiantes ['foto'];
              $grado = $estudiantes ['grado'];
              $Seccion = $estudiantes ['seccion'];
              $correo = $estudiantes ['email'];
              $telefono = $estudiantes ['telefono'];
              $ci_escolar = $estudiantes ['ci_escolar'];
              $estatus = $estudiantes ['estatus'];
              ?>
            <tr>
              <td><?=$contador_estudiantes;?></td>
              <td>
                <img src="<?=APP_URL."/public/images/estudiantes/".$foto;?>" width="80px" alt="">
              </td>
              <td><?=$nombres;?></td>
              <td><?=$apellidos;?></td>
              <td><?=$ci_escolar;?></td>
              <td><?=$grado;?></td>
              <td><?=$Seccion;?></td>
              <td><?=$correo;?></td>
              <td><?=$telefono;?></td>
              
              <td>
                <?php
            if($estatus == "Cursando"){?>

            <button class="btn btn-success btn-sm" style="border-radius: 20px;">Cursando</button>
            <?php
            }else{?>
            <button class="btn btn-warning btn-sm" style="border-radius: 20px;">Acabado</button>
            <?php
            }
            ?>
              </td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="show.php?id=<?=$id_estudiantes;?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                  <a href="edit.php?id=<?=$id_estudiantes;?>" class="btn btn-success btn-sm"><i class="bi bi-pen"></i></a>
                  <!--<form action="<?=APP_URL;?>/app/controllers/configuraciones/instituciones/delete.php" onclick="preguntar<?=$id_estudiantes;?>(event)" method="post" id="miFormulario<?=$id_estudiantes;?>">
                    <input type="text" name="id_instituciones" value="<?=$id_estudiantes;?>" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                  </form>
              <script>
              function preguntar<?=$id_estudiantes;?>(event) {
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
                      var form = $('#miFormulario<?=$id_estudiantes;?>');
                      form.submit();
                        }
                      });
                }
              </script> -->
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>