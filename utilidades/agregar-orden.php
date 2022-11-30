<?php

include("conexion.php");
//Datos para la tabla ondaorde.orden
$no_orden = $_REQUEST['no_orden'];
$fecha = $_REQUEST['fecha'];
$proveedor = $_REQUEST['proveedor'];
$pago = $_REQUEST['pago'];
$responsable = base64_decode($_REQUEST['id_usuario']);
$presupuesto = $_REQUEST['presupuesto'];
$observaciones = $_REQUEST['observaciones'];
$reglon = $_REQUEST['reglon'];
$descripcion = $_REQUEST['descripcion2'];

$descripcion22 = $_POST['DESCRIPCION'] ?? [];
$cantidad = $_POST['CANTIDAD'] ?? [];
$precio = $_POST['PRECIO'] ?? [];
$impuesto = $_POST['IMPUESTO'] ?? [];
$errores = [];

//Evaluar si el total de la orden es menor al total del reglon seleccionado
$evaluar_reglon = "SELECT * FROM asignacion_presupuesto WHERE id_reglon = $reglon ORDER BY total_pres DESC limit 1";
$evaluacion_reglon  = mysqli_query($con, $evaluar_reglon);
while ($row = mysqli_fetch_array($evaluacion_reglon)) {
  $evaluar = $row;
}
$total_orden = 0;
for ($y = 0; $y < count($cantidad); $y++) {
  $total_orden = $total_orden + ($cantidad[$y] * $precio[$y]);
}

//Inicio de 
if ($total_orden <= $evaluar['total_pres']) {
  //Insertar primero los datos de la orden 
  $orden = "INSERT INTO orden (Ord_Num, Fecha, Id_Prov, Id_Tip_pag, Id_User, Id_Pres, Observaciones, Id_Reglon, Desc_Orden, Pagado, total_orden ) values($no_orden,'$fecha', $proveedor, $pago , $responsable, $presupuesto,'$observaciones',$reglon, '$descripcion', 0, 0)";
  $query1 = mysqli_query($con, $orden);

  //Si se inserta la orden se agregan los items
  if ($query1) {
    for ($i = 0; $i < count($descripcion22); $i++) {
      $descripcion_item = $descripcion22[$i];
      $cantidad_item = $cantidad[$i];
      $precio_item = $precio[$i];
      $impuesto_item = $impuesto[$i];
      //Insercion de los datos de la tabla de orden_detalle
      $sql = "INSERT INTO orden_detalle (Desc_Item, Cnt_Item, Pre_Item, Tot_Item, Iva_Item, isv_Item, tot_Isv, Ord_Num) values ('$descripcion_item', $cantidad_item, $precio_item,10, 0, $impuesto_item, 59, $no_orden )";
      $query2 = mysqli_query($con, $sql);
      $errores = 0;
    }

    if ($query2) {

      $total_orden = 0;
      $total_ordenisv = 0;
      for ($y = 0; $y < count($cantidad); $y++) {
        $total_orden = $total_orden + ($cantidad[$y] * $precio[$y]);
      }

      //Total de los items sin impuesto
      $update_total_item = "UPDATE orden_detalle set Tot_Item = (Cnt_Item * Pre_Item) where Ord_Num = $no_orden";
      $total_item = mysqli_query($con, $update_total_item);
      //Una vez se calcule el total del item- que se calcule el total con ISV
      if ($total_item) {
        $update_total_isv = "UPDATE orden_detalle set tot_Isv = (Tot_Item * (isv_Item/100) + Tot_Item)";
        $tot_isv = mysqli_query($con, $update_total_isv);
        if ($tot_isv) {
          //Actualizar total de la orden 
          $insert_total_orden = "UPDATE orden, (SELECT SUM(tot_Isv) as mysum FROM orden_detalle where Ord_Num = $no_orden) t set total_orden = mysum where Ord_Num = $no_orden";
          $update_total_orden = mysqli_query($con, $insert_total_orden);

          //Restar total de la orden al reglon seleccionado
          if ($update_total_orden) {
            $total_orden2 = "SELECT * FROM orden where Ord_Num = $no_orden";
            $valor_total = mysqli_query($con, $total_orden2);
            while($row = mysqli_fetch_array($valor_total)){
              $valor = $row;
            }

            $total_orden_resta = $valor['total_orden'];
            
            $reglon_actual = $evaluar['total_pres'];
            $update_total_reglon = "UPDATE asignacion_presupuesto SET total_pres = ($reglon_actual - $total_orden_resta) WHERE id_reglon = $reglon AND estado = 0";
            $update_total_reglon2 = mysqli_query($con, $update_total_reglon);

            if ($update_total_reglon2) {
              //Selecciona el ultimo valor del reglon utilizado
              $query3 = mysqli_query($con, "SELECT * FROM asignacion_presupuesto WHERE id_reglon = $reglon ORDER BY total_pres DESC limit 1");
              while ($row = mysqli_fetch_array($query3)) {
                $reglon_tot = $row;
              }
              //Sil el total del reglon llega a cero cambia el estado a 1 
              if ($reglon_tot['total_pres'] == 0) {
                mysqli_query($con, "UPDATE asignacion_presupuesto SET estado = 1 where id_reglon = $reglon and estado = 0");
              }
            }
          }
        }
      }
    }
  }
}
if ($errores == 0) {
  echo json_encode(['respuesta' => true]);
} else {
  echo json_encode(['respuesta' => false]);
}
