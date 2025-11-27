<?php
$id_grado = $_GET['id_grados']; // Notar que es 'id_grados'
$id_docente = $_GET['id_docente'];
$id_asignatura = $_GET['id_asignatura'];



require_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/calificaciones/listado_estudiantes.php');
include_once ('../../app/controllers/calificaciones/listado_calificaciones.php');
include_once ('../../app/controllers/docentes/datos_asignaciones.php');

foreach($estudiantes_calificar as $estudiante){
  $grado = $estudiante['grado'];
  $secciones = $estudiante['seccion'];

}

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Listado de Estudiantes del grado:<?=$grado. "-".$secciones;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Estudiantes Registrados</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
            <th>1er Momento</th>
            <th>2do Momento</th>
            <th>3er Momento</th>
            </tr>
          </thead>
          <tbody>
            <?php
          $contador_estudiantes = 0;
            foreach ($estudiantes_calificar as $estudiantes) {
              $contador_estudiantes = $contador_estudiantes +1;
              $id_estudiantes = $estudiantes ['id_estudiante'];
              $nombres = $estudiantes ['nombres'];
              $apellidos = $estudiantes ['apellidos'];
              $foto = $estudiantes ['foto'];
              $grado = $estudiantes ['grado'];
              $Seccion = $estudiantes ['seccion'];
              $ci_escolar = $estudiantes ['ci_escolar'];
              ?>
            <tr>
              <td>
                <input type="text" id="estudiante_<?=$contador_estudiantes;?>" value="<?=$id_estudiantes;?>" hidden>
                <?=$contador_estudiantes;?>
              </td>
              <td>
                <img src="<?=APP_URL."/public/images/estudiantes/".$foto;?>" width="80px" alt="">
              </td>
              <td><?=$nombres;?></td>
              <td><?=$apellidos;?></td>
              <td><?=$ci_escolar;?></td>
              <td><?=$grado;?></td>
              <td><?=$Seccion;?></td>
              <td>
                <?php 
                  
                    $nota_1 = "";
                    $nota_2 = "";
                    $nota_3 = "";
                foreach($calificaciones as $calificacion){
                  if ( ($calificacion['docentes_id'] == $id_docente) && ($calificacion['estudiante_id'] == $id_estudiantes) && ($calificacion['asignaturas_id'] == $id_asignatura) ) {
                    $nota_1 = $calificacion['nota_1°'];
                    $nota_2 = $calificacion['nota_2°'];
                    $nota_3 = $calificacion['nota_3°']; ?>



                    <?php
                  }
                  
                }
                ?>
                <input type="number" value="<?=$nota_1;?>" id="nota1_<?=$contador_estudiantes;?>" class="form-control" style="border-radius: 10px;">
              </td>
              <td>
                <input type="number" value="<?=$nota_2;?>" id="nota2_<?=$contador_estudiantes;?>"  class="form-control" style="border-radius: 10px;">
              </td>
              <td>
                <input type="number" value="<?=$nota_3;?>" id="nota3_<?=$contador_estudiantes;?>"  class="form-control" style="border-radius: 10px;">
              </td>
              

            </tr>
              <?php
            } 
            $contador_estudiantes = $contador_estudiantes; 
            ?>

          </tbody>
        </table>
        <br><hr>
        <button class="btn btn-primary" id="btn_guardar">Guardar notas</button>
            <script>
              $('#btn_guardar').click(function (){
                var n = '<?=$contador_estudiantes;?>';
                var docente ='<?=$id_docente;?>';
                var asignatura ='<?=$id_asignatura;?>';
                var i = 1;
                for(i = 1; i<=n ; i ++){
                  var a = '#nota1_'+i;
                  var nota1 = $(a) .val();

                  var b = '#nota2_'+i;
                  var nota2 = $(b) .val();

                  var c = '#nota3_'+i;
                  var nota3 = $(c) .val();

                  var estudiante = '#estudiante_'+i;
                  var id_estudiante = $(estudiante) .val();
                  
                  var url = "../../app/controllers/calificaciones/create.php";
                  $.get(url,{id_docente:docente,id_estudiante:id_estudiante,id_asignatura:asignatura,nota1:nota1,nota2:nota2,nota3:nota3},function(datos){
                    $('#respuesta').html(datos);
                    
                  });
                  
                }
                  Swal.fire({
                    title: "Exelente!!",
                    text: "Se han cargado las notas",
                    icon: "success"
                  })
            
              

              });
            </script>
            <div id="respuesta" hidden></div>
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