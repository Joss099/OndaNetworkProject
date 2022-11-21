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

if(isset($_POST['Guardar'])){
    $ord_Num = $_REQUEST['id_orden'];
    $descripcion = $_REQUEST['desc_orden'];
    $cantidad = $_REQUEST['cant_orden'];
    $precio = $_REQUEST['precio_item'];
    $subtotal = $cantidad * $precio;
    $ivaItem = 1;
    $ivaItem2 = 0;

    //Si el item trae impuesto
    if(isset ($_REQUEST['isv_item'])){
    $impuesto1 =$_REQUEST[ 'isv_item'];
    $impuesto = $impuesto1 / 100;
    $totalItem = ($subtotal * $impuesto) + $subtotal;
    }

    if(!empty($impuesto1)){
        $sql = "INSERT INTO orden_detalle (Desc_Item, Cnt_Item, Pre_Item, Tot_Item, Iva_Item, isv_Item, tot_Isv, Ord_Num) values ('$descripcion', $cantidad, $precio, $subtotal, $ivaItem,  $impuesto1, $totalItem, $ord_Num)";
        $query = mysqli_query($con, $sql);
        if($query){
          echo '<script>';
          echo 'Swal.fire({';
              echo 'icon: "success",';
              echo 'title: "Guardado Correctamente",';
              echo 'text: "El item se ha agregado correctamente",';
            echo '}).then(function(){';
              ?>
                window.location = "../editar_ordenes.php?id_orden=" + <?php echo $ord_Num?>;
              <?php 
           echo '})';
          echo '</script>';
    }
}

    else{
        $sql = "INSERT INTO orden_detalle (Desc_Item, Cnt_Item, Pre_Item, Tot_Item, Iva_Item, isv_Item, tot_Isv, Ord_Num) values ('$descripcion', $cantidad, $precio, $subtotal, $ivaItem2,  0 , $subtotal, $ord_Num)";
        $query = mysqli_query($con, $sql);

        if($query){
          echo '<script>';
          echo 'Swal.fire({';
              echo 'icon: "success",';
              echo 'title: "Guardado Correctamente",';
              echo 'text: "El item se ha agregado correctamente",';
            echo '}).then(function(){';
              ?>
                window.location = "../editar_ordenes.php?id_orden=" + <?php echo $ord_Num?>;
              <?php 
           echo '})';
          echo '</script>';
        }

    }
}

if(isset($_POST['Guardar2'])){
  $descripcion = $_REQUEST['desc_orden'];
  $cantidad = $_REQUEST['cant_orden'];
  $precio = $_REQUEST['precio_item'];
  $subtotal = $cantidad * $precio;
  $ivaItem = 1;
  $ivaItem2 = 0;

      //Si el item trae impuesto
      if(isset ($_REQUEST['isv_item'])){
        $impuesto1 =$_REQUEST[ 'isv_item'];
        $impuesto = $impuesto1 / 100;
        $totalItem = ($subtotal * $impuesto) + $subtotal;
      }

      $query2 = "INSERT INTO orden (Fecha, Id_Prov, Id_Tip_pag, Id_User, Id_Pres, Observaciones, Id_Reglon, Desc_Orden, Pagado, total_orden) values('2020-06-08 00:00:00', 12, 1, 1, 2,'No hay observaciones.',10, 'Pago por fletes.', 0, 0.00);";
      $query2 = mysqli_query($con, $query2);

      //Seleccionar ultimo item de la orden

      $orden = "SELECT Ord_Num + 1 as Numero from orden order by Ord_Num DESC limit 1";
      $queryorden = mysqli_query($con, $orden);
      while($row = mysqli_fetch_array($queryorden)){
        $orden = $row;
      }

      if($query2){
        $sql = "INSERT INTO orden_detalle (Desc_Item, Cnt_Item, Pre_Item, Tot_Item, Iva_Item, isv_Item, tot_Isv, Ord_Num) values ('$descripcion', $cantidad, $precio, $subtotal, $ivaItem,  $impuesto1, $totalItem, ".$orden['Numero'].")";
        $query = mysqli_query($con, $sql);
        echo '<script>';
        echo 'Swal.fire({';
            echo 'icon: "success",';
            echo 'title: "Guardado Correctamente",';
            echo 'text: "El item se ha agregado correctamente",';
          echo '}).then(function(){';
            ?>
              window.location = "../dashboard.php" ;
            <?php 
         echo '})';
        echo '</script>';
      }

}

