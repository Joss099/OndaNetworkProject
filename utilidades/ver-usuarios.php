<?php 

    include("conexion.php");
    $salida = "";
    $sql = "SELECT id, Nom_User, Usuario, nom_rol FROM usuarios inner join roles on roles.id_roles = usuarios.rol order by id;";
    if(isset($_POST['consulta'])){
    $q = $con->real_escape_string($_POST['consulta']);
    //Se inserta el parametro en la nueva busqueda
    $sql = "SELECT id, Nom_User, Usuario, nom_rol FROM usuarios inner join roles on roles.id_roles = usuarios.rol WHERE Nom_User LIKE '%".$q."%' OR Usuario LIKE '%".$q."%' OR nom_rol LIKE '%".$q."%'";
    }

    $result = $con->query($sql);

    if($result->num_rows > 0){
        $salida.= "<table class='table tabla-ordenes' id='ordenes-table'>
        <thead class='' style='background-color: rgb(26,54,78); color: white;'>
        <tr>
        <th class='text-center' scope='col'>#</th>
        <th class='text-center' scope='col'>Nombre</th>
        <th class='text-center' scope='col'>Usuario</th>
        <th class='text-center' scope='col'>Rol</th>
        <th class='text-center' scope='col'>Acciones</th>
        </thead>
        <tbody>";

        while($fila = $result->fetch_assoc()){
            $salida.="<tr>
                        <td class='text-center'>".$fila['id']."</td>
                        <td class='text-center' style='width: 500px'>".$fila['Nom_User']."</td>
                        <td class='text-center'>".$fila['Usuario']."</td>
                        <td class='text-center'>".$fila['nom_rol']."</td>
                        <td class='text-center'><a href='visualizar_usuarios.php?id=".base64_encode($fila['id'])."' class='btn btn-primary'><i class='fas fa-pencil-alt text-white'></i></a>
                        <a href='visualizar_usuarios.php?id_usuario=".base64_encode($fila['id'])."' class='btn btn-danger'><i class='fas fa-trash' onclick='eliminar();'></i></a></td>
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