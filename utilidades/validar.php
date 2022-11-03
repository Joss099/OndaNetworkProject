<!------------------------------------------------------------- -->
<!----------------VALIDACION DE CREDENCIALES--------------------->
<!------------------------------------------------------------- -->

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
require 'conexion.php';

$usuario = $_POST['usuario'];
$encriptarPass=crypt($_POST["contra"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

$query = "SELECT * FROM usuarios where Usuario = '$usuario' and Pass = '$encriptarPass'";
$consulta = mysqli_query($con, $query);

$array = mysqli_fetch_array($consulta);

if(!isset($array)){
    echo '<script>
        Swal.fire({
            icon: "error",
            title: "ups...",
            text: "No hemos encontrado el usuario",
          }).then(function(){
            window.location = "../login.php";
          })
        </script>'; 
}
/*------------------------------------------------------------- -->
<!----------------VALIDACION DE ROL DE USUARIO-------------------->
<!---------------------------------------------------------------*/
else{
    //ADMINISTRADOR
if($array['rol']==1){
    session_start();
    $_SESSION['username'] = $usuario;
    echo '<script>
        Swal.fire({
            icon: "success",
            title: "Bienvenido",
            text: "'.$array['Nom_User'].'",
            timer: 1200
          }).then(function(){
            window.location = "../dashboard.php";
          })
        </script>'; 
}else
//Usuario Normal
if($array['rol']==2){
    $usuario2 =  $usuario;
    session_start();
    $_SESSION['username-2'] = $usuario2;
    echo '<script>
        Swal.fire({
            icon: "success",
            title: "Bienvenido",
            text: "'.$array['Nom_User'].'",
            timer: 1200
          }).then(function(){
            window.location = "../dashboard.php";
          })
        </script>'; 
}
else 
if($array['rol']==3){
  $usuario3 =  $usuario;
  session_start();
  $_SESSION['username-3'] = $usuario3;
  echo '<script>
      Swal.fire({
          icon: "success",
          title: "Bienvenido",
          text: "'.$array['Nom_User'].'",
          timer: 1200
        }).then(function(){
          window.location = "../dashboard.php";
        })
      </script>'; 
}
}
?>
    

