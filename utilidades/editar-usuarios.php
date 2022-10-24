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

$id = base64_decode($_GET['id_usuario']);
$nombre = $_REQUEST['nombre_usuario'];
$usuario = $_REQUEST['usuario'];
$pass = $_REQUEST['contra'];
$foto = "img/undraw_profile.svg";
$rol = $_REQUEST['rol-usuario'];

$sql2 = "SELECT id, Nom_User, Usuario, Pass, rol from usuarios where id = $id";
$query2 = mysqli_query($con, $sql2);
$row = mysqli_fetch_array($query2);

if (!empty($id) && !empty($nombre) && !empty($usuario) && !empty($pass) && !empty($rol)) {
  //Cuando el password del input es igual al de la base de datos
  if ($row['Pass'] == $pass) {
    $sql = "UPDATE usuarios SET Nom_User='$nombre', Usuario = '$usuario', Pass = '$pass', foto = '$foto', rol='$rol' WHERE id=$id;";
    $query = mysqli_query($con, $sql);

    //Cuando la contraseña es diferente a la de la base de datos
  } elseif ($row['Pass'] != $pass) {
    $pass = $encriptarPass2 = crypt($pass, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
    $sql = "UPDATE usuarios SET Nom_User='$nombre', Usuario = '$usuario', Pass = '$encriptarPass2', foto = '$foto', rol='$rol' WHERE id=$id;";
    $query = mysqli_query($con, $sql);
  }
}

if ($query) {
  echo '<script>
    Swal.fire({
        icon: "success",
        title: "Actualizado",
        text: "El usuario se ha actualizado correctamente",
      }).then(function(){
        window.location = "../visualizar_usuarios.php";
      })
    </script>';
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