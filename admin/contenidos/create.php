<?php
$id_asignacion = $_GET['id_asignacion'];
$id_docente = $_GET['id_docente'];
$id_asignatura = $_GET['id_asignatura'];


require_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/contenidos/datos_contenido.php');


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
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalContenido">
                    <i class="bi bi-journal-plus"></i> Crear Nuevo Contenido
                  </button>
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
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $contador_contenido = 0;
            foreach($contenidos as $contenido){
              if($contenido['asignaciones_id']==$id_asignacion){
                $id_contenido = $contenido['id_contenido'];
              $titulo = $contenido['titulo'];
              $descripcion = $contenido['descripcion'];
              $material = $contenido['material'];
              $contador_contenido = $contador_contenido +1;
            
            ?>
            <tr>
              <td><center><?=$contador_contenido;?></center></td>
              <td><?=$titulo;?></td>
              <td><?=$descripcion;?></td>
              <td>
                <a href="<?=APP_URL."/public/pdf/material/".$material;?>" class="btn btn-info btn-sm" style="border-radius: 40px;" target="_blank">
                  <i class="bi bi-cloud-download-fill fs-1"></i>
                
              </td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalContenidoEditar<?=$id_contenido;?>">
                    <i class="bi bi-pen"></i>
                  </button>
                  <div class="modal fade" id="modalContenidoEditar<?=$id_contenido;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center; background-color:darkseagreen">
        <h5 class="modal-title" id="exampleModalLabel"><b>Crear Nuevo Contenido</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?=APP_URL;?>/app/controllers/contenidos/update.php" method="post" enctype="multipart/form-data">
            <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="text" name="id_contenido" value="<?=$id_contenido;?>" hidden>
              <label for="">Titulo</label>
            <input type="text" name="titulo_contenido" value="<?=$titulo?>" class="form-control">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Descripción</label>
              <textarea class="form-control" name="descripcion_contenido" rows="3" placeholder="Escriba la Descripción" style="margin-bottom: 12px;" required>
                <?php
                echo htmlspecialchars($descripcion);
                ?>
              </textarea>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Material de Apoyo</label>
            <input type="file" name="material_contenido" class="form-control btn btn-success" style="margin-bottom: 24px;">
            <iframe src="<?=APP_URL."/public/pdf/material/".$material;?>" width="100%" height="300px"></iframe>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
        </form>
    </div>
  </div>
</div>

<!-- Fin Formulario Editar -->
                  <form action="<?=APP_URL;?>/app/controllers/contenidos/delete.php" onclick="preguntar<?=$id_contenido;?>(event)" method="post" id="miFormulario<?=$id_contenido;?>">
                    <input type="text" name="id_contenido" value="<?=$id_contenido;?>" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                  </form> 
              <script>
              function preguntar<?=$id_contenido;?>(event) {
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
                      var form = $('#miFormulario<?=$id_contenido;?>');
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

<div class="modal fade" id="modalContenido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center; background-color:cornflowerblue">
        <h5 class="modal-title" id="exampleModalLabel"><b>Crear Nuevo Contenido</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?=APP_URL;?>/app/controllers/contenidos/create.php" method="post" enctype="multipart/form-data">
            <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="text" name="id_asignacion" value="<?=$id_asignacion;?>" hidden>
              <label for="">Titulo</label>
            <input type="text" name="titulo_contenido" class="form-control">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Descripción</label>
              <textarea class="form-control" name="descripcion_contenido" rows="3" placeholder="Escriba la Descripción" style="margin-bottom: 12px;" required></textarea>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Material de Apoyo</label>
            <input type="file" name="material_contenido" class="form-control btn btn-primary" style="margin-bottom: 24px;">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
        </form>
    </div>
  </div>
</div>


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