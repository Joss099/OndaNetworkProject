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

$sql2="SELECT * FROM usuarios";
$query2=mysqli_query($con,$sql2);

while($row = mysqli_fetch_array($query2)){
  $result = $row;
}

if(isset($_POST['Guardar'])){
    $nombre = $_REQUEST['nombre_usuario'];
    $usuario = $_REQUEST['usuario'];
    $encriptarPass=crypt($_REQUEST["pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
    $foto = "img/undraw_profile.svg";
    $rol = $_REQUEST['rol-usuario'];

    if(empty($nombre) || empty($usuario) || empty($encriptarPass) || empty($rol)){
        echo '<script>
        Swal.fire({
            icon: "error",
            title: "Espera...",
            text: "Debes llenar todos los datos!",
          }).then(function(){
            window.location = "../usuarios.php";
          })
        </script>'; 
    }

    elseif($result['Usuario'] == $usuario){
      echo '<script>
      Swal.fire({
          icon: "info",
          title: "Espera...",
          text: "Parece que este usuario ya existe",
        }).then(function(){
          window.location = "../usuarios.php";
        })
      </script>';
    }
    else{      
        $sql="INSERT INTO ondaorden.usuarios VALUES (NULL, '$nombre', '$usuario', '$encriptarPass', '$foto', '$rol');";
        $query=mysqli_query($con,$sql);

        echo '<script>
        Swal.fire({
            icon: "success",
            title: "Guardado Correctamente",
            text: "El usuario ha sido registrado.",
          }).then(function(){
            window.location = "../usuarios.php";
          })
        </script>'; 

       
    }

}else{

  echo '<script>
        Swal.fire({
            icon: "error",
            title: "No se guardo",
            text: "No se pudo registrar el usuario.",
          }).then(function(){
            window.location = "../usuarios.php";
          })
        </script>'; 
    
}


?>