<?php

if( (isset($_SESSION ['mensaje'])) && (isset($_SESSION ['icono']) ) ){
  $mensaje = $_SESSION ['mensaje'];
  $icono = $_SESSION ['icono'];
?>
<script>
  Swal.fire({
    icon: "<?=icono;?>",
    title: "Oops...",
    text: "<?=$mensaje?>",
    footer: '<a href="#">Why do I have this issue?</a>'
  });
</script>  

<?php
  unset($_SESSION ['mensaje']);
  unset($_SESSION ['icono']);
}
?>