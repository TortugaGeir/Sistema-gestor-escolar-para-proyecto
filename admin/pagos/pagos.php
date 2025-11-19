<?php
$id_estudiantes = $_GET['id'];
require_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/estudiantes/datos_estudiante.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>PAGO DE CUOTAS</h1>
      <h4>
        <b>Estudiante:</b><?=$apellidos_estudiantes." ".$nombres_estudiantes; ?> <br>
        <b>Cedula Estudiantil:</b><?=$ci_escolar?>
      </h4> 
        <br> <br> <br> <br>

      <div class="col-md-10">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Pagos Registrados</h3>
                <div style="text-align: right;">
                    <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-cash-stack"></i> Registrar Pago
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <!-- /.card-body -->
              <table class="table table-striped table-bordered table-sm table-hovers">
                <tr>
                  <th style="text-align: center; background-color:lightblue">N°</th>
                  <th style="text-align: center;">Mes Cancelado</th>
                  <th style="text-align: center;">Monto</th>
                  <th style="text-align: center;">Fecha de Pago</th>
                  <th style="text-align: center;">Acciones</th>
                </tr>
                <tr>
                  <td>
                    
                  </td>
                </tr>
              </table>
            </div>
    </div>
</div>

<?php
include ('../layout/parte_2.php');
include ('../../layout/mensajes.php');


?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center; background-color:lightblue">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Pagos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= APP_URL; ?>/app/controllers/pagos/create.php" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" value="<?=$id_estudiantes?>" hidden>
                  <label for="">Estudiante</label>
                  <input type="text" class="form-control" value="<?=$apellidos_estudiantes." ".$nombres_estudiantes; ?>" disabled>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Cedula Escolar</label>
                  <input type="text" class="form-control" value="<?=$ci_escolar; ?>" disabled>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Mes Pagado</label>
                  <input type="text" class="form-control">
                </div>
              </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>