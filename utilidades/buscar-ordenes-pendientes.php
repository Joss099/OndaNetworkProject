<?php 

    include("conexion.php");
    $salida = "";
    $sql4 = "SELECT orden.Ord_Num,date_format(Fecha, '%d-%m-%Y') as Fecha, Desc_Orden, Nom_User,Nom_Prov from orden inner join usuarios on usuarios.id = orden.Id_User inner join proveedores on proveedores.id_Prov = orden.Id_Prov where Pagado = 0 order by orden.Ord_Num Desc;";
    if(isset($_POST['consulta'])){
    $q = $con->real_escape_string($_POST['consulta']);
    //Se inserta el parametro en la nueva busqueda
    $sql4 = "SELECT orden.Ord_Num,date_format(Fecha, '%d-%m-%Y') as Fecha, Desc_Orden, Nom_User,Nom_Prov from orden inner join usuarios on usuarios.id = orden.Id_User inner join proveedores on proveedores.id_Prov = orden.Id_Prov WHERE Nom_User LIKE '%".$q."%' AND Pagado = 0 OR Nom_Prov LIKE '%".$q."%' AND Pagado = 0 OR orden.Ord_Num LIKE '%".$q."%' AND Pagado = 0";
    }
    session_start(); 
    if($usuario = isset($_SESSION['username']) || $usuario = isset($_SESSION['username-2']) || $usuario = isset($_SESSION['username-3']) ){
        $result = $con->query($sql4);

        if($result->num_rows > 0){
            $salida.= "<table class='table tabla-ordenes' id='ordenes-table'>
            <thead class='' style='background-color: rgb(26,54,78); color: white;'>
            <tr>
            <th class='text-center' scope='col'>No.</th>
            <th class='text-center' scope='col'>Encargado</th>
            <th class='text-center' scope='col'>Proveedor</th>
            <th class='text-center' scope='col'>Fecha</th>
            <th class='text-center' scope='col'>Descripcion Orden</th>
            <th class='text-center' scope='col'>Ver</th>
            </thead>
            <tbody>";
    
            while($fila = $result->fetch_assoc()){
                $salida.="<tr>
                            <td style='width: 100px; font-size: 12px' class='text-center'>".$fila['Ord_Num']."</td>
                            <td style='width:240px ; font-size: 14px' class='text-center'>".$fila['Nom_User']."</td>
                            <td style='width:320px; font-size: 13px' class='text-center'>".$fila['Nom_Prov']."</td>
                            <td style='width: 100px; font-size: 12px' class='text-center'>".$fila['Fecha']."</td>
                            <td style='font-size: 13px' class='text-center'>".$fila['Desc_Orden']."</td>
                            <td class='text-center'><a href='editar_ordenes.php?id_orden=".base64_encode($fila['Ord_Num'])."' class='btn btn-primary'><i class='fa fa-money-bill'></i></a>
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
