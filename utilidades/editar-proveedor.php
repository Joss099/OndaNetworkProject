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

$id = base64_decode($_GET['id_proveedor']);
$proveedor = $_REQUEST['nom_proveedor'];
$contacto = $_REQUEST['contacto'];
$telefono = $_REQUEST['telefono'];

if (!empty($id) && !empty($proveedor) && !empty($contacto) && !empty($telefono)) {
  //Cuando el password del input es igual al de la base de datos
    $sql = "UPDATE proveedores SET Nom_Prov='$proveedor', Cont_Prov = '$contacto', Tel_Prov = '$telefono' WHERE id_Prov = $id;";
    $query = mysqli_query($con, $sql);
}

if ($query) {
    echo '<script>
    Swal.fire({
        icon: "success",
        title: "Actualizado",
        text: "El proveedor se ha actualizado correctamente",
      }).then(function(){
        window.location = "../proveedores.php";
      })
    </script>';
}
  else {

  echo '<script>
    Swal.fire({
        icon: "error",
        title: "Ups",
        text: "No se ha podido actualizar el proveedor",
      }).then(function(){
        window.location = "../proveedores.php";
      })
    </script>';
}

?>