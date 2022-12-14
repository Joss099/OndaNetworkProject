<?php
error_reporting(E_ALL ^ E_WARNING);
error_reporting(0);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

session_start();
if (isset($_SESSION['username'])) {
    $usuario = $_SESSION['username'];
} elseif (isset($_SESSION['username-2'])) {
    $usuario3 = $_SESSION['username-2'];
}

include("utilidades/conexion.php");

if (!empty($id)) {
    header("location:login.php");
}

if (isset($_SESSION['username'])) {
    $sql = "SELECT * from usuarios where Usuario = '$usuario'";
    $query = mysqli_query($con, $sql);
    while ($row4 = mysqli_fetch_array($query)) {
        $result = $row4;
    }
} elseif (isset($_SESSION['username-2'])) {
    $sql = "SELECT * from usuarios where Usuario = '$usuario3'";
    $query = mysqli_query($con, $sql);
    while ($row4 = mysqli_fetch_array($query)) {
        $result = $row4;
    }
}

$id = base64_decode($_REQUEST['id']);
$sql = "SELECT * from usuarios where id = $id";
$query = mysqli_query($con, $sql);

?>
<!-- Recorrer todos los regiistros -->

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Onda Network</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" href="./img/logo.png">
    <link rel="stylesheet" href="css/ordenes.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary-2 sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <br>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" style="cursor:pointer" href="dashboard.php">
                <div class="sidebar-brand-icon">
                    <img src="./img/logo.png" alt="Logo" style="width: 120px; margin: 20px;"">
                </div>
                <!-- <div class=" sidebar-brand-text mx-3">Onda Network
                </div> -->
            </a>

            <!-- Divider -->
            <br>
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Acciones
            </div>

            <li class="nav-item" id="ordenes-master">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-business-time"></i>
                    <span>Ordenes Pendientes</span>
                </a>
                <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="ordenes_pendientes.php"> Ordenes Pendientes</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-paperclip"></i>
                    <span>Ordenes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="agregar_orden.php">Ingresar Orden</a>
                        <a class="collapse-item" href="dashboard.php">Ver Ordenes</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->

            <li class="nav-item" id="proveedores-op">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
                    <i class="fas fa-solid fa-box-open"></i>
                    <span>Proveedores</span>
                </a>
                <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="proveedores.php">Ver Proveedores</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider" id="linea-op">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" id="usuarios-op">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-duotone fa-users"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="usuarios.php">Ver Usuarios</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h4 class=" mb-0 text-gray-800">Perfil de Usuario</h4>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                while ($row = mysqli_fetch_array($query)) {
                                ?>

                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['Nom_User'] ?></span>
                                    <img class="img-profile rounded-circle" src="<?php echo $row['foto'] ?>">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Content Row -->
                    <div class="row">
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                    </div>

                    <!-- Datos del usuario -->

                    <div class="card shadow mb-4 usuario-st" style="padding: 2rem 25rem 6rem 25rem">
                        <div>
                            <form action="utilidades/editar-usuario.php?id_usuario=<?php echo $row['id'] ?>" method="POST">
                                <div class="form-group">
                                    <img src="<?php echo $row['foto'] ?>" width="90px" alt="">
                                </div>
                                <a href="" style="text-decoration: none" data-toggle="modal" data-target="#exampleModalCenter">Cambiar avatar</a><br>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre Completo</label>
                                    <input value="<?php echo $row['Nom_User'] ?>" type="text" class="form-control perfil" name="nombre_usuario" id="nombre_usuario" aria-describedby="emailHelp" disabled autocomplete="off">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nombre de Usuario</label>
                                    <input value="<?php echo $row['Usuario'] ?>" type="text" class="form-control perfil" name="usuario" id="usuario" autocomplete="off" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contrase??a</label>
                                    <input type="password" class="form-control perfil" name="contra" value="<?php echo $row['Pass']; ?>" id="contra" disabled>
                                </div>
                            <?php } ?>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="habilitar();">
                                <label class="form-check-label" for="exampleCheck1">Editar campos</label>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" id="guardar" disabled>Guardar</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Onda Network 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">??Quieres cerrar sesion?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesi??n" a continuaci??n si est?? listo para finalizar su sesi??n actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="utilidades/salir.php">Cerrar Sesion</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Script para editar usuarios -->

    <script>
        function habilitar() {
            var check = document.getElementById('exampleCheck1');
            if (check.checked) {
                document.getElementById('nombre_usuario').disabled = false;
                document.getElementById('usuario').disabled = false;
                document.getElementById('contra').disabled = false;
                document.getElementById('guardar').disabled = false;

            } else {
                document.getElementById('nombre_usuario').disabled = true;
                document.getElementById('usuario').disabled = true;
                document.getElementById('contra').disabled = true;
                document.getElementById('guardar').disabled = true;
            }
        }
    </script>

    <script>
        <?php
        if ($result['rol'] == 1) {
        ?>
            document.getElementById('usuarios-op').style.display = "block";
            document.getElementById('ordenes-master').style.display = "block";
            document.getElementById('proveedores-op').style.display = "block";
            document.getElementById('orden-detalle-op').style.display = "block";
            document.getElementById('linea-op').style.display = "block";

        <?php } elseif ($result['rol'] == 2) {
        ?>
            document.getElementById('usuarios-op').style.display = "none";
            document.getElementById('ordenes-master').style.display = "none";
            document.getElementById('proveedores-op').style.display = "none";
            document.getElementById('orden-detalle-op').style.display = "none";
            document.getElementById('linea-op').style.display = "none";

        <?php }
        ?>
    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Selecciona tu avatar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="grid-avatar">
                        <div class="avatar6"><a href="utilidades/cambiar-foto.php?foto_usuario=<?php echo base64_encode(' img/undraw_profile_5.png') ?>&id_usuaro=<?php echo base64_encode($id) ?>"><img class="avatar" src="img/undraw_profile_5.png" alt=""></a></div>
                        <div class="avatar2"><a href="utilidades/cambiar-foto.php?foto_usuario=<?php echo base64_encode(' img/undraw_profile_1.svg') ?>&id_usuaro=<?php echo base64_encode($id) ?>"><img class="avatar" src="img/undraw_profile_1.svg" alt=""></a></div>
                        <div class="avatar5"><a href="utilidades/cambiar-foto.php?foto_usuario=<?php echo base64_encode('img/undraw_profile_4.png') ?>&id_usuaro=<?php echo base64_encode($id) ?>"><img class="avatar" src="img/undraw_profile_4.png" alt=""></a></div>
                        <div class="avatar3"><a href="utilidades/cambiar-foto.php?foto_usuario=<?php echo base64_encode('img/undraw_profile_2.svg') ?>&id_usuaro=<?php echo base64_encode($id) ?>"><img class="avatar" src="img/undraw_profile_2.svg" alt=""></a></div>
                        <div class="avatar1"><a href="utilidades/cambiar-foto.php?foto_usuario=<?php echo base64_encode(' img/undraw_profile_6.png') ?>&id_usuaro=<?php echo base64_encode($id) ?>"><img class="avatar" src="img/undraw_profile_6.png" alt=""></a></div>
                        <div class="avatar4"><a href="utilidades/cambiar-foto.php?foto_usuario=<?php echo base64_encode(' img/undraw_profile_3.svg') ?>&id_usuaro=<?php echo base64_encode($id) ?>"><img class="avatar" src="img/undraw_profile_3.svg" alt=""></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>