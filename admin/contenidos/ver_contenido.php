<?php
$id_asignaturas = $_GET['id_asignatura'];


require_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/contenidos/datos_contenido_estudiantes.php');



?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Contenidos a evaluar</h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Contenidos Registrados</h3>

                <div class="card-tools">
                <!-- Button trigger modal -->
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table  id="example2" class= "table table-striped table-hover">
              <thead>
            <tr>
            <th>Nro.</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Material</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $contador_contenidos = 0;
            foreach($contenidos_estudiantes as $contenidos){
              if($contenidos['id_asignaturas']==$id_asignaturas){
                $id_contenido = $contenidos['id_contenido'];
              $titulo = $contenidos['titulo'];
              $descripcion = $contenidos['descripcion'];
              $material = $contenidos['material'];
              $contador_contenidos = $contador_contenidos +1;
            
            ?>
            <tr>
              <td><center><?=$contador_contenidos;?></center></td>
              <td><?=$titulo;?></td>
              <td><?=$descripcion;?></td>
              <td>
                <a href="<?=APP_URL."/public/pdf/material/".$material;?>" class="btn btn-info btn-sm" style="border-radius: 40px;" target="_blank">
                  <i class="bi bi-cloud-download-fill fs-1"></i>
                
              </td>
            
            </tr>
            <?php
            }
              } ?>
          </tbody>
        </table>
        <br><hr>
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