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

include('conexion.php');

if (isset($_POST['Guardar'])) {
  $reglon = $_REQUEST['reglon'];
  $fecha = $_REQUEST['fecha'];
  $valor = $_REQUEST['valor'];
  $usuario = base64_decode($_GET['id_usuario']);


  if (empty($reglon) || empty($fecha) || empty($valor)) {
    echo '<script>
        Swal.fire({
            icon: "error",
            title: "Espera...",
            text: "Debes llenar todos los datos!",
          }).then(function(){
            window.location = "../proveedores.php";
          })
        </script>';
  } else {

    $consult = "SELECT estado FROM asignacion_presupuesto WHERE id_reglon = $reglon order by estado asc limit 1;";
    $query = mysqli_query($con, $consult);

    while ($row = mysqli_fetch_array($query)) {
      $result = $row;
    }

    if (!isset($result['estado'])) {
      $sql = "INSERT INTO ondaorden.asignacion_presupuesto(usuario_asig, mes_asig, id_reglon, valor_asig, total_pres, estado) VALUES ($usuario, '$fecha', $reglon, $valor, $valor, 0 );";
      $query = mysqli_query($con, $sql);
      if ($query) {
        echo '<script>
            Swal.fire({
                icon: "success",
                title: "Guardado Correctamente",
                text: "El presupuesto fue asignado.",
              }).then(function(){
                window.location = "../presupuestos.php";
              })
            </script>';
      }
    } elseif ($result['estado'] ==1) {

      $sql = "INSERT INTO ondaorden.asignacion_presupuesto(usuario_asig, mes_asig, id_reglon, valor_asig, total_pres, estado) VALUES ($usuario, '$fecha', $reglon, $valor, $valor, 0 );";
      $query = mysqli_query($con, $sql);
      if ($query) {
        echo '<script>
          Swal.fire({
              icon: "success",
              title: "Guardado Correctamente",
              text: "El presupuesto fue asignado.",
            }).then(function(){
              window.location = "../presupuestos.php";
            })
          </script>';
      }
    } else {

      echo '<script>
        Swal.fire({
            icon: "info",
            title: "Ups",
            text: "Ya hay un presupuesto asignado a este reglon.",
          }).then(function(){
            window.location = "../presupuestos.php";
          })
        </script>';
    }
  }
} else {
}


?>