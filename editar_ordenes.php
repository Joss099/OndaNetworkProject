<?php
error_reporting(E_ALL ^ E_WARNING);
error_reporting(0);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
//Sesion del usuario administrador
$usuario = $_SESSION['username'];

include("utilidades/conexion.php");

if (empty(base64_decode($_REQUEST['id_orden']))) {
    header("location: ../login.php");
}
$id_orden = base64_decode($_REQUEST['id_orden']);
$sql = "SELECT Num_Item, Pre_Item, Tot_Item, orden.Ord_Num, Desc_Item, Cnt_Item , date_format(Fecha, '%d-%m-%Y') as Fecha, Nom_Prov, Nom_Tip_Pag, Nom_User, date_format(fecha_pag, '%d-%m-%Y') as fecha_pag, Desc_Pres, Observaciones, `Descripcion del Reglon`, Desc_Orden, Pagado from orden inner join proveedores on proveedores.id_Prov = orden.Id_Prov inner join orden_detalle on orden_detalle.Ord_Num = orden.Ord_Num inner join tipo_pago on tipo_pago.Id_Tip_Pag = orden.Id_Tip_Pag inner join usuarios on usuarios.id = orden.Id_User inner join `tipo de presupuesto` on `tipo de presupuesto`.Id_Pres = orden.Id_Pres inner join reglon_presupuestario on reglon_presupuestario.Id_Reglon = orden.Id_Reglon WHERE Num_Item = $id_orden order by orden.Ord_Num";
$query = mysqli_query($con, $sql);

if (!isset($query)) {
    echo '<script>
        Swal.fire({
            icon: "error",
            title: "ups...",
            text: "No hemos encontrado la orden",
          }).then(function(){
            window.location = "dashboard.php";
          })
        </script>';
}

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
    <link rel="stylesheet" href="css/ordenes.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" href="./img/logo.png">

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

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Perfil</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="#">Ver Perfil</a>
                        <a class="collapse-item" href="#">Editar Perfil</a>
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
                        <a class="collapse-item" href="dashboard.php">Ver Reportes</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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

                    <h4 class=" mb-0 text-gray-800">Ordenes</h4>

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
                            <?php
                            $sql2 = "SELECT * from usuarios where Usuario = '$usuario'";
                            $query2 = mysqli_query($con, $sql2);
                            while ($row4 = mysqli_fetch_array($query2)) {
                            ?>
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row4['Nom_User'] ?></span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>

                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="perfil.php?id=<?php echo base64_encode($row4['id']) ?>">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Perfil
                                    </a>
                                <?php
                            }
                                ?>
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

                    <!-- Datos de la orden -->
                    <div class="card shadow mb-4">
                        <div class="container-1">
                            <div class="cont-izquierdo">
                                <form action="">
                                    <?php
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="form-group">
                                            <label for="exampleInput">No. Orden</label>
                                            <input value="<?php echo $row['Ord_Num'] ?>" type="text" class="form-control no_orden" name="" id="" autocomplete="off" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInput">Proveedor</label>
                                            <input value="<?php echo $row['Nom_Prov'] ?>" type="text" class="form-control proveedor" name="" id="" autocomplete="off" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInput">Forma de Pago</label>
                                            <input value="<?php echo $row['Nom_Tip_Pag'] ?>" type="text" class="form-control forma_pago" name="" id="" autocomplete="off" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInput">Responsable</label>
                                            <input value="<?php echo $row['Nom_User'] ?>" type="text" class="form-control responsable" name="usuario" id="usuario" autocomplete="off" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInput">Reglon Presupuestario</label>
                                            <input value="<?php echo $row['Descripcion del Reglon'] ?>" type="text" class="form-control" name="usuario" id="usuario" autocomplete="off" disabled>
                                        </div>
                            </div>

                            <div class="cont-derecho">
                                <div class="form-group">
                                    <label for="exampleInput">Fecha</label>
                                    <input value="<?php echo $row['Fecha'] ?>" type="text" class="form-control fecha" name="usuario" id="usuario" autocomplete="off" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInput">Fecha de Pago</label>
                                    <input value="<?php echo $row['fecha_pag'] ?>" type="text" class="form-control fecha_pago" name="usuario" id="usuario" autocomplete="off" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInput">Presupuesto</label>
                                    <input value="<?php echo $row['Desc_Pres'] ?>" type="text" class="form-control presupuesto" name="usuario" id="usuario" autocomplete="off" disabled>
                                </div>
                            </div>
                        </div><br>
                        <div class="container-table">
                            <table class='table' id=''>
                                <thead class='' style='background-color: rgb(26,54,78); color: white;'>
                                    <tr>
                                        <th class='' scope='col'>No.</th>
                                        <th class='' style='width: 400px' scope='col'>Descripcion</th>
                                        <th class='' scope='col'>Cantidad</th>
                                        <th class='' scope='col'>Precio</th>
                                        <th class='' scope='col'>Impuesto</th>
                                        <th class='' scope='col'>Total</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style='font-size: 15px;' class='text-center'><input class="form-control text-center numero" type="text" value="<?php echo $row['Num_Item'] ?>" disabled></td>
                                        <td style='font-size: 13px' class='text-center'><input class="form-control" type="text" value="<?php echo $row['Desc_Item'] ?>" disabled></td>
                                        <td style='font-size: 15px;' class='text-center'><input class="form-control text-center cantidad" type="text" value="<?php echo $row['Cnt_Item'] ?>" disabled></td>
                                        <td style='font-size: 15px' class='text-center'><input class="form-control text-center precio" type="text" value="<?php echo $row['Pre_Item'] ?>" disabled></td>
                                        <td style='font-size: 15px' class='text-center'><input class="form-control text-center" type="checkbox" checked disabled></td>
                                        <td style='font-size: 15px' class='text-center'><input class="form-control text-center total" type="text" value="<?php echo $row['Tot_Item'] ?>" disabled></td>
                                    </tr>
                            </table>

                            <div class="container-1">
                                <div class="container-izq">
                                    <div class="form-group">
                                        <label for="exampleInput">Descripcion</label>
                                        <input value="<?php echo $row['Desc_Item'] ?>" type="text" class="form-control descripcion2" name="usuario" id="usuario" autocomplete="off" disabled>
                                    </div>
                                </div>
                                <div class="container-der">
                                    <div class="form-group">
                                        <label for="exampleInput">Observaciones</label>
                                        <input value="<?php echo $row['Observaciones'] ?>" type="text" class="form-control observaciones" name="usuario" id="usuario" autocomplete="off" disabled>
                                    </div>
                                </div>
                                <br><br>
                            </div>

                        <?php
                                    }
                        ?>
                        </form>

                        </div>

                        <!-- Datos de la orden -->

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
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Script para editar usuarios -->

        <script>
            function habilitar() {
                var check = document.getElementById('exampleCheck1');
                if (check.checked) {
                    document.getElementById('desc_orden').disabled = false;
                    document.getElementById('cant_orden').disabled = false;
                    document.getElementById('precio_orden').disabled = false;
                    document.getElementById('guardar').disabled = false;
                    document.getElementById('total_orden').disabled = false;

                } else {
                    document.getElementById('desc_orden').disabled = true;
                    document.getElementById('cant_orden').disabled = true;
                    document.getElementById('precio_orden').disabled = true;
                    document.getElementById('guardar').disabled = true;
                    document.getElementById('total_orden').disabled = true;
                }
            }
        </script>
</body>

</html>