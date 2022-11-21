<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Onda Network</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="shortcut icon" href="./img/logo.png">
</head>

<body>

</body>

</html>

<?php

include("conexion.php");

$id_item = $_GET['id_item'];
$descripcion = $_REQUEST['desc_orden'];
$cantidad = $_REQUEST['cant_orden'];
$precio = $_REQUEST['precio_orden'];
$id_orden =  $_GET['id_orden'] ;

$subtotal = ($cantidad * $precio);
$totalisv = (($subtotal) * 0.15) + $subtotal;

if (!empty($id_item) && !empty($descripcion) && !empty($cantidad) && !empty($precio) && !empty($subtotal)) {
  $sql = "UPDATE orden_detalle SET Desc_Item = '$descripcion', Cnt_Item = '$cantidad', Pre_Item = '$precio', Tot_Item = '$subtotal', tot_Isv = $totalisv WHERE Num_Item = $id_item";
  $query = mysqli_query($con, $sql);
}

?>

<?php 
if ($query) {
  echo '<script>';
    echo 'Swal.fire({';
        echo 'icon: "success",';
        echo 'title: "Actualizado",';
        echo 'text: "El item se ha actualizado correctamente",';
      echo '}).then(function(){';
        ?>
          window.location = "../editar_ordenes.php?id_orden=" + <?php echo $id_orden?>;
        <?php 
     echo '})';
    echo '</script>';
} else {

  echo '<script>
    Swal.fire({
        icon: "error",
        title: "Ups",
        text: "No se ha podido actualizar el item",
      }).then(function(){
        window.location = "../dashboard.php";
      })
    </script>';
}

?>


