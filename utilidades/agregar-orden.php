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

$no_orden = $_REQUEST['no_orden'];
$proveedor = $_REQUEST['proveedor'];
$pago = $_REQUEST['pago'];
$precio = $_REQUEST['precio_orden'];
$responsable = $_REQUEST['usuario'];
$reglon = $_REQUEST['reglon'];
$fecha = $_REQUEST['fecha'];
$fecha_pago = $_REQUEST['fecha_pago'];
$presupuesto = $_REQUEST['presupuesto'];
$descripcion = $_REQUEST['descripcion'];
$observaciones = $_REQUEST['observaciones'];
$descripcion_orden = $_REQUEST['descripcion_orden'];
$cantidad = $_REQUEST['cantidad'];
$total = $_REQUEST['total'];


if(isset($no_orden) || isset($proveedor) || isset($pago) || isset($precio) || isset($responsable) || isset($reglon) || isset($fecha) || isset($fecha_pago) || isset($presupuesto) || isset($descripcion) || isset($observaciones) || isset($descripcion_orden) || isset($cantidad) || isset($total)){
    echo "Debes llenar todos los datos";
}
else{

 echo "$no_orden <br>";
 echo "$proveedor <br>";
 echo "$pago <br>";
 echo "$precio <br>";
 echo "$responsable <br>";
 echo "$reglon <br>";
 echo "$fecha <br>";
 echo "$fecha_pago <br>";
 echo "$presupuesto <br>";
 echo "$descripcion <br>";
 echo "$observaciones <br>";
 echo "$descripcion_orden <br>";
 echo "$cantidad <br>";
 echo "$total <br>";

}


?>