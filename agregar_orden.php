<?php
error_reporting(E_ALL ^ E_WARNING);
error_reporting(0);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
//Sesion del usuario administrador
$usuario = $_SESSION['username'];

include("utilidades/conexion.php");
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
                    <span>Reportes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="#">Ingresar Reporte</a>
                        <a class="collapse-item" href="#">Ver Reportes</a>
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

                    <h4 class=" mb-0 text-gray-800">Agregar Orden</h4>

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
                            $sql = "SELECT * from usuarios where Usuario = '$usuario'";
                            $query = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['Nom_User'] ?></span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>

                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="perfil.php?id=<?php echo base64_encode($row['id']) ?>">
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
                                <form action="utilidades/agregar-orden.php" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInput">No. Orden</label>
                                        <input type="number" class="form-control no_orden" name="no_orden" id="" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInput">Proveedor</label>
                                        <select class="form-control proveedor" id="proveedor" name="proveedor">
                                            <?php
                                            $sql2 = "SELECT * FROM proveedores";
                                            $query2 = mysqli_query($con, $sql2);
                                            while ($row2 = mysqli_fetch_array($query2)) {
                                                echo '<option value="' . $row2['id_Prov'] . '">' . $row2['Nom_Prov'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInput">Forma de Pago</label>
                                        <select class="form-control proveedor" id="pago" name="pago">
                                            <?php
                                            $sql3 = "SELECT * FROM tipo_pago";
                                            $query3 = mysqli_query($con, $sql3);
                                            while ($row3 = mysqli_fetch_array($query3)) {
                                                echo '<option value="' . $row3['Id_Tip_Pag'] . '">' . $row3['Nom_Tip_Pag'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInput">Responsable</label>
                                        <?php
                                        $sql4 = "SELECT * from usuarios where Usuario = '$usuario'";
                                        $query4 = mysqli_query($con, $sql4);
                                        while ($row4 = mysqli_fetch_array($query4)) {
                                        ?>
                                            <input type="text" class="form-control responsable" value="<?php echo $row4['Nom_User'] ?>" name="usuario" id="usuario" autocomplete="off">

                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInput">Reglon Presupuestario</label>
                                        <select class="form-control proveedor" id="reglon" name="reglon">
                                            <?php
                                            $sql5 = "SELECT * FROM reglon_presupuestario";
                                            $query5 = mysqli_query($con, $sql5);
                                            while ($row5 = mysqli_fetch_array($query5)) {
                                                echo '<option value="' . $row5['Id_Reglon'] . '">' . $row5['Descripcion del Reglon'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                            </div>

                            <div class="cont-derecho">
                                <div class="form-group">
                                    <label for="exampleInput">Fecha</label>
                                    <input type="date" class="form-control fecha" name="fecha" id="fecha" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInput">Fecha de Pago</label>
                                    <input type="date" class="form-control fecha_pago" name="fecha_pago" id="fecha_pago" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInput">Presupuesto</label>
                                    <select class="form-control presupuesto" id="presupuesto" name="presupuesto">
                                        <?php
                                        $sql6 = "SELECT * FROM `tipo de presupuesto`";
                                        $query6 = mysqli_query($con, $sql6);
                                        while ($row6 = mysqli_fetch_array($query6)) {
                                            echo '<option value="' . $row6['Id_Pres'] . '">' . $row6['Desc_Pres'] . '</option>';
                                        }
                                        ?>
                                    </select>
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
                                        <td style='font-size: 15px;' class='text-center'><input name="" class="form-control text-center numero" type="text"></td>
                                        <td style='font-size: 13px' class='text-center'><input name="descripcion_orden" class="form-control" type="text"></td>
                                        <td style='font-size: 15px;' class='text-center'><input name="cantidad" class="form-control text-center cantidad" type="text"></td>
                                        <td style='font-size: 15px' class='text-center'><input name="precio_orden" class="form-control text-center precio" type="text"></td>
                                        <td style='font-size: 15px' class='text-center'><input name="" class="form-control text-center checkbox" type="checkbox"></td>
                                        <td style='font-size: 15px' class='text-center'><input name="total" class="form-control text-center total" type="text"></td>
                                    </tr>
                            </table>

                            <div class="container-1">
                                <div class="container-izq">
                                    <div class="form-group">
                                        <label for="exampleInput">Descripcion</label>
                                        <input type="text" class="form-control descripcion2" name="descripcion" id="descripcion" autocomplete="off">
                                    </div>
                                    <div class="container-der">
                                    <div class="form-group">
                                        <label for="exampleInput">Observaciones</label>
                                        <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="3"></textarea>
                                    </div>
                                </div>
                                </div>
                                <div class="container-impuesto">
                                    <div class="form-group">
                                        <label for="exampleInput">Impuesto</label>
                                        <input type="checkbox" onclick="activar();" class="form-control text-center checkbox" name="checkbox-impuesto" id="checkbox-impuesto" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInput">Subtotal</label>
                                        <input type="text" class="form-control text-center subtotal" name="subtotal" id="subtotal2" autocomplete="off" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInput">Impuestos</label>
                                        <input type="text" class="form-control text-center subtotal" name="impuesto" id="impuesto2" autocomplete="off" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInput">Total Orden</label>
                                        <input type="text" class="form-control text-center subtotal" name="totalorden" id="totalorden" autocomplete="off" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="boton-enviar">
                            <input type="submit" value="Guardar" class="btn btn-primary">
                            </div>
                            <br><br>
                            </form>

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
        
        <!-- Funcion para activar input de impuestos -->
        <script>
            function activar(){
                var checkbox = document.getElementById('checkbox-impuesto');
                if(checkbox.checked){
                    document.getElementById('subtotal2').disabled = false;
                    document.getElementById('impuesto2').disabled = false;
                    document.getElementById('totalorden').disabled = false;
                }
                else{
                    document.getElementById('subtotal2').disabled = true;
                    document.getElementById('impuesto2').disabled = true;
                    document.getElementById('totalorden').disabled = true;
                }
            }
        </script>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>