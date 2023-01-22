<?php

    //Se incluye la pagina conectar que trae un metodo
    include_once('../../Conexion/conectar.php');
    $con = conectar();

    //Inicia la sesion actual
    session_start();

    //Se verifica que existan variables de sesion (USUARIO / ROL)
    //Segun su rol se crean unas variables
    if (isset($_SESSION['usuario']) && $_SESSION['rol'] == "Estudiante"){
        $usuario = $_SESSION['usuario'];
        $contraseña = $_SESSION['contraseña'];
    }else{
        //Se redirecciona a login.php
        header('Location: ../../login.php');//Aqui lo redireccionas al lugar que quieras.
        die() ;
    }
    
    //Se realiza una consulta en la tabla ESTUDIANTES (Consigue id)
    $consulta = "   SELECT id
                    FROM estudiantes
                    WHERE COR_INS_EST = ? AND CED_EST = ?";
    $sentencia = $con -> prepare($consulta);
    $sentencia -> execute(array($_SESSION['usuario'], $_SESSION['contraseña']));
    $r = $sentencia -> fetchAll();
    $codigoEs = "";

     //Se guarda en una variable la id del ESTUDIANTE
    foreach($r as $resu){
        $codigoEs.= $resu['id'];
    }

    if(isset($_GET['codAsignacion'])){
        //$_SESSION['CodAsig'] = $_GET['codpagina'];
        $opcion = $_GET['codAsignacion'];
    }else{
        header('Location: pag_estudiantes.php');
        die();
    }

    $con = conectar();
    
    $consulta = "   SELECT *
                    FROM asignaturas
                    WHERE id = ? ";
    $sentencia = $con -> prepare($consulta);
    $sentencia -> execute(array($_SESSION['AsignaturaCOD']));
    $r = $sentencia -> fetchAll();
    $nombreA = "";
    foreach($r as $resu){
        $nombreA.= $resu['NOM_ASI'];
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
    <link rel="stylesheet" type="text/css" href="../../CSS/footer.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

    <title>Estudiantes <?php echo $nombreA;?></title>

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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog" style="color: #fff;"></i>
                    <span>Administración</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes:</h6>
                        <a class="collapse-item" href="asignacion.php">Asignación</a>
                    </div>
                </div>
            </li>

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
                                                    WHERE DOC_ASI IN (
                                                                    SELECT id 
                                                                    FROM docentes
                                                                    WHERE COR_INS_DOC = ? AND CED_DOC = ?
                                                    )";
                                    $sentencia = $con -> prepare($consulta);
                                    $sentencia -> execute(array($_SESSION['usuario'], $_SESSION['contraseña']));
                                    $r = $sentencia -> fetchAll();
                                    $codigo = "";
                                    foreach($r as $resu){
                                        $codigo.='
                                        <a class="collapse-item" href="asignatura.php?codpagina='.$resu['id'].'">'.$resu['NOM_ASI'].'</a>';
                                    }   
                                    echo ($codigo);      
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
                                <a class="dropdown-item" href="#" >
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuración
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Actividades
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
                        <h1 class="h3 mb-0 text-gray-800">Estudiantes de <?php echo $nombreA;?></h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="background: rgb(138, 4, 4); color: #fff;"><i
                                class="fas fa-download fa-sm text-white-50" ></i> Generar Reporte</a>
                    </div>

                    <div class="container-fluid" style="background: #fff; border-radius: 20px;">  
                        <div id="myTabContent" class="tab-content">

                                <div class="container-fluid">
                                    
                                </div>
                        </div>
                    </div>
                    <?php 
                        if($opcion == 3){
                    ?>
                    <div class="card shadow mb-4"> <!--numero de comlumnas el 4 al final-->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabla de Calificaciónes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Asignacion</th>
                                            <th>Nota</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <?php
                                            $consulta = "   SELECT  DA.id, DA.DES_ASIG_DEB, AD.NOM_ASIG, AD.DES_ASIG, E.NOM_EST, DA.NOT_ASIG
                                            FROM estudiantes E, detalle_asignacion DA, asignacion_deberes AD
                                            WHERE DA.COD_ASIG_DEB = AD.id 
                                            AND DA.ID_EST_ASIG = E.id 
                                            AND AD.COD_ASI = ? AND DA.ID_EST_ASIG = ?            
                                            ";

                                            $sentencia = $con -> prepare($consulta);
                                            $sentencia -> execute(array($_SESSION['AsignaturaCOD'], $codigoEs));
                                            $r = $sentencia -> fetchAll();
                                            $codigota = "";
                                            $array = 0;
                                            $acum = 0;
                                            foreach($r as $resu){
                                                $acum ++;
                                                $array = $array + $resu['NOT_ASIG'];
                                            }  
                                            $codigota.='
                                                <tr>
                                                    <th colspan = "2">Total</td>
                                                    <td>'.(number_format($array/$acum, 2)).'</td>
                                                </tr>
                                            '; 
                                            echo ($codigota);      
                                        ?>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $consulta = "   SELECT  DA.id, DA.DES_ASIG_DEB, AD.NOM_ASIG, AD.DES_ASIG, E.NOM_EST, DA.NOT_ASIG
                                            FROM estudiantes E, detalle_asignacion DA, asignacion_deberes AD
                                            WHERE DA.COD_ASIG_DEB = AD.id 
                                            AND DA.ID_EST_ASIG = E.id 
                                            AND AD.COD_ASI = ? AND DA.ID_EST_ASIG = ?            
                                            ";

                                            $sentencia = $con -> prepare($consulta);
                                            $sentencia -> execute(array($_SESSION['AsignaturaCOD'], $codigoEs));
                                            $r = $sentencia -> fetchAll();
                                            $codigota = "";
                                            foreach($r as $resu){
                                                $codigota.='
                                                <tr>
                                                    <td>'.$resu['id'].'</td>
                                                    <td>'.$resu['NOM_ASIG'].'</td>
                                                    <td>'.$resu['NOT_ASIG'].'</td>
                                                </tr>
                                                ';
                                            }   
                                            echo ($codigota);      
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
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
    <script>
        $(document).ready(function(){
            var asignacion_id="";
            var opcion;

            // puedo acceder a las class de otras clases
            $(".editar").click(function(){
                fila= $(this).closest("tr");//captura la fila
                asignacion_id=fila.find('td:eq(0)').text();//que busque la columna con la posicion
                nota=fila.find('td:eq(5)').text();
                $("#nota").val(nota);
                $("#modalCrud").modal('show');
            });

            //control del submit
            $("#formUsuarios").submit(function(e){ //variable cualquiera que coloco
                e.preventDefault(); //evita que el formulario mande todo hacia el servidor
                nota= $("#nota").val();
                opcion=1;
                $.ajax({
                    url: "../../Conexion/ajax.php",
                    type: "POST",
                    data: {
                        asignacion_id: asignacion_id,
                        nota: nota,
                        opcion: opcion
                    },
                    success: function(resultado){
                    location.reload();
                    }
                });
            });
        });
    </script>
    <div class="modal fade" id="modalCrud" tabindex="" role="dialog" arial-labelledby="ejemplo" aria-hidden="true">
        <!--arial-labelledby="ejemplo" definir o delimitar el area  -->
        <div class="modal-dialog" role="document"> <!--document, digo que este modal va a tener incrustado un documento-->
            <div class="modal-content">   <!--dar color al contenedor  -->
                <div class="modal-header">
                    <h2>Asignar Calificación</h2>
                    <!--data-dismiss="modal" que al cerrar quite los modals -->
                    <button type="button" class="close" data-dismiss="modal"
                    arial-label="Close">X</button>
                </div>
                <form id="formUsuarios">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <!-- solucion del inge -->
                                    <label class="col-form-label">Nota</label>
                                    <input type="text" id="nota" name="nota" class="form-control">
                                    <!-- mi solucion -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" type="button">Cancelar</button>
                        <button class="btn" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>                  
</body>

</html>
