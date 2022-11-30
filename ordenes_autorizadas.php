<?php
error_reporting(E_ALL ^ E_WARNING);
error_reporting(0);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
//Sesion del usuario administrador
$usuario = $_SESSION['username'];
$usuario2 = $_SESSION['username-2'];
$usuario3 = $_SESSION['username-3'];
include("utilidades/conexion.php");

if (!isset($usuario) && !isset($usuario2) && !isset($usuario3)) {
    header("location:login.php");
}

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

if (empty($_REQUEST['id_orden'])) {
    header("location: login.php");
}

$id_orden =  $_GET['id_orden'];
$sql = "SELECT Num_Item, Pre_Item, Tot_Item,tot_Isv, isv_Item, orden.Ord_Num, Desc_Item, Cnt_Item,Iva_Item,
date_format(Fecha, '%d-%m-%Y') as Fecha, Nom_Prov, Nom_Tip_Pag, Nom_User,
date_format(fecha_pag, '%d-%m-%Y') as fecha_pag, Desc_Pres,
Observaciones, `Descripcion del Reglon`, Desc_Orden, Pagado, autorizado
from orden inner join proveedores on proveedores.id_Prov = orden.Id_Prov inner join
orden_detalle on orden_detalle.Ord_Num = orden.Ord_Num inner join tipo_pago on
tipo_pago.Id_Tip_Pag = orden.Id_Tip_Pag inner join usuarios on
usuarios.id = orden.Id_User inner join `tipo de presupuesto` on 
`tipo de presupuesto`.Id_Pres = orden.Id_Pres inner join reglon_presupuestario on 
reglon_presupuestario.Id_Reglon = orden.Id_Reglon WHERE orden.Ord_Num = $id_orden order by orden.Ord_Num;";
$query = mysqli_query($con, $sql);


while ($row = mysqli_fetch_array($query)) {
    $result2 = $row;
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Perfil</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
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

                    <h4 class=" mb-0 text-gray-800">Orden No. <?php echo  $id_orden ?></h4>

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
                                <form action="" method="Post">
                                    <div class="form-group">
                                        <label for="exampleInput">No. Orden</label>
                                        <input value="<?php echo $result2['Ord_Num'] ?>" type="text" class="form-control no_orden" name="no_orden" id="no_orden" autocomplete="off" disabled>
                                    </div>
                                    <div class="form-group" id="proveedor-sneditar">
                                        <label for="exampleInput">Proveedor</label>
                                        <input value="<?php echo $result2['Nom_Prov'] ?>" type="text" class="form-control proveedor" name="proveedor" id="proveedor" autocomplete="off" disabled>
                                    </div>
                                    <div class="form-group" id="proveedor-editar" style="display: none;">
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
                                    <div class="form-group" id="formapago-sneditar">
                                        <label for="exampleInput">Forma de Pago</label>
                                        <input value="<?php echo $result2['Nom_Tip_Pag'] ?>" type="text" class="form-control forma_pago" name="form_pago" id="form_pago" autocomplete="off" disabled>
                                    </div>
                                    <div class="form-group" id="formapago-editar" style="display: none;">
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
                                        <input value="<?php echo $result2['Nom_User'] ?>" type="text" class="form-control responsable" name="responsable" id="responsable" autocomplete="off" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInput">Autorizada por:</label>
                                        <input value="<?php echo $result2['autorizado'] ?>" type="text" class="form-control responsable" name="responsable" id="responsable" autocomplete="off" disabled>
                                    </div>

                            </div>

                            <div class="cont-derecho">
                                <div class="form-group" id="fecha-sneditar">
                                    <label for="exampleInput">Fecha</label>
                                    <input value="<?php echo $result2['Fecha'] ?>" type="text" class="form-control fecha" name="fecha" id="fecha" autocomplete="off" disabled>
                                </div>

                                <div class="form-group" id="fecha-editar" style="display: none;">
                                    <label for="exampleInput">Fecha</label>
                                    <input value="<?php echo $result2['Fecha'] ?>" type="date" class="form-control fecha" name="fecha" id="fecha" autocomplete="off">
                                </div>

                                <div class="form-group" id="presupuesto">
                                    <label for="exampleInput">Presupuesto</label>
                                    <input value="<?php echo $result2['Desc_Pres'] ?>" type="text" class="form-control presupuesto" name="presupuesto" id="presupuesto" autocomplete="off" disabled>
                                </div>
                                <div class="form-group" id="presupuesto-sneditar" style="display: none;">
                                    <label for="exampleInput">Presupuesto</label>
                                    <select class="form-control presupuesto" name="presupuesto">
                                        <?php
                                        $sql5 = "SELECT * FROM `tipo de presupuesto`";
                                        $query5 = mysqli_query($con, $sql5);
                                        while ($row5 = mysqli_fetch_array($query5)) {
                                            echo '<option value="' . $row5['Id_Pres'] . '">' . $row5['Desc_Pres'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group" id="reglon-sneditar">
                                    <label for="exampleInput">Reglon Presupuestario</label>
                                    <input value="<?php echo $result2['Descripcion del Reglon'] ?>" type="text" class="form-control reglon" name="reglon" id="reglon" autocomplete="off" disabled>
                                </div>

                                <div class="form-group" id="reglon-editar" style="display: none;">
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

                                <div class="form-group">
                                    <label for="exampleInput">Observaciones</label>
                                    <textarea placeholder="<?php echo $result2['Observaciones'] ?>" type="text" class="form-control observaciones" name="observaciones" id="observaciones" autocomplete="off" disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="container-2">
                            <div class="container-izq">
                                <div class="form-group">
                                    <label for="exampleInput">Descripcion</label>
                                    <textarea placeholder="<?php echo $result2['Desc_Orden'] ?>" type="text" class="form-control descripcion2" name="descripcion2" id="descripcion2" autocomplete="off" disabled></textarea>
                                </div>
                            </div>
                            <div class="container-der" style="display: flex; justify-content:space-between;">
                                <div class="form-group" id="checkEditar">
                                    <div style="display: flex;">
                                        <label for="exampleInput" style="margin-right:0.7rem;">Editar Orden</label>
                                        <input type="checkbox" onclick="activar();" class="form-control text-center checkbox" name="exampleCheck1" id="exampleCheck1" autocomplete="off">
                                    </div>
                                    <input type="submit" value="Guardar" class="btn btn-info" style="width: 10rem ;" id="guardar" disabled>
                                </div>
                            </div>
                            <br><br>
                        </div>

                        <br>
                        <div class="container-table">
                            <table class='table' id=''>
                                <thead class='' style='background-color: rgb(26,54,78); color: white;'>
                                    <tr>
                                        <th class='' scope='col'>No.</th>
                                        <th class='' style='width: 400px' scope='col'>Descripcion</th>
                                        <th class='' scope='col'>Cantidad</th>
                                        <th class='' scope='col'>Precio</th>
                                        <th class='' scope='col'>Subtotal</th>
                                        <th class='' scope='col'>Impuesto</th>
                                        <th class='' scope='col'>isv</th>
                                        <th class='' scope='col'>Total</th>
                                        <th scope='col' id="editar-orden">Editar</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $ordenes = $query;
                                    foreach ($ordenes as $ordenes => $value) {
                                    ?>

                                        <tr>
                                            <td style='font-size: 15px; width: 50px' class='text-center'><input id="no_orden2" class="form-control text-center numero" type="text" value="<?php echo $ordenes + 1 ?>" disabled></td>
                                            <td style='font-size: 13px; width: 300px' class='text-center'><input id="descripcion" class="form-control" type="text" value="<?php echo $value['Desc_Item'] ?>" disabled></td>
                                            <td style='font-size: 15px;' class='text-center'><input id="cantidad" class="form-control text-center cantidad" type="text" value="<?php echo $value['Cnt_Item'] ?>" disabled></td>
                                            <td style='font-size: 15px' class='text-center'><input id="precio" class="form-control text-center precio" type="text" value="<?php echo $value['Pre_Item'] ?>" disabled></td>
                                            <td style='font-size: 15px' class='text-center'><input id="subotal" class="form-control text-center total" type="text" value="<?php echo $value['Tot_Item'] ?>" disabled></td>
                                            <?php
                                            if ($value['isv_Item'] > 0) {
                                                echo "<td style='font-size: 15px;' class='text-center'><input style='margin-left: 1.3rem' id='impuesto' class='form-control text-center checkbox' type='checkbox' checked disabled></td>";
                                            } elseif ($value['isv_Item'] == 0) {
                                                echo "<td style='font-size: 15px;' class='text-center'><input style='margin-left: 1.3rem' id='impuesto' class='form-control text-center checkbox' type='checkbox' disabled></td>";
                                            }

                                            ?>
                                            <td style='font-size: 15px' class='text-center'><input id="total" class="form-control text-center total" type="text" value="<?php echo $value['isv_Item'] ?> %" autocomplete="off" disabled></td>
                                            <td style='font-size: 15px' class='text-center'><input id="total" class="form-control text-center total" type="text" value="<?php echo $value['tot_Isv'] ?>" autocomplete="off" disabled></td>

                                            <?php
                                            if ($result2['Pagado'] == 0) {
                                            ?>
                                                <td id="editar-orden-2" class='text-center'><a href='editar_ordenes.php?id_item=<?php echo $value['Num_Item'] ?>&id_orden=<?php echo $value['Ord_Num']  ?>' class='btn btn-info'><i class='fas fa-pencil-alt text-white'></i></a>
                                                <?php

                                            } elseif ($result2['Pagado'] == 1) {
                                                ?>
                                                <td style="display: none;" id="editar-orden-2" class='text-center'><a href='editar_ordenes.php?id_item=<?php echo $value['Num_Item'] ?>&id_orden=<?php echo $value['Ord_Num']  ?>' class='btn btn-info'><i class='fas fa-pencil-alt text-white'></i></a>
                                                <?php
                                            }
                                                ?>
                                        </tr>
                                    <?php } ?>
                            </table>
                            <div class="btn-agregar">
                                <div>
                                    <!-- Total de la orden -->
                                    <?php
                                    $suma = "SELECT sum(tot_Isv) as SUMA from orden_detalle where Ord_Num = $id_orden";
                                    $query = mysqli_query($con, $suma);
                                    while ($row = mysqli_fetch_array($query)) {
                                        $suma = $row;
                                    }
                                    ?>
                                    <div>
                                        <label class="total2">Total de la Orden</label>
                                        <input class="form-control text-center total2" type="number" value="<?php echo $suma['SUMA'] ?>" disabled><br><br>
                                        <!-- <a id="btn-agregar" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-sharp fa-solid fa-plus">&nbsp; Agregar Item </i></a> -->
                                    </div>
                                    <div class="ord-completada" id="ord-completada">
                                        <a href="utilidades/completar-orden.php?id_orden=<?php echo base64_encode($id_orden) ?>" class="btn btn-success">Orden  Autorizada <i class="fas fa-solid fa-check"></i></a>
                                    </div>
                                    <?php
                                    $sql = "SELECT * FROM orden where Ord_Num = $id_orden";
                                    $query = mysqli_query($con, $sql);

                                    while ($row = mysqli_fetch_array($query)) {
                                        $pagado = $row;
                                    }
                                    ?>
                                </div>
                            </div>

                            <br><br>
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

        <!-- Script deshabilitar la edicion de ordenes completadas -->

        <script>
            <?php
            if ($result2['Pagado'] == 1) {
            ?>
                document.getElementById('editar-orden').style.display = "none";
                // document.getElementById('btn-agregar').style.display = "none";
                document.getElementById('checkEditar').style.display = "none";

            <?php
            }
            ?>
        </script>

        <!-- Deshabilitar paginas para el usuario normal -->

        <script>
            <?php
            if ($result['rol'] == 1) {
            ?>
                document.getElementById('proveedores-op').style.display = "block";
                document.getElementById('usuarios-op').style.display = "block";
                document.getElementById('ordenes-master').style.display = "none";
                document.getElementById('ord-completada').style.display = "none";

            <?php } elseif ($result['rol'] == 2) {
            ?>
                document.getElementById('proveedores-op').style.display = "none";
                document.getElementById('usuarios-op').style.display = "none";
                document.getElementById('ordenes-master').style.display = "none";
            <?php }
            ?>
        </script>
        <script>
            function activar() {
                var check = document.getElementById('exampleCheck1');
                if (check.checked) {

                    document.getElementById('proveedor').disabled = false;
                    document.getElementById('descripcion2').disabled = false;
                    document.getElementById('form_pago').disabled = false;
                    document.getElementById('responsable').disabled = true;
                    document.getElementById('reglon').disabled = false;
                    document.getElementById('fecha').disabled = false;
                    document.getElementById('presupuesto').disabled = false;
                    document.getElementById('observaciones').disabled = false;
                    document.getElementById('guardar').disabled = false;
                    document.getElementById('fecha-sneditar').style.display = "none";
                    document.getElementById('fecha-editar').style.display = "block";
                    document.getElementById('proveedor-sneditar').style.display = "none";
                    document.getElementById('proveedor-editar').style.display = "block";
                    document.getElementById('formapago-sneditar').style.display = "none";
                    document.getElementById('formapago-editar').style.display = "block";
                    document.getElementById('reglon-sneditar').style.display = "none";
                    document.getElementById('reglon-editar').style.display = "block";
                    document.getElementById('presupuesto').style.display = "none";
                    document.getElementById('presupuesto-sneditar').style.display = "block";



                } else {

                    document.getElementById('proveedor').disabled = true;
                    document.getElementById('descripcion2').disabled = true;
                    document.getElementById('form_pago').disabled = true;
                    document.getElementById('responsable').disabled = true;
                    document.getElementById('reglon').disabled = true;
                    document.getElementById('fecha').disabled = true;
                    document.getElementById('presupuesto').disabled = true;
                    document.getElementById('impuesto').disabled = true;
                    document.getElementById('observaciones').disabled = true;
                    document.getElementById('guardar').disabled = true;
                    document.getElementById('fecha-sneditar').style.display = "block";
                    document.getElementById('fecha-editar').style.display = "none";
                    document.getElementById('proveedor-sneditar').style.display = "block";
                    document.getElementById('proveedor-editar').style.display = "none";
                    document.getElementById('formapago-sneditar').style.display = "block";
                    document.getElementById('formapago-editar').style.display = "none";
                    document.getElementById('reglon-sneditar').style.display = "block";
                    document.getElementById('reglon-editar').style.display = "none";
                    document.getElementById('presupuesto-sneditar').style.display = "none";
                    document.getElementById('presupuesto').style.display = "block";
                }
            }
        </script>

        <?php
        if (isset(($_REQUEST['id_item']))) {
            $id =  $_REQUEST['id_item'];
            $sql = "SELECT * from orden_detalle where Num_Item = '$id'";
            $query = mysqli_query($con, $sql);
        }
        ?>

        <!-- Modal para agregar un item -->

        <form action="utilidades/agregar-item.php?id_orden=<?php echo $result2['Ord_Num'] ?>" method="POST">
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLongTitle" style="color:rgb(26,54,78)">Agregar Item</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Body del modal -->
                            <label for="" style="color:rgb(26,54,78)">Descripcion</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="desc_orden" aria-describedby="basic-addon1" autocomplete="off" required>
                            </div>

                            <label for="" style="color:rgb(26,54,78)">Cantidad</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" min="1" name="cant_orden" aria-describedby="basic-addon2" autocomplete="off" required>
                            </div>

                            <label for="" style="color:rgb(26,54,78)">Precio</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" min="1" name="precio_item" aria-describedby="basic-addon3" autocomplete="off" required>
                            </div>

                            <label for="" style="color:rgb(26,54,78)">Impuesto</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" min="1" name="isv_item" aria-describedby="basic-addon3" autocomplete="off">
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

        <!-- Modal para editar un item -->
        <form action="utilidades/editar-item.php?id_item=<?php echo $id ?>&id_orden=<?php echo  $result2['Ord_Num']  ?>" method="POST">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLongTitle" style="color:rgb(26,54,78)">Actualizar Item</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Body del modal -->

                            <?php
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <label for="" style="color:rgb(26,54,78)">Descripcion</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="<?php echo $row['Desc_Item'] ?>" name="desc_orden" aria-describedby="basic-addon1" autocomplete="off">
                                </div>

                                <label for="" style="color:rgb(26,54,78)">Cantidad</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="<?php echo $row['Cnt_Item'] ?>" name="cant_orden" aria-describedby="basic-addon2" autocomplete="off">
                                </div>
                                <label for="" style="color:rgb(26,54,78)">Precio</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="<?php echo $row['Pre_Item'] ?>" name="precio_orden" aria-describedby="basic-addon3" autocomplete="off">
                                </div>

                            <?php } ?>
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

        <?php

        if (isset(($_REQUEST['id_item']))) {
            $id = $_REQUEST['id_item'];
            if (!empty($id)) {
                echo "<script>$('#exampleModal').modal({ show:true })</script>";
            }
        }

        ?>

        <script>
            window.addEventListener('popstate', function(event) {
                history.pushState(null, null, window.location = "dashboar.php");
                history.pushState(null, null, window.location = "dashboard.php");
            }, false);
        </script>

        <!-- Deshabilitar boton de completar orden -->

        <script>
            <?php
            if ($pagado['Pagado'] == 1) {
            ?>
                document.getElementById('ord-completada').style.display = "none";

            <?php
            }else{
                ?>
                document.getElementById('ord-completada').style.display = "blovk";
                <?php
            }
            ?>
        </script>




</body>

</html>