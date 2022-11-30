<?php

session_start();

if (isset($_SESSION['username'])) {
    $usuario = $_SESSION['username'];
} elseif (isset($_SESSION['username-2'])) {
    $usuario2 = $_SESSION['username-2'];
} elseif (isset($_SESSION['username-3'])) {
    $usuario3 = $_SESSION['username-3'];
}

//comprobacion de que exista una sesion activa
if (!isset($usuario) && !isset($usuario2) && !isset($usuario3)) {
    header("location:./login.php");
}

include("utilidades/conexion.php");
if (isset($_SESSION['username'])) {
    $sql = "SELECT * from usuarios where Usuario = '$usuario'";
    $query = mysqli_query($con, $sql);
    while ($row4 = mysqli_fetch_array($query)) {
        $result = $row4;
    }
} elseif (isset($_SESSION['username-2'])) {
    $sql = "SELECT * from usuarios where Usuario = '$usuario2'";
    $query = mysqli_query($con, $sql);
    while ($row4 = mysqli_fetch_array($query)) {
        $result = $row4;
    }
} elseif (isset($_SESSION['username-3'])) {
    $sql = "SELECT * from usuarios where Usuario = '$usuario3'";
    $query = mysqli_query($con, $sql);
    while ($row4 = mysqli_fetch_array($query)) {
        $result = $row4;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Onda Network</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" href="./img/logo.png">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/ordenes.css">

    <!-- Script datatables -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>


</head>

<body id="page-top">

    <div id="wrapper">
        <ul class="navbar-nav bg-primary-2 sidebar sidebar-dark accordion" id="accordionSidebar">
            <br>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                    <img src="./img/logo.png" alt="Logo" style="width: 120px; margin: 20px;"">
                </div>
            </a>
            <br>
            <hr class=" sidebar-divider my-0">

                    <!-- Nav Dashboard -->
                    <li class="nav-item active">
                        <a class="nav-link" href="">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Acciones
                    </div>

                    <!-- Nav Item - Utilities Collapse Menu -->
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

                              <li class="nav-item" id="presupuestos">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities4" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-coins"></i>
                            <span>Presupuestos</span>
                        </a>
                        <div id="collapseUtilities4" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Opciones:</h6>
                                <a class="collapse-item" href="presupuestos.php"> Asignar Presupuesto</a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-paperclip"></i>
                            <span>Ordenes</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Opciones:</h6>
                                <a class="collapse-item" href="agregar_orden.php">Agregar Orden</a>
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

                    <hr class="sidebar-divider d-none d-md-block">

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

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item" id="perfil-op">
                        <a class="nav-link collapsed" href="perfil.php" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-user"></i>
                            <span>Perfil</span>
                        </a>
                        <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Opciones:</h6>
                                <a class="collapse-item" href="perfil.php?id=<?php echo base64_encode($result['id']) ?>">Ver Perfil</a>
                            </div>
                        </div>
                    </li>
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

                    <!-- Barra de Busqueda -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" id="buscar-ordenes" class="form-control bg-light border-0 small" placeholder="Buscar orden..." aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
                            <div class="input-group-append">
                                <button class="btn btn-primary-2" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

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

                        <!-- Informacion del usuario que inicio sesion   -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Recorrer todos los regiistros -->
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $result['Nom_User'] ?></span>


                                <img class="img-profile rounded-circle" src="<?php echo $result['foto'] ?>">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="perfil.php?id=<?php echo base64_encode($result['id']) ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
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


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Ordenes Completadas</div>
                                            <?php
                                            $sql3 = "SELECT COUNT(*) AS ORDEN FROM orden where pagado = 1";
                                            $query3 = mysqli_query($con, $sql3);
                                            while ($row3 = mysqli_fetch_array($query3)) {
                                            ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row3['ORDEN'] ?></div>
                                            <?php
                                            } ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Ordenes Pendientes</div>
                                            <?php
                                            $sql3 = "SELECT COUNT(*) AS ORDEN FROM orden where Pagado = 0";
                                            $query3 = mysqli_query($con, $sql3);
                                            while ($row3 = mysqli_fetch_array($query3)) {
                                            ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row3['ORDEN'] ?></div>
                                            <?php
                                            } ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-business-time fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Usuarios Registrados</div>
                                            <!-- Consulta para el numero total de usuarios registrados -->
                                            <?php
                                            $sql2 = "SELECT COUNT(*) AS CUENTA FROM usuarios ";
                                            $query2 = mysqli_query($con, $sql2);
                                            while ($row2 = mysqli_fetch_array($query2)) {
                                            ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row2['CUENTA'] ?></div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                    </div>
                    <div class="card shadow mb-4">

                        <!-- ----------------------------------------------------------- -->
                        <!-- ----------------------------------------------------------- -->
                        <!-- ----------------------------------------------------------- -->
                        <!-- ----------------------------------------------------------- -->
                        <!-- ----------------------------------------------------------- -->
                        <!-- ----------------------------------------------------------- -->
                        <!-- ----------------------------------------------------------- -->
                        <!-- ----------------------------------------------------------- -->
                        <?php
                        $sql4 = "SELECT orden.Ord_Num,date_format(Fecha, '%d-%m-%Y') as Fecha, Desc_Orden, Nom_User,Nom_Prov, total_orden from orden inner join usuarios on usuarios.id = orden.Id_User inner join proveedores on proveedores.id_Prov = orden.Id_Prov where  Pagado = 1 order by orden.Ord_Num ASC;";
                        $query = mysqli_query($con, $sql4);
                        ?>
                        <table class='table tabla-ordenes' id='ordenes-table'>
                            <thead class='' style='background-color: rgb(26,54,78); color: white;'>
                                <tr>
                                    <th class='text-center' scope='col'>No.</th>
                                    <th class='text-center' scope='col'>Encargado</th>
                                    <th class='text-center' scope='col'>Proveedor</th>
                                    <th class='text-center' scope='col'>Fecha</th>
                                    <th class='text-center' scope='col'>Descripcion Orden</th>
                                    <th class='text-center' scope='col'>Total</th>
                                    <th class='text-center' scope='col'>Ver</th>
                            </thead>
                            <tbody>
                                <?php
                                while ($fila = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td style='font-size: 12px' class='text-center'><?php echo $fila['Ord_Num'] ?></td>
                                        <td style='width:240px ; font-size: 14px' class='text-center'><?php echo $fila['Nom_User'] ?></td>
                                        <td style='width:320px; font-size: 13px' class='text-center'><?php echo $fila['Nom_Prov'] ?></td>
                                        <td style=' width: 100px; font-size: 12px' class='text-center'><?php echo $fila['Fecha'] ?></td>
                                        <td style=' width: 350px; font-size: 13px' class='text-center'><?php echo  $fila['Desc_Orden'] ?></td>
                                        <td style='font-size: 13px;' class='text-center'><?php echo 'L.', number_format($fila['total_orden'],2) ?></td>
                                        <td class='text-center'><a href='ordenes_autorizadas.php?id_orden=<?php echo $fila['Ord_Num'] ?>' class='btn btn-info'><i class='fa fa-thin fa-eye' fa></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
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

    <!-- Cerrar sesion Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Quieres cerrar sesion?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="utilidades/salir.php">Cerrar Sesion</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Deshabilitar paginas para el usuario normal -->

    <script>
        <?php
        if ($result['rol'] == 1) {
        ?>
            document.getElementById('usuarios-op').style.display = "block";
            document.getElementById('proveedores-op').style.display = "block";
            document.getElementById('ordenes-master').style.display = "block";

        <?php } elseif ($result['rol'] == 2) {
        ?>
            document.getElementById('usuarios-op').style.display = "none";
            document.getElementById('presupuestos').style.display = "none";
            document.getElementById('proveedores-op').style.display = "none";
            document.getElementById('ordenes-master').style.display = "none";
            document.getElementById('orden-detalle-op').style.display = "none";

        <?php } elseif ($result['rol'] == 3) {
        ?>
            document.getElementById('ordenes-master').style.display = "block";
            document.getElementById('presupuestos').style.display = "block";
        <?php } ?>
    </script>

    <script src="js/ordenes.js"></script>

</body>

</html>