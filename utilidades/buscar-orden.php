<?php 

    include("conexion.php");
    $salida = "";
    $sql4 = "SELECT * FROM ondaorden.orden_detalle order by Num_Item;";
    if(isset($_POST['consulta'])){
    $q = $con->real_escape_string($_POST['consulta']);
    //Se inserta el parametro en la nueva busqueda
    $sql4 = "SELECT * FROM ondaorden.orden_detalle WHERE Desc_Item LIKE '%".$q."%' OR Num_Item LIKE '%".$q."%' ";
    }
    session_start(); 
    if($usuario = isset($_SESSION['username'])){
        $result = $con->query($sql4);

        if($result->num_rows > 0){
            $salida.= "<table class='table tabla-ordenes' id='ordenes-table'>
            <thead class='' style='background-color: rgb(26,54,78); color: white;'>
            <tr>
            <th class='text-center' scope='col'>#</th>
            <th class='text-center' style='width: 400px' scope='col'>Descripcion</th>
            <th class='text-center' scope='col'>Cantidad</th>
            <th class='text-center' scope='col'>Precio</th>
            <th class='text-center' scope='col'>Total</th>
            <th class='text-center' scope='col'>Orden</th>
            <th class='text-center' scope='col'>Acciones</th>
            </thead>
            <tbody>";
    
            while($fila = $result->fetch_assoc()){
                $salida.="<tr>
                            <td class='text-center'>".$fila['Num_Item']."</td>
                            <td class='text-center'>".$fila['Desc_Item']."</td>
                            <td class='text-center'>".$fila['Cnt_Item']."</td>
                            <td class='text-center'>".$fila['Pre_Item']."</td>
                            <td class='text-center'>".$fila['Tot_Item']."</td>
                            <td class='text-center'>".$fila['Ord_Num']."</td>
                            <td class='text-center'><a href='editar_detalle.php?id_orden=".base64_encode($fila['Num_Item'])."' class='btn btn-primary'><i class='fas fa-pencil-alt text-white'></i></a>
                            <a href='utilidades/eliminar-orden.php?id_orden=".$fila['Num_Item']."' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>
                            </tr>";
            }     
    
            $salida.="</tbody></table>";
        }else{
            $salida.="No se encontraron ordenes.";
        }    
        
        echo $salida;
    }

    else{
        $result = $con->query($sql4);

        if($result->num_rows > 0){
            $salida.= "<table class='table tabla-ordenes' id='ordenes-table'>
            <thead class='' style='background-color: rgb(26,54,78); color: white;'>
            <tr>
            <th class='text-center' scope='col'>#</th>
            <th class='text-center' style='width: 400px' scope='col'>Descripcion</th>
            <th class='text-center' scope='col'>Cantidad</th>
            <th class='text-center' scope='col'>Precio</th>
            <th class='text-center' scope='col'>Total</th>
            <th class='text-center' scope='col'>Orden</th>
            </thead>
            <tbody>";
    
            while($fila = $result->fetch_assoc()){
                $salida.="<tr>
                            <td class='text-center'>".$fila['Num_Item']."</td>
                            <td class='text-center'>".$fila['Desc_Item']."</td>
                            <td class='text-center'>".$fila['Cnt_Item']."</td>
                            <td class='text-center'>".$fila['Pre_Item']."</td>
                            <td class='text-center'>".$fila['Tot_Item']."</td>
                            <td class='text-center'>".$fila['Ord_Num']."</td>
                            </tr>";
            }     
    
            $salida.="</tbody></table>";
        }else{
            $salida.="No se encontraron ordenes.";
        }    
        
        echo $salida;
    }
 
    mysqli_close($con);
    ?>