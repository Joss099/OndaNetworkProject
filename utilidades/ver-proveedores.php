<?php 

    include("conexion.php");
    $salida = "";
    $sql = "SELECT id_Prov, Nom_Prov, Cont_Prov, Tel_Prov from proveedores order by Cont_Prov desc";
    if(isset($_POST['consulta'])){
    $q = $con->real_escape_string($_POST['consulta']);
    //Se inserta el parametro en la nueva busqueda
    $sql = "SELECT id_Prov, Nom_Prov, Cont_Prov, Tel_Prov from proveedores WHERE Nom_Prov LIKE '%".$q."%' OR Cont_Prov LIKE '%".$q."%'";
    }

    $result = $con->query($sql);

    if($result->num_rows > 0){
        $salida.= "<table class='table tabla-ordenes' id='ordenes-table'>
        <thead class='' style='background-color: rgb(26,54,78); color: white;'>
        <tr>
        <th class='text-center' scope='col'>#</th>
        <th class='text-center' scope='col'>Proveedor</th>
        <th class='text-center' scope='col'>Contacto</th>
        <th class='text-center' scope='col'>Telefono</th>
        <th class='text-center' scope='col'>Acciones</th>
        </thead>
        <tbody>";

        while($fila = $result->fetch_assoc()){
            $salida.="<tr>
                        <td class='text-center'>".$fila['id_Prov']."</td>
                        <td class='text-center' style='width: 500px'>".$fila['Nom_Prov']."</td>
                        <td class='text-center'>".$fila['Cont_Prov']."</td>
                        <td class='text-center'>".$fila['Tel_Prov']."</td>
                        <td class='text-center'><a href='proveedores.php?id=".base64_encode($fila['id_Prov'])."' class='btn btn-primary'><i class='fas fa-pencil-alt text-white'></i></a>
                        <a href='proveedores.php?id_proveedor=".base64_encode($fila['id_Prov'])."' class='btn btn-danger'><i class='fas fa-trash' onclick='eliminar();'></i></a></td>
                        </tr>";
        }     

        $salida.="</tbody></table>";
    }else{
        $salida.="No se encontraron datos.";
    }    
    
    echo $salida;
    mysqli_close($con);
    ?>

    <?php 
    
    
    ?>