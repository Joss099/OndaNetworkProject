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

$id_orden = base64_decode($_GET['id_orden']);
$descripcion = $_REQUEST['desc_orden'];
$cantidad = $_REQUEST['cant_orden'];
$precio = $_REQUEST['precio_orden'];
$total = $_REQUEST['total_orden'];



if (!empty($id_orden) && !empty($descripcion) && !empty($cantidad) && !empty($precio) && !empty($total)) {
 $sql = "UPDATE orden_detalle SET Desc_Item = '$descripcion', Cnt_Item = '$cantidad', Pre_Item = '$precio', Tot_Item = '$total' WHERE Num_Item = $id_orden";
 $query = mysqli_query($con, $sql);
}

if ($query) {
    echo '<script>
    Swal.fire({
        icon: "success",
        title: "Actualizado",
        text: "La orden se ha actualizado correctamente",
      }).then(function(){
        window.location = "../ordenes.php";
      })
    </script>';
} else {

  echo '<script>
    Swal.fire({
        icon: "error",
        title: "Ups",
        text: "No se ha podido actualizar la orden",
      }).then(function(){
        window.location = "../ordenes.php";
      })
    </script>';
}

?>