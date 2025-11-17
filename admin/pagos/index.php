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
            <th>Telefono</th>
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
              <td><?=$telefono;?></td>
              
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="contrato.php?id=<?=$id_estudiantes;?>" class="btn btn-warning btn-sm"><i class="bi bi-printer"></i></a>
                  <a href="pagos.php?id=<?=$id_estudiantes;?>" class="btn btn-success btn-sm"><i class="bi bi-cash-coin"></i></a>
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