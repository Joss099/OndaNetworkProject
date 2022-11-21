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
$nombre = $_REQUEST['nombre_usuario'];
$usuario = $_REQUEST['usuario'];
$pass = $_REQUEST['contra'];
$foto = "img/undraw_profile.svg";

$sql2 = "SELECT id, Nom_User, Usuario, Pass, rol from usuarios where id = $id";
$query2 = mysqli_query($con, $sql2);
$row = mysqli_fetch_array($query2);

if (!empty($id) && !empty($nombre) && !empty($usuario) && !empty($pass)) {
  //Cuando el password del input es igual al de la base de datos
  if ($row['Pass'] == $pass) {
    $sql = "UPDATE usuarios SET Nom_User='$nombre', Usuario = '$usuario', Pass = '$pass', foto = '$foto' WHERE id=$id;";
    $query = mysqli_query($con, $sql);

    //Cuando el password es diferente al de la base de datos
  } elseif ($row['Pass'] != $pass) {
    $pass = $encriptarPass2 = crypt($pass, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
    $sql = "UPDATE usuarios SET Nom_User='$nombre', Usuario = '$usuario', Pass = '$encriptarPass2', foto = '$foto' WHERE id=$id;";
    $query = mysqli_query($con, $sql);
  }

}

if ($query) {
  if($row['rol']==1){
    session_start();
    $_SESSION['username'] = $usuario;
    echo '<script>
    Swal.fire({
        icon: "success",
        title: "Actualizado",
        text: "El usuario se ha actualizado correctamente",
      }).then(function(){
        window.location = "../dashboard.php";
      })
    </script>';
  }
  elseif($row['rol']==2){
    $usuario2 =  $usuario;
    session_start();
    $_SESSION['username-2'] = $usuario2;
    echo '<script>
    Swal.fire({
        icon: "success",
        title: "Actualizado",
        text: "El usuario se ha actualizado correctamente",
      }).then(function(){
        window.location = "../dashboard.php";
      })
    </script>';
  }
  elseif($row['rol']==3){
    $usuario3 =  $usuario;
    session_start();
    $_SESSION['username-3'] = $usuario3;
    echo '<script>
    Swal.fire({
        icon: "success",
        title: "Actualizado",
        text: "El usuario se ha actualizado correctamente",
      }).then(function(){
        window.location = "../dashboard.php";
      })
    </script>';
  }
 
} else {

  echo '<script>
    Swal.fire({
        icon: "error",
        title: "Ups",
        text: "No se ha podido actualizar el usuario",
      }).then(function(){
        window.location = "../perfil.php";
      })
    </script>';
}

?>