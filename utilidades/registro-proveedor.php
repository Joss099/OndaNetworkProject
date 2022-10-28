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
    $proveedor = $_REQUEST['nom_proveedor'];
    $contacto = $_REQUEST['contacto'];
    $telefono = $_REQUEST['telefono'];

    if(empty($proveedor) || empty($contacto) || empty($telefono)){
        echo '<script>
        Swal.fire({
            icon: "error",
            title: "Espera...",
            text: "Debes llenar todos los datos!",
          }).then(function(){
            window.location = "../proveedores.php";
          })
        </script>'; 
    }
    else{
        $sql="INSERT INTO ondaorden.proveedores VALUES (NULL, '$proveedor', '$contacto', '$telefono');";
        $query=mysqli_query($con,$sql);

        echo '<script>
        Swal.fire({
            icon: "success",
            title: "Guardado Correctamente",
            text: "El proveedor ha sido registrado.",
          }).then(function(){
            window.location = "../proveedores.php";
          })
        </script>'; 

       
    }

}else{
    
}


?>