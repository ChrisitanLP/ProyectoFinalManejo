<?php
    include_once('../../Conexion/conectar.php');
    session_start();

    if (isset($_SESSION['usuario']) && $_SESSION['rol'] == "Estudiante"){
        $usuario = $_SESSION['usuario'];
    }else{
        header('Location: ../../login.php');//Aqui lo redireccionas al lugar que quieras.
        die() ;
    }

    $contraseña = $_SESSION['contraseña'];

    $con = conectar();
    
    $consulta = "   SELECT id
                    FROM estudiantes
                    WHERE COR_INS_EST = ? AND CED_EST = ?";
    $sentencia = $con -> prepare($consulta);
    $sentencia -> execute(array($_SESSION['usuario'], $_SESSION['contraseña']));
    $r = $sentencia -> fetchAll();
    $codigoEs = "";
    foreach($r as $resu){
        $codigoEs.= $resu['id'];
    }

    if(isset($_GET['codAsignacion'])){
        $codigoAsig = $_GET['codAsignacion'];
    }else{
        header('Location: pag_estudiantes.php');
        die();
    }

    $con = conectar();
    
    $consulta = "   SELECT *
                    FROM asignacion_deberes
                    WHERE id = ? ";
    $sentencia = $con -> prepare($consulta);
    $sentencia -> execute(array($codigoAsig));
    $r = $sentencia -> fetchAll();
    
    $nombreAsig = "";
    $descripcionAsig = "";
    $tipoArchivo = "";
    $rutaArchivo = "";
    $nombreArchivo = "";
    $fecha = "";

    foreach($r as $resu){
        $nombreAsig.= $resu['NOM_ASIG'];
        $descripcionAsig.= $resu['DES_ASIG']; 
        $tipoArchivo.= $resu['TIP_ARCH'];
        $rutaArchivo.= $resu['RUT_ARCH'];
        $nombreArchivo.= $resu['NOM_ARCH'];
        $fecha.= $resu['FEC_ASIG'];
    }
    $_SESSION['NombreAsignacion'] = $nombreAsig;
    $_SESSION['codigoAsignacion'] = $codigoAsig;
    $_SESSION['descripcionAsignacion'] = $descripcionAsig;
    $_SESSION['tipArchivo'] = $tipoArchivo;
    $_SESSION['rutaArchivo'] = $rutaArchivo;
    $_SESSION['nombreArchivo'] = $nombreArchivo;
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
    <link rel="stylesheet" type="text/css" href="../../CSS/footer.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

    <title>Asignación <?php echo $_SESSION['NombreAsignatura'];?></title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../CSS/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: rgb(158, 7, 7);">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="pag_estudiantes.php">
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
                <a class="nav-link" href="pag_estudiantes.php">
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

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench" style="color: #fff;"></i>
                    <span>Asignaturas</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes: </h6>
                            <?php 
                                    $consulta = "   SELECT *
                                                    FROM asignaturas
                                                    WHERE id IN (
                                                            SELECT ID_ASI
                                                            FROM detalle_estudiantes
                                                            WHERE ID_EST = ?
                                                    )
                                     ";
                                    $sentencia = $con -> prepare($consulta);
                                    $sentencia -> execute(array($_SESSION['codigoEstudiante']));
                                    $r = $sentencia -> fetchAll();
                                    $codigoA = "";
                                    foreach($r as $resu){
                                        $codigoA.='
                                        <a class="collapse-item" href="asignatura.php?codpagina='.$resu['id'].'">'.$resu['NOM_ASI'].'</a>';
                                    }   
                                    echo ($codigoA);      
                            ?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

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
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" style="background: rgb(138, 4, 4);">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none" >
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
                                            placeholder="Buscar por..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append" >
                                            <button class="btn btn-Danger" type="button" style="background: red; color: red;">
                                                <i class="fas fa-search fa-sm" style="background: red; color: red;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1" >
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" ><?php echo $usuario; ?></span>
                                <img class="img-profile rounded-circle" src="../<?php echo $_SESSION['rutaPerfil'];?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="perfil.php" >
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400" ></i>
                                    Perfil
                                </a>
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4" >
                        <h1 class="h3 mb-0 text-gray-800">Asignación <?php echo $_SESSION['NombreAsignacion'];?></h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="background: rgb(138, 4, 4); color: #fff;"><i
                                class="fas fa-download fa-sm text-white-50" ></i> Generar Reporte</a>
                    </div>
                    <div class="container-fluid" style="background: #fff; border-radius: 20px;">  
                        <div id="myTabContent" class="tab-content">

                                <div class="container-fluid">
                                    <br>
                                    <h1 class="h4 mb-0 text-danger-800" style="color: #000; font-family: Arial;">General</h1>
                                    <br>
                                    <?php 
                                        $categoria= $tipoArchivo;
                                         
                                        $valor="";
                                         if($categoria=='image/jpeg' || $categoria=='png'){
                                             $valor="<img width='40' src='../../img/Logos/desconocido.png'>";
                                         }
                     
                                         if($categoria=='application/pdf'){
                                             $valor="<img  width='40' src='../../img/Logos/pdf.png'>";
                                         }
                     
                                         if($categoria=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $categoria=='xlsm' ){
                                             $valor="<img  width='40' src='../../img/Logos/exel.png'>";
                                         }
                     
                                         if($categoria=='application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $categoria=='docx'){
                                             $valor="<img  width='40' src='../../img/Logos/word.png'>";
                                         }
                                         if($categoria=='application/zip'){
                                             $valor="<img  width='40' src='../../img/Logos/comprimido.jpg'>";
                                         }
                     
                                         if($categoria=='mp3'){
                                             $valor="<img  width='40' src='../../img/Logos/desconocido.png'>";
                                         }
                     
                                         if($valor==''){
                                             $valor="<img  width='40' src='../../img/Logos/desconocido.png'>";
                                         }

                                       echo '<div>
                                                <label class="control-label" style="color: #000; font-weight: 500;">'.$_SESSION['descripcionAsignacion'].'</label>
                                                <br><label class="control-label" style="color: #000; font-weight: 500;">Fecha Limite: '.$fecha.'</label>
                                            </div>';
                                    ?>
                                    <?php 
                                        if($_SESSION['nombreArchivo'] == ''){    
                                            echo '<p></p>';
                                        }else{
                                           echo '   <label class="control-label" style="color: #000; font-weight: 500;">Archivo: </label>
                                                    <a href="cargar.php?id='.$_SESSION['nombreArchivo'].'">'.$valor.'descargar</a>';
                                        };
                                    ?>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                                            <br>
                                            <form action="../../Conexion/insertar.php" method="POST" enctype="multipart/form-data">
                                                <fieldset style="font-size: 20px; color: red; font-weight: 500;"></fieldset>
                                                    <div>
                                                        <label class="control-label" style="color: #000; font-weight: 500;">Información: </label>
                                                    </div>
                                                    <center>
                                                    <div>
                                                        <div class="form-group label-floating">
                                                            <div class="col-md-9">
                                                                <textarea class="form-control" id="message" name="informacionnAsig" placeholder="Ingresa descripción del deber..." rows="7"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </center>
                                                    <div>
                                                        <label class="control-label" style="color: #000; font-weight: 500;">Archivo: </label>
                                                    </div>
                                                    <center>
                                                    <div>
                                                        <div class="form-group label-floating">
                                                            <div class="col-md-9">
                                                                <input type="file" name="archivoAsig2" title="seleccionar fichero" id="importData" accept=".xls, .xlsx, .pdf, .doc, .zip, .rar" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </center>
                                                </fieldset>
                                                <p class="text-center">
                                                    <button href="#!" class="btn btn-info btn-raised btn-sm" style="background: rgb(138, 4, 4); padding: 16px; border-radius: 8px;" name="enviarAsigE" id="subirAsig"><i class="zmdi zmdi-floppy"></i> Subir Asignación</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    

                    <!-- Content Row -->
                    

                    <br>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <section>
              <footer>
                <div class="content">
                  <div class="left box">
                    <div class="upper">
                      <div class="topic">Sobre Nosotros</div>
                      <p>La Universidad Tecnica de Ambato por sus niveles de excelencia academica se constituye como un centro de formacion superior con liderazgo y proyección.</p>
                    </div>
                    <div class="lower">
                      <div class="topic">Contactanos</div>
                      <div class="phone">
                        <a href="#"><i class="fas fa-phone-volume"></i>FISEI: (032) 851894 - 411537</a>
                      </div>
                      <div class="email">
                        <a href="#"><i class="fas fa-envelope"></i>FISEI@uta.edu.ec.</a>
                      </div>
                    </div>
                  </div>
                  <div class="middle box">
                    <div class="topic">Otros Servicios</div>
                    <div><a href="#">Comunidad Facultad</a></div>
                    <div><a href="#">Infraestructura</a></div>
                    <div><a href="#">Formatos-Descargas</a></div>
                    <div><a href="#">Bibliotecas</a></div>
                    <div><a href="#">Sistema Integrado</a></div>
                  </div>
                  <div class="right box">
                    <div class="topic">Encuentranos</div>
                    <form action="#">
                      <div>
                        <p>Av. Los Chasquis y Rio Guayllabamba - Ambato, Ecuador </p>
                      </div>
                      <div class="media-icons">
                        <a href="https://www.facebook.com/UniversidadTecnicadeAmbatoOficial/" title="Facebook" target="_blank"><img img src="../../img/Logos/Face.png"  title="Facebook" class="reduction" /></a>
                        <a href="https://www.instagram.com/utecnicaambato/" title="Instagram" target="_blank"><img src="../../img/Logos/insta.png"  alt="Pinterest"  title="Instagram"  class="reduction"/></a>
                        <a href="https://twitter.com/UTecnicaAmbato" title="Twitter" target="_blank"><img src="../../img/Logos/twiter.png"  alt="Twitter"  title="Twitter" class="reduction" /></a>
                        <a href="https://outlook.office.com/mail/" title="Outolook" target="_blank"><img src="../../img/Logos/outlok.png"  alt="Outlook"  title="Outlook" class="reduction"/></a>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="bottom">
                  <p>Copyright &#169; 2020 <a href="#">Christian López - Esteban Cifuentes</a> Todos los derechos reservados</p>
                </div>
              </footer>
            </section>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top" style="background: rgb(138, 4, 4);">
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

</body>

</html>
