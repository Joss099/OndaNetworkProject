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
$presupuesto = $_REQUEST['presupuesto'];
$orden = base64_decode($_REQUEST['id_orden']);
$responsable =  $_REQUEST['responsable'];

$sql = "UPDATE  orden set Pagado = 1, Id_Pres = $presupuesto, pagado_por = '$responsable' WHERE Ord_Num = $orden";
$query = mysqli_query($con, $sql);

if($query){
    echo '<script>
    Swal.fire({
        icon: "success",
        title: "Orden Pagada",
        text: "Se ha pagado la orden",
      }).then(function(){
        window.location = "../ordenes_pendientes.php";
      })
    </script>'; 
}

?>