<?php
include ('../../app/config.php');
include ('../layout/parte_1.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Configuraciones del Sistema</h1> 
        <br> <br> <br> <br>
    <div class="col-md-4 col-sm-6 col-12" style="margin-left: 18px;">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="bi bi-house-gear-fill"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Datos de la Institución</span>
                <a href="instituciones" class="btn btn-primary btn-sm">Configurar</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
              <!-- /.card-body -->
          <div class="col-md-4 col-sm-6 col-12" style="margin-left: 18px;">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="bi bi-calendar-week"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Periodo Escolar</span>
                <a href="periodos" class="btn btn-info btn-sm">Configurar</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
            
    </div>
</div>

<?php
include ('../layout/parte_2.php');
include ('../../layout/mensajes.php');


?>