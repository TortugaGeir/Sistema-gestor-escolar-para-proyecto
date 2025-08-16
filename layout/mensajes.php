<?php

if( (isset($_SESSION ['mensaje'])) && (isset($_SESSION ['icono']) ) ){
  $mensaje = $_SESSION ['mensaje'];
  $icono = $_SESSION ['icono'];
  $titulo = $_SESSION ['titulo']
?>
<script>
Swal.fire({
  title: "<?=$titulo?>",
  text: "<?=$mensaje?>",
  icon: "<?=$icono?>"
})
</script>  

<?php
  unset($_SESSION ['mensaje']);
  unset($_SESSION ['icono']);
}


?>