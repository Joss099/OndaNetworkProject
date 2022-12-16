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

$id =  base64_decode($_REQUEST['id_orden']);
$orden = "SELECT * from orden where Ord_Num = $id";
$query = mysqli_query($con, $orden);

while ($row = mysqli_fetch_array($query)) {
  $result = $row;
}

$reglon = $result['Id_Reglon'];
$total = $result['total_orden'];

$update_reglon = "UPDATE asignacion_presupuesto SET total_pres  = (total_pres+ $total) WHERE id_reglon = $reglon AND estado = 0";
$query2 = mysqli_query($con, $update_reglon);

if ($query2) {
  $delete_items = "DELETE FROM orden_detalle WHERE Ord_Num = $id";
  mysqli_query($con, $delete_items);
  $delete = "DELETE FROM orden WHERE Ord_Num = $id";
  $query3 =  mysqli_query($con, $delete);

  if ($query3) {

    if ($query) {
      echo '<script>
     Swal.fire({
         icon: "warning",
         title: "Eliminado",
         text: "La orden ha sido eliminada",
       }).then(function(){
         window.location = "../ordenes_pendientes.php";
       })
     </script>';
    } else {

      echo '<script>
     Swal.fire({
         icon: "error",
         title: "Ups",
         text: "No se ha podido eliminar la orden",
       }).then(function(){
         window.location = "../ordenes_pendientes.php";
       })
    </script>';
    }
  }
}
?>