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

$id = $_GET['id_usuario'];


$sql = "DELETE FROM usuarios WHERE id = $id";
$query=mysqli_query($con,$sql);

if($query){
    echo '<script>
    Swal.fire({
        icon: "warning",
        title: "Eliminado",
        text: "El usuario ha sido eliminado correctamente",
      }).then(function(){
        window.location = "../visualizar_usuarios.php";
      })
    </script>'; 
} else{

    echo '<script>
    Swal.fire({
        icon: "error",
        title: "Ups",
        text: "No se ha podido eliminar el usuario",
      }).then(function(){
        window.location = "../visualizar_usuarios.php";
      })
    </script>'; 

}

?>