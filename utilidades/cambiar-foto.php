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

$id_usuario =base64_decode($_GET['id_usuaro']);
$foto = base64_decode($_GET['foto_usuario']);
$sql = "UPDATE usuarios SET foto = '$foto' where id = $id_usuario";
$query = mysqli_query($con, $sql);

if ($query) {
    echo '<script>
      Swal.fire({
          icon: "success",
          title: "Actualizado",
          text: "Tu avatar ha sido actualizado",
        }).then(function(){
          window.location = "../dashboard.php";
        })
      </script>';
  }

?>