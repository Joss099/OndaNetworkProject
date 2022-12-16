<?php
error_reporting(E_ALL ^ E_WARNING);
error_reporting(0);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
//Sesion del usuario
$usuario = $_SESSION['username'];
$usuario2 = $_SESSION['username-2'];
$usuario3 = $_SESSION['username-3'];

if (!isset($usuario2) && !isset($usuario) && !isset($usuario3)) {
    header('Location: login.php');
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
<!-- VALORES DE CADA ITEM-->

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
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-duotone fa-users"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
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
                        <a class="collapse-item" href="#">Ver Perfil</a>
                    </div>
                </div>
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
                        <form id="form-orden" method="POST">
                            <div class="container-1">
                                <div class="cont-izquierdo">

                                    <div class="form-group">
                                        <?php
                                        $sql = "SELECT COUNT(Ord_Num) + 1 as Numero FROM orden order by Ord_Num DESC limit 1";
                                        $query = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_array($query)) {
                                            $result2 =  $row;
                                        }
                                        ?>
                                        <label for="exampleInput">No. Orden</label>
                                        <input value="<?php echo $result2['Numero'] ?>" type="text" class="form-control no_orden" id="no_orden" autocomplete="off" disabled>
                                        <input value="<?php echo $result2['Numero'] ?>" type="text" class="form-control no_orden" name="no_orden" id="no_orden" autocomplete="off" hidden>
                                    </div>
                                    <div class="form-group" id="proveedor-editar">
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
                                    <div class="form-group" id="formapago-editar">
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
                                        <input value="<?php echo $result['Nom_User'] ?>" type="text" class="form-control responsable" name="responsable" id="responsable" autocomplete="off" disabled>
                                    </div>

                                </div>
                                <!-- --------------------------------------------------------- -->
                                <div class="cont-derecho">
                                    <div class="form-group" id="fecha-sneditar">
                                        <label for="exampleInput">Fecha</label>
                                        <input type="date" class="form-control fecha" name="fecha" id="fechaActual" autocomplete="off">
                                    </div>

                                    <!-- <div class="form-group" id="presupuesto-sneditar">
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
                                    </div> -->

                                    <div class="form-group" id="reglon-editar">
                                        <label for="exampleInput">Reglon Presupuestario</label>
                                        <select class="form-control reglon" id="reglon" name="reglon">
                                            <?php

                                            $sql5 = "SELECT reglon_presupuestario.Id_Reglon, `Descripcion del Reglon`, total_pres, estado
                                            FROM reglon_presupuestario JOIN asignacion_presupuesto ON 
                                            asignacion_presupuesto.id_reglon = reglon_presupuestario.Id_Reglon
                                            WHERE (total_pres>0) AND estado = 0";
                                            $query5 = mysqli_query($con, $sql5);
                                            while ($row5 = mysqli_fetch_array($query5)) {
                                                echo '<option value="' . $row5['Id_Reglon'] . '">' . $row5['Descripcion del Reglon'] . '  &nbsp; (' . number_format($row5['total_pres'], 2) . ')</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput">Observaciones</label>
                                        <textarea type="text" class="form-control observaciones" name="observaciones" id="observaciones" autocomplete="off"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="container-2">
                                <div class="container-izq">
                                    <div class="form-group">
                                        <label for="exampleInput">Descripcion</label>
                                        <textarea type="text" class="form-control descripcion2" name="descripcion2" id="descripcion2" autocomplete="off"></textarea>
                                    </div>
                                </div>
                                <div class="container-der" style="display: flex; justify-content:space-between;">
                                </div>
                                <br>
                            </div>

                            <br>
                            <div class="container-table">
                                <table class='table' id=''>
                                    <thead class='' style='background-color: rgb(26,54,78); color: white;'>
                                        <tr>
                                            <th class='' style='width: 400px' scope='col'>Descripcion</th>
                                            <th class='' scope='col'>Cantidad</th>
                                            <th class='' scope='col'>Precio</th>
                                            <th class='' scope='col'>Impuesto</th>
                                            <th class='' scope='col'>Eliminar</th>
                                    </thead>

                                    <!-- Tabla para ingresar los items -->
                                    <tbody>
                                        <tr class="input_principal clonar">
                                            <td style="font-size: 13px" class="text-center"><input name="DESCRIPCION[]" class="form-control" type="text"></td>
                                            <td style="font-size: 15px;" class="text-center"><input name="CANTIDAD[]" id="CANTIDAD" class="form-control text-center cantidad" value="0" type="number" autocomplete="off" min=1></td>
                                            <td style="font-size: 15px" class="text-center"><input name="PRECIO[]" class="form-control text-center precio" value="0" type="number" min=1></td>
                                            <td style="font-size: 15px" class="text-center"><input name="IMPUESTO[]" class="form-control text-center total" value="0" type="number" autocomplete="off" min=1></td>
                                            <td><span class="btn btn-danger puntero ocultar">Eliminar</span></td>
                                        </tr>
                                    </tbody>
                                    <tbody id="contenedor">

                                    </tbody>


                                </table>
                                <div class="btn-agregar">
                                    <div>
                                        <a id="btn-agregar-inp" class="btn btn-info add_button"><i class="fas fa-sharp fa-solid fa-plus">&nbsp; Agregar Item </i></a>
                                    </div>
                                </div>
                                <a id="calculartotal" class="btn btn-warning add_button">Calcular Subtotal</a>
                                <br>
                                <div id="resp"></div>

                                <div class="form-group guardar">
                                    <input type="submit" id="guardarOrden" value="Guardar Orden" class="btn btn-primary">
                        </form>
                    </div>

                    <script>
                        $('#calculartotal').click(function() {
                            $.ajax({
                                url: "utilidades/calcular-total.php",
                                type: "post",
                                data: $("#form-orden").serialize(),
                                success: function(resultado) {
                                    $("#resp").html(resultado);
                                }
                            });
                        });
                    </script>

                    <!-- ------------------------------------------------------- -->
                    <!-- ------------------------------------------------------- -->

                    <!-- ------------------------------------------------------- -->
                    <!-- ------------------------------------------------------- -->

                    <!-- Datos de la orden -->
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

        <!-- Fecha actual -->

        <script>
            window.onload = function() {
                var fecha = new Date(); //Fecha actual
                var mes = fecha.getMonth() + 1; //obteniendo mes
                var dia = fecha.getDate(); //obteniendo dia
                var ano = fecha.getFullYear(); //obteniendo año
                if (dia < 10)
                    dia = '0' + dia; //agrega cero si el menor de 10
                if (mes < 10)
                    mes = '0' + mes //agrega cero si el menor de 10
                document.getElementById('fechaActual').value = ano + "-" + mes + "-" + dia;
            }
        </script>



        <!-- Funcion para activar input de impuestos -->
        <script>
            function activar() {
                var checkbox = document.getElementById('checkbox-impuesto');
                if (checkbox.checked) {
                    document.getElementById('subtotal2').disabled = false;
                    document.getElementById('impuesto2').disabled = false;
                    document.getElementById('totalorden').disabled = false;
                } else {
                    document.getElementById('subtotal2').disabled = true;
                    document.getElementById('impuesto2').disabled = true;
                    document.getElementById('totalorden').disabled = true;
                }
            }
        </script>

        <script>
            <?php
            if ($result['rol'] == 1) {
            ?>
                document.getElementById('usuarios-op').style.display = "block";
                document.getElementById('proveedores-op').style.display = "block";
                document.getElementById('ordenes-master').style.display = "none";

            <?php } elseif ($result['rol'] == 2) {
            ?>
                document.getElementById('usuarios-op').style.display = "none";
                document.getElementById('proveedores-op').style.display = "none";
                document.getElementById('ordenes-master').style.display = "none";
                document.getElementById('orden-detalle-op').style.display = "none";

            <?php }
            ?>
        </script>

        <script>
            let agregar = document.getElementById('btn-agregar-inp');
            let contenido = document.getElementById('contenedor');
            let boton_enviar = document.querySelector('#guardarOrden');

            agregar.addEventListener('click', e => {
                e.preventDefault();

                let clonado = document.querySelector('.clonar');
                let clon = clonado.cloneNode(true);

                contenido.appendChild(clon).classList.remove('.clonar');
            });

            contenido.addEventListener('click', e => {
                e.preventDefault();
                if (e.target.classList.contains('puntero')) {
                    let contenedor = e.target.parentNode.parentNode;

                    contenedor.parentNode.removeChild(contenedor);
                }
            });

            boton_enviar.addEventListener('click', e => {
                e.preventDefault();

                const formulario = document.querySelector('#form-orden');
                const form = new FormData(formulario);

                const peticion = {
                    body: form,
                    method: 'POST'
                };
                fetch('utilidades/agregar-orden.php?id_usuario=<?php echo base64_encode($result['id']) ?>', peticion)
                    .then(res => res.json())
                    .then(res => {
                        if (res['respuesta']) {
                            Swal.fire({
                                icon: "success",
                                title: "Guardado Correctamente",
                                text: "La orden ha sido registrada.",
                            }).then(function() {
                                window.location = "./dashboard.php";
                            });
                            formulario.reset();
                        } else {
                            Swal.fire({
                                icon: "info",
                                title: "Presupuesto Insuficiente",
                                text: "La orden no se registro.",
                            }).then(function() {
                                window.location = "./dashboard.php";
                            });
                        }
                    });

            })
        </script>



        <!-- Bootstrap core JavaScript-->

        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>



</html>