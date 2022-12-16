<?php 

$cantidad = $_POST['CANTIDAD'] ?? [];
$precio = $_POST['PRECIO'] ?? [];
    
$total_orden = 0;
for ($y = 0; $y < count($cantidad); $y++) {
  $total_orden = $total_orden + ($cantidad[$y] * $precio[$y]);
}
echo '<br>';
echo 'Total de la orden: ', $total_orden;

?>