<?php

session_start();
if (isset($_SESSION['username'])) {
    $usuario = $_SESSION['username'];
} elseif (isset($_SESSION['username-3'])) {
    $usuario3 = $_SESSION['username-3'];
}
//comprobacion de que exista una sesion activa
if (!isset($usuario) && !isset($usuario3)) {
    header("location:login.php");
}

include("utilidades/conexion.php");
if (isset($_SESSION['username'])) {
    $sql = "SELECT * from usuarios where Usuario = '$usuario'";
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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" href="./img/logo.png">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/ordenes.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script datatables -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary-2 sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <br>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
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
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
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
                        <a class="collapse-item" href="agregar_orden.php"> Ordenes Pendientes</a>
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

            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo">
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

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" id="buscar-usuario" class="form-control bg-light border-0 small" placeholder="Buscar presupuesto..." aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
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

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <h1 class="h3 mb-0 text-gray-800">Asignacion de Presupuestos </h1>
                        <a data-toggle="modal" data-target="#exampleModalCenter" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-solid fa-coins text-white-50"></i> Agregar Presupuesto</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Presupuestos Disponibles</div>
                                            <?php
                                            $sql2 = "SELECT COUNT(*) AS CUENTA FROM asignacion_presupuesto where estado =0 ";
                                            $query2 = mysqli_query($con, $sql2);
                                            while ($row2 = mysqli_fetch_array($query2)) {
                                            ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row2['CUENTA'] ?></div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-coins fa-2x text-gray-300"></i>
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
                        <!-- Div donde se remplaza la tabla -->
                        <!-- ------------------------------------------------- -->
                        <!-- ------------------------------------------------- -->
                        <!-- ------------------------------------------------- -->
                        <!-- ------------------------------------------------- -->
                        <!-- ------------------------------------------------- -->

                        <?php
                        $sql = "SELECT id_asig, Nom_User, `Descripcion del Reglon`, asignacion_presupuesto.mes_asig, asignacion_presupuesto.total_pres,
                        asignacion_presupuesto.estado from reglon_presupuestario
                        inner join asignacion_presupuesto on asignacion_presupuesto.id_reglon = reglon_presupuestario.Id_Reglon
                        inner join usuarios on usuarios.id = asignacion_presupuesto.usuario_asig
                        where asignacion_presupuesto.estado = 0;";
                        $query = mysqli_query($con, $sql);
                        ?>
                        <table class='table' id='usuarios-table'>
                            <thead class='' style='background-color: rgb(26,54,78); color: white;'>
                                <tr>
                                    <th class='text-center' scope='col'>#</th>
                                    <th class='text-center' scope='col'>Responsable</th>
                                    <th class='text-center' scope='col'>Descripcion</th>
                                    <th class='text-center' scope='col'>Fecha de asignacion</th>
                                    <th class='text-center' scope='col'>Presupuesto</th>
                                    <th class='text-center' scope='col'>Vaciar</th>
                            </thead>
                            <tbody>
                                <?php
                                while ($fila = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td style='font-size: 14px' class='text-center'><?php echo $fila['id_asig'] ?></td>
                                        <td style='font-size: 14px' class='text-center'><?php echo $fila['Nom_User'] ?></td>
                                        <td style='font-size: 14px' class='text-center'><?php echo $fila['Descripcion del Reglon'] ?></td>
                                        <td style='font-size: 14px' class='text-center'><?php echo $fila['mes_asig'] ?></td>
                                        <td style='font-size: 14px' class='text-center'><?php echo number_format( $fila['total_pres'], 2) ?></td>
                                        <td style='font-size: 14px' class='text-center'><a href='presupuestos.php?id_pres=<?php echo base64_encode($fila['id_asig']) ?>' class='btn btn-info'><i class='fas fa-eraser text-white'></i></a>
                                            <!-- <a href='usuarios.php?id_usuario="<?php echo base64_encode($fila['id']) ?>"' class='btn btn-danger'><i class='fas fa-trash' onclick='eliminar();'></i></a> -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            <tbody>
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
    <script src="js/usuario.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Modal para asignar presupuesto  -->
    <form action="utilidades/presupuesto.php?id_usuario=<?php echo base64_encode($result['id'])?>" method="POST">
        <div  class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="color:rgb(26,54,78)">Asignar Presupuesto</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 2.2rem !important">
                        <!-- Body del modal -->
                        <label for="" style="color:rgb(26,54,78)">Reglon Presupuestario</label>
                        <div class="input-group mb-3 pb-3 pt-2">
                        <select class="custom-select custom-select-sm" name="reglon" style="height: 40px">
                                <?php
                                $sql2 = "SELECT * from reglon_presupuestario";
                                $query1 = mysqli_query($con, $sql2);
                                while ($row2 = mysqli_fetch_array($query1)) {
                                    echo '<option value="' . $row2['Id_Reglon'] . '">' . $row2['Descripcion del Reglon'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <label for="" style="color:rgb(26,54,78)">Fecha de asignacion</label>
                        <div class="input-group mb-3 pb-3 pt-2">
                            <input type="date" class="form-control" name="fecha" aria-describedby="basic-addon2" autocomplete="off">
                        </div>
                        <label for="" style="color:rgb(26,54,78)">Presupuesto</label>
                        <div class="input-group mb-3 pb-3 pt-2">
                            <input type="number" class="form-control" name="valor" aria-describedby="basic-addon3" autocomplete="off" min=100;>
                        </div>
                        <!-- Fin del body del modal -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" name="Guardar" class="btn btn-primary">Guardar</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <!-- Modal Vaciar Presupuesto -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Vaciar Reglon Presupuestario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ??Seguro que deseas vaciar este Reglon Presupuestario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <?php $id = base64_decode($_REQUEST['id_pres']); ?>
                    <a href="utilidades/vaciar-presupuesto.php?id_pres=<?php echo base64_encode($id) ?>" class="btn btn-danger">Vaciar</a>
                </div>
            </div>
        </div>
    </div>

    <?php

    if (isset(($_REQUEST['id_pres']))) {
        $id = $_REQUEST['id_pres'];
        if (!empty($id)) {
            echo "<script>$('#exampleModalCenter2').modal({ show:true })</script>";
        }
    }

    ?>

    <script>
        <?php
        if ($result['rol'] == 1) {
        ?>
            document.getElementById('ordenes-master').style.display = "none";
        <?php } ?>
    </script>

</body>

</html>