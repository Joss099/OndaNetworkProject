<?php 

    include("conexion.php");
    $salida = "";
    $sql4 = "SELECT orden.Ord_Num, Num_Item, date_format(Fecha, '%d-%m-%Y') as Fecha, Desc_Item, Cnt_Item, Tot_Item, Nom_Prov, Nom_User, Desc_Orden from orden inner join proveedores on proveedores.id_Prov = orden.Id_Prov inner join orden_detalle on orden_detalle.Ord_Num = orden.Ord_Num inner join usuarios on usuarios.id = orden.Id_User inner join reglon_presupuestario on reglon_presupuestario.Id_Reglon = orden.Id_Reglon";
    if(isset($_POST['consulta'])){
    $q = $con->real_escape_string($_POST['consulta']);
    //Se inserta el parametro en la nueva busqueda
    $sql4 = "SELECT orden.Ord_Num,Num_Item, date_format(Fecha, '%d-%m-%Y') as Fecha, Desc_Item, Cnt_Item, Tot_Item, Nom_Prov, Nom_User, Desc_Orden from orden inner join proveedores on proveedores.id_Prov = orden.Id_Prov inner join orden_detalle on orden_detalle.Ord_Num = orden.Ord_Num inner join usuarios on usuarios.id = orden.Id_User inner join reglon_presupuestario on reglon_presupuestario.Id_Reglon = orden.Id_Reglon WHERE Desc_Item LIKE '%".$q."%' OR Nom_User LIKE '%".$q."%' OR Nom_Prov LIKE '%".$q."%'";
    }
    session_start(); 
    if($usuario = isset($_SESSION['username'])){
        $result = $con->query($sql4);

        if($result->num_rows > 0){
            $salida.= "<table class='table tabla-ordenes' id='ordenes-table'>
            <thead class='' style='background-color: rgb(26,54,78); color: white;'>
            <tr>
            <th class='text-center' scope='col'>Fecha</th>
            <th class='text-center' scope='col'>Descripcion</th>
            <th class='text-center' scope='col'>Proveedor</th>
            <th class='text-center' scope='col'>Encargado</th>
            <th class='text-center' scope='col'>Descripcion Orden</th>
            <th class='text-center' scope='col'>Ver</th>
            </thead>
            <tbody>";
    
            while($fila = $result->fetch_assoc()){
                $salida.="<tr>
                            <td style='width: 100px; font-size: 13px' class='text-center'>".$fila['Fecha']."</td>
                            <td style='font-size: 15px; width:350px' class='text-center'>".$fila['Desc_Item']."</td>
                            <td style='font-size: 15px' class='text-center'>".$fila['Nom_Prov']."</td>
                            <td style='font-size: 15px' class='text-center'>".$fila['Nom_User']."</td>
                            <td style='font-size: 15px' class='text-center'>".$fila['Desc_Orden']."</td>
                            <td class='text-center'><a href='editar_ordenes.php?id_orden=".base64_encode($fila['Num_Item'])."' class='btn btn-primary'><i class='fa fa-thin fa-eye'fa ></i></a>
                            </tr>";
            }     
    
            $salida.="</tbody></table>";
        }else{
            $salida.="No se encontraron ordenes.";
        }    
        
        echo $salida;
    }else{

        $result = $con->query($sql4);

        if($result->num_rows > 0){
            $salida.= "<table class='table tabla-ordenes' id='ordenes-table'>
            <thead class='' style='background-color: rgb(26,54,78); color: white;'>
            <tr>
            <th class='text-center' scope='col'>Fecha</th>
            <th class='text-center' scope='col'>Descripcion</th>
            <th class='text-center' scope='col'>Proveedor</th>
            <th class='text-center' scope='col'>Encargado</th>
            <th class='text-center' scope='col'>Descripcion Orden</th>
            <th class='text-center' scope='col'>Ver</th>
            </thead>
            <tbody>";
    
            while($fila = $result->fetch_assoc()){
                $salida.="<tr>
                            <td style='width: 100px; font-size: 13px' class='text-center'>".$fila['Fecha']."</td>
                            <td style='font-size: 15px; width:350px' class='text-center'>".$fila['Desc_Item']."</td>
                            <td style='font-size: 15px' class='text-center'>".$fila['Nom_Prov']."</td>
                            <td style='font-size: 15px' class='text-center'>".$fila['Nom_User']."</td>
                            <td style='font-size: 15px' class='text-center'>".$fila['Desc_Orden']."</td>
                            <td class='text-center'><a href='editar_ordenes.php?id_orden=".base64_encode($fila['Num_Item'])."' class='btn btn-primary'><i class='fa fa-thin fa-eye'fa ></i></a>
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