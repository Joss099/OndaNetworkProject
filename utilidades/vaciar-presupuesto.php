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

$id = base64_decode($_REQUEST['id_pres']);

$sql = "UPDATE asignacion_presupuesto SET estado = 1, total_pres = 0  WHERE id_asig = $id";
$query = mysqli_query($con, $sql);

if ($query) {
    echo '<script>
    Swal.fire({
        icon: "success",
        title: "Vaciado",
        text: "El presupuesto ha sido vaciado",
      }).then(function(){
        window.location = "../presupuestos.php";
      })
    </script>';
} else {

    echo '<script>
    Swal.fire({
        icon: "error",
        title: "Ups",
        text: "No se ha podido vaciar el proveedor",
      }).then(function(){
        window.location = "../presupuestos.php";
      })
    </script>';
}

?>