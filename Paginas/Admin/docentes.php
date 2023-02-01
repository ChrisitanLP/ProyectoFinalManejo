<?php 
    include_once('../../Conexion/conectar.php');
    session_start();
    
    if (isset($_SESSION['usuario']) && $_SESSION['rol'] == "Administrador"){
        $usuario = $_SESSION['usuario'];
    }else{
        header('Location: ../../login.php');//Aqui lo redireccionas al lugar que quieras.
        die() ;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="../../CSS/stylePaginas.css">
    <link rel="stylesheet" type="text/css" href="../../CSS/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Docentes</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../CSS/sb-admin-2.min.css" rel="stylesheet">
    <script src="../../JS/JqueryLib.js"></script>
    <script src="../../JS/jquery-3.1.1.min.js"></script>
	<script src="../../JS/sweetalert2.min.js"></script>
	<script src="../../JS/bootstrap.min.js"></script>
	<script src="../../JS/material.min.js"></script>
	<script src="../../JS/ripples.min.js"></script>
	<script src="../../JS/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../../JS/main.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: rgb(158, 7, 7);">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="pag_admin.php">
                <div class="sidebar-brand-icon">
                    <img src="../../img/Escudo_de_la_Universidad_Técnica_de_Ambato.png" class="imgNavbar"><br>
                </div>
                <br>
                <div class="sidebar-brand-text mx-3">UTA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="pag_admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Menu</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Configuración
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog" style="color: #fff;"></i>
                    <span>Administración</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes:</h6>
                        <a class="collapse-item" href="cursos.php">Cursos</a>
                        <a class="collapse-item" href="asignaturas.php">Asignatura</a>
						<a class="collapse-item" href="asignacion.php">Asignación</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench" style="color: #fff;"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes: </h6>
                        <a class="collapse-item" href="docentes.php">Docentes</a>
                        <a class="collapse-item" href="estudiantes.php">Estudiantes</a>
                        <a class="collapse-item" href="usuarios.php">Usuarios</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" >

            <!-- Main Content -->
            <div id="content" >

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" >

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <div class="input-group-append" >
                                <h3 style="color: #000;">Docentes</h3>
                            </div>
                        </div>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw" style="color: rgb(58, 53, 53);"></i>
                                <!-- Counter - Alerts -->
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header" style="background: rgb(138, 4, 4);">
                                    Notificaciones
                                </h6>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar Notificaciones</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw" style="color: rgb(58, 53, 53);"></i>
                                <!-- Counter - Messages -->
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header" style="background: rgb(138, 4, 4);">
                                    Mensajes
                                </h6>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar Mensajes</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: rgb(58, 53, 53);">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" >Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="../../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid">
                    <section>
                        <div class="page-header" style="margin-top: -15px;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="nav nav-tabs" style="margin-bottom: 15px; background: rgb(180, 39, 39);">
                                        <li class="active" style="background: red;"><a href="#new" data-toggle="tab">Ingresar</a></li>
                                        <li><a href="#list" data-toggle="tab">Modificar</a></li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div class="tab-pane fade active in" id="new">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                                                        <form action="../../Conexion/insertar.php" method="POST" enctype="multipart/form-data">
                                                            <fieldset style="font-size: 20px; color: #000; font-weight: 500;">Información del Docente</fieldset>
                                                            <div class="form-group label-floating">
                                                                <label class="control-label" style="color: #000; font-weight: 500;">Cedula: </label>
                                                                <input class="form-control" type="text" name="cedulaD">
                                                            </div>
                                                            <div class="form-group label-floating">
                                                                <label class="control-label" style="color: #000; font-weight: 500;">Nombre: </label>
                                                                <input class="form-control" type="text" name="nombreD">
                                                            </div>
                                                            <div class="form-group label-floating">
                                                                <label class="control-label" style="color: #000; font-weight: 500;">Apellido: </label>
                                                                <input class="form-control" type="text" name="apellidoD">
                                                            </div>
                                                            <div class="form-group label-floating">
                                                                <label class="control-label" style="color: #000; font-weight: 500;">Dirección</label>
                                                                <input class="form-control" type="text" name="direccionD">
                                                            </div>
                                                            <div class="form-group label-floating">
                                                                <label class="control-label" style="color: #000; font-weight: 500;">Correo Institucional: </label>
                                                                <input class="form-control" type="text" name="correoD">
                                                            </div>
                                                            <div class="form-group label-floating">
                                                                <label class="control-label" style="color: #000; font-weight: 500;">Telefono: </label>
                                                                <input class="form-control" type="text" name="telefonoD">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label" style="color: #000; font-weight: 500;">Fecha Nacimiento: </label>
                                                                <input class="form-control" type="date" name="fechaD">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label" style="color: #000; font-weight: 500;">Perfil</label>
                                                                <div>
                                                                    <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                                                    <input type="file" name="perfilD" title="seleccionar fichero" id="importData" accept=".jpg,.jpge,.png, .jfif, .svg" />
                                                                </div>
                                                            </div>
                                                            <p class="text-center">
                                                                <button href="#!" class="btn btn-info btn-raised btn-sm" style="background: rgb(138, 4, 4);" name="enviarD"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                                                            </p>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="list">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Cedula</th>
                                                            <th class="text-center">Nombre</th>
                                                            <th class="text-center">Apellido</th>
                                                            <th class="text-center">Dirección</th>
                                                            <th class="text-center">Email</th>
                                                            <th class="text-center">Telefono</th>
                                                            <th class="text-center">Nacimiento</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th class="text-center">Cedula</th>
                                                            <th class="text-center">Nombre</th>
                                                            <th class="text-center">Apellido</th>
                                                            <th class="text-center">Dirección</th>
                                                            <th class="text-center">Email</th>
                                                            <th class="text-center">Telefono</th>
                                                            <th class="text-center">Nacimiento</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    <?php
                                                        include_once('../../Conexion/listar.php');
                                                        echo listarDocentes();    
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <center>
                                                <button type='button' class='btn btn-primary' style='color: #fff; background: rgb(231, 180, 40);'>
                                                    <a href='../../Conexion/modificarD.php' style='text-decoration: none; color: #fff;'>Editar Tabla</a>
                                                </button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Christian López - Esteban Cifuentes</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: rgb(104, 6, 6); color: #fff;">
                    <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesión</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" style="background: rgb(75, 65, 65);" >Cancelar</button>
                    <a class="btn btn-primary" href="../../cerrar.php" id="cerrar" style="background: rgb(138, 4, 4);">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../JS/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../JS/demo/chart-area-demo.js"></script>
    <script src="../../JS/demo/chart-pie-demo.js"></script>

    <div class="modal fade" id="exampleModalD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Opciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" style="background-color:red; border-color:red;">Guardar cambios</button>
            </div>
          </div>
      </div>
    </div>
</body>

</html>