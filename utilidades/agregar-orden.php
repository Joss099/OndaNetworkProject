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
//Datos para la tabla ondaorde.orden
//id de la orden es autoincrementable
$fecha = $_REQUEST['fecha'];
$proveedor = $_REQUEST['proveedor'];
$pago = $_REQUEST['pago'];
$responsable = base64_decode($_REQUEST['id_usuario']);
$presupuesto = $_REQUEST['presupuesto'];
$observaciones = $_REQUEST['observaciones'];
$reglon = $_REQUEST['reglon'];
$descripcion = $_REQUEST['descripcion'];

//Datos para la tabla ondaorden.orden_detalle
//id orden_detalle es autoincrementable
$no_orden = $_REQUEST['no_orden'];
$no_detalle = $_REQUEST['no_ordendetalle'];
$precio = $_REQUEST['precio_orden'];
$descripcion_orden = $_REQUEST['descripcion_detalle'];
$cantidad = $_REQUEST['cantidad'];
$total = $_REQUEST['total'];

$sql = "SELECT Ord_Num from orden;";
$query=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($query)){
  $result = $row;
}

if($result['Ord_Num'] == $no_orden ){
  echo '<script>
  Swal.fire({
      icon: "info",
      title: "Espera...",
      text: "El numero de orden no esta registrado",
    }).then(function(){
      window.location = "../agregar_orden.php";
    })
  </script>';
}
else{
  $sql1 = "INSERT INTO orden (Fecha, Id_Prov, Id_Tip_pag, Id_User, Id_Pres, Observaciones, Id_Reglon, Desc_Orden) values('$fecha', $proveedor, $pago, $responsable, $presupuesto,'$observaciones',$reglon, '$descripcion')";
  $query1=mysqli_query($con,$sql1);
  $sql2 = "INSERT INTO orden_detalle (Desc_Item, Cnt_Item, Pre_Item, Tot_Item, Ord_Num) values ('$descripcion_orden', $cantidad, $precio,$total , $no_orden)";
  $query2=mysqli_query($con,$sql2);

  echo '<script>
        Swal.fire({
            icon: "success",
            title: "Guardado Correctamente",
            text: "La orden ha sido registrado.",
          }).then(function(){
            window.location = "../agregar_orden.php";
          })
        </script>'; 
}

?>