<?php

if( (isset($_SESSION ['mensaje'])) && (isset($_SESSION ['icono']) ) ){
  $mensaje = $_SESSION ['mensaje'];
  $icono = $_SESSION ['icono'];
?>
<script>
Swal.fire({
  title: "Bienvenido!",
  icon: "success",
  draggable: true
});
</script>  

<?php
  unset($_SESSION ['mensaje']);
  unset($_SESSION ['icono']);
}
?>