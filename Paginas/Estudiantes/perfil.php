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
    
    //Se realiza una consulta en la tabla DOCENTES (Consigue id)
    $consulta = "   SELECT id
                    FROM estudiantes
                    WHERE COR_INS_EST = ? AND CED_EST = ?";
    $sentencia = $con -> prepare($consulta);
    $sentencia -> execute(array($_SESSION['usuario'], $_SESSION['contraseña']));
    $r = $sentencia -> fetchAll();
    $codigo = "";
    //Se guarda en una variable la id del DOCENTE
    foreach($r as $resu){
        $codigo.= $resu['id'];
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
    <script src="../../JS/JqueryLib.js"></script>

    <title>Perfil <?php $usuario?></title>

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
                        <h1 class="h3 mb-0 text-gray-800">Editar Perfil </h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="background: rgb(138, 4, 4); color: #fff;"><i
                                class="fas fa-download fa-sm text-white-50" ></i> Generar Reporte</a>
                    </div>
                    
                    <br>
                    <?php
                        $con = conectar();
                        if(isset($_POST['actualizar']))
                        {
                            $id=trim($_POST['id']);
                            $DIR_EST=trim($_POST['DIR_EST']);                                            
                            $TEL_EST=trim($_POST['TEL_EST']);
                            $CEL_EST=trim($_POST['CEL_EST']);
                            $NOM_EST=trim($_POST['NOM_EST']);
                            $APE_EST=trim($_POST['APE_EST']);


                            $consulta = "UPDATE estudiantes SET `DIR_EST` = :DIR_EST, `TEL_EST` = :TEL_EST, `CEL_EST` = :CEL_EST, `NOM_EST` = :NOM_EST, `APE_EST` = :APE_EST WHERE `id` = :id";
                                                    
                            $sql = $con->prepare($consulta);
                                            
                            $sql->bindParam(':DIR_EST',$DIR_EST,PDO::PARAM_STR,25);
                            $sql->bindParam(':TEL_EST',$TEL_EST,PDO::PARAM_STR,25);
                            $sql->bindParam(':CEL_EST',$CEL_EST,PDO::PARAM_STR,25);
                            $sql->bindParam(':NOM_EST',$NOM_EST,PDO::PARAM_STR,25);
                            $sql->bindParam(':APE_EST',$APE_EST,PDO::PARAM_STR,25);

                            $sql->bindParam(':id',$id,PDO::PARAM_INT);

                            $sql->execute();

                            if($sql->rowCount() > 0)
                            {
                                $count = $sql -> rowCount();
                                echo "<div class='content alert alert-primary' > 
                                Datos Actualizados  </div>";
                            }
                            else{
                                //echo "<div class='content alert alert-danger'> No se pudo actulizar el registro  </div>";
                                //print_r($sql->errorInfo()); 
                            }
                        }
                    ?>
                    <div class="row">
                        <?php 
                            $con = conectar();
                            if (isset($_POST['editar']))
                            {
                                $id = $_POST['id'];
                                $sql= "SELECT * FROM estudiantes WHERE id = :id"; 
                                $stmt = $con->prepare($sql);
                                $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
                                $stmt->execute();
                                $obj = $stmt->fetchObject();
                                                    
                        ?>  
                            <div class="container-fluid"  style="background: #fff; border-radius: 20px;">
                                <br>
                                <h1 class="h5 mb-0 text-gray-800">Datos</h1>
                                <br>
                                <div class="col-12 col-md-12"> 
                                    <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                        <input value="<?php echo $obj->id;?>" name="id" type="hidden">
                                        <div class="form-row">  
                                            <div class="form-group col-md-6">
                                                <label for="NOM_EST">Nombre</label>
                                                <input value="<?php echo $obj->NOM_EST;?>" name="NOM_EST" type="text" class="form-control" placeholder="Dirección...">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="TEL_EST">Apellido</label>
                                                <input value="<?php echo $obj->APE_EST;?>" name="APE_EST" type="text" class="form-control" placeholder="Telefono...">
                                            </div>
                                        </div>
                                        <div class="form-row">  
                                            <div class="form-group col-md-6">
                                                <label for="DIR_EST">Dirección</label>
                                                <input value="<?php echo $obj->DIR_EST;?>" name="DIR_EST" type="text" class="form-control" placeholder="Dirección...">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="TEL_EST">Telefono</label>
                                                <input value="<?php echo $obj->TEL_EST;?>" name="TEL_EST" type="text" class="form-control" placeholder="Telefono...">
                                            </div>
                                        </div>
                                        <div class="form-row">  
                                            <div class="form-group col-md-6">
                                                <label for="CEL_EST">Celular</label>
                                                <input value="<?php echo $obj->CEL_EST;?>" name="CEL_EST" type="text" class="form-control" placeholder="Celular...">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button name="actualizar" type="submit" class="btn btn-primary  btn-block" style="color: #fff;">Actualizar Registro</button>
                                        </div>
                                    </form>
                                </div> 
                            </div> 
                            <br>
                        <?php }?>  
                        <br>
                        <script>
                            function show() 
                            {
                                document.getElementById("info").style.visibility = "visible";
                            }
                        </script>
                        <div class="container-fluid"  style="background: #fff; border-radius: 20px;">  
                            <br>
                            <h1 class="h5 mb-0 text-gray-800">Información</h1>
                            <br>                  
                            <?php
                                $con = conectar();

                                $sql = "SELECT * FROM estudiantes  WHERE COR_INS_EST = ? AND CED_EST = ?"; 
                                $query = $con -> prepare($sql); 
                                $query -> execute(array($_SESSION['usuario'], $_SESSION['contraseña'])); 
                                $results = $query -> fetchAll(PDO::FETCH_OBJ); 
                                foreach($results as $result) 
                                { 
                                    echo '
                                        <div class="container py-5">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="card mb-4">
                                                        <div class="card-body text-center">
                                                            <img src="../'.$result -> RUT_ARCH.'" alt="avatar"
                                                            class="rounded-circle img-fluid" style="width: 150px;">
                                                            <h5 class="my-3">'.$result -> NOM_EST.' '.$result -> APE_EST.'</h5>
                                                            <p class="text-muted mb-1">'.$_SESSION['rol'].'</p>
                                                            <p class="text-muted mb-4">'.$result -> DIR_EST.'</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <p class="mb-0">Nombre Completo</p>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <p class="text-muted mb-0">'.$result -> NOM_EST.' '.$result -> APE_EST.'</p>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <p class="mb-0">Correo Electrónico</p>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <p class="text-muted mb-0">'.$result -> COR_INS_EST.'</p>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <p class="mb-0">Telefono</p>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <p class="text-muted mb-0">'.$result -> TEL_EST.'</p>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <p class="mb-0">Celular</p>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <p class="text-muted mb-0">'.$result -> CEL_EST.'</p>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <p class="mb-0">Dirección</p>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <p class="text-muted mb-0">'.$result -> DIR_EST.'</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <button id="abrirfoto" type="button" class="btn btn-primary" style="color: #fff; background: rgb(138, 4, 4);">Tomar foto</button>
                                                <br>
                                                <form method="POST" action="'.$_SERVER['PHP_SELF'].'">
                                                    <input type="hidden" name="id" value="'.$result -> id.'">
                                                    <button name="editar" class="btn btn-primary" style="color: #fff; background: rgb(138, 4, 4);">Editar Datos</button>
                                                </form>
                                                <br>
                                                <button type="button" onclick="show()" class="btn btn-primary" style="color: #fff; background: rgb(138, 4, 4);">Editar Foto</button>
                                            </div>
                                        </div>';
                                }   
                            ?>
                                    <div class="input-group" id="info" style="visibility:hidden">
                                        <p class="text-center">
                                            <div class="container-fluid"  style="background: #fff; border-radius: 20px;">
                                                <div class="col-12 col-md-12"> 
                                                    <form action="../../Conexion/insertar.php" method="POST" enctype="multipart/form-data">
                                                        <fieldset style="font-size: 20px; color: red; font-weight: 500;"></fieldset>
                                                            <div>
                                                                <label class="control-label" style="color: #000; font-weight: 500;">Subir foto: </label>
                                                            </div>
                                                            <center>
                                                                <div>
                                                                    <div class="form-group label-floating">
                                                                        <div class="col-md-9">
                                                                            <input type="file" name="archivoAsigE" title="seleccionar fichero" id="importData" accept=".jpg,.jpge,.png" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </center>
                                                        </fieldset>
                                                        <p class="text-center">
                                                            <button href="#!" class="btn btn-primary" style="background: rgb(138, 4, 4);" name="enviarFoto"><i class="zmdi zmdi-floppy"></i> Subir Foto</button>
                                                        </p>
                                                    </form>
                                                </div> 
                                            </div> 
                                        </p>
                                    </div>
                            <br>
                        </div>
                    </div>
                    <!-- Content Row -->

                    

                    <!-- Content Row -->
                    

                    <br>
                </div>
                <!-- /.container-fluid -->

            </div>
            <div class="modal fade" id="modalCRUD_DEBER" tabindex="-10" role="dialog" aria-labelledby="ejemplo" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: rgb(104, 6, 6); color: #fff;">
                            <h5 class="modal-title" id="exampleModalLabel">Tomar Foto</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="formUsuarios">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">                             
                                            <center><video src="" id="video" autoplay="true" height="480" width="640" style="margin-left: 15%;"></video></center>
                                            <center><canvas id="canvas" height="480" width="640"  style="margin-left: 15%;"></canvas></center>                  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" type="button" id="subirfoto">Abrir camara</button>
                                <button class="btn" type="button" id="tomarfoto">Tomar foto</button>
                                <a href="perfil.php"><button class="btn" type="button" id="guardarfoto">Guardar foto</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalCRUD_foto" tabindex="-10" role="dialog" aria-labelledby="ejemplo" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: rgb(104, 6, 6); color: #fff;">
                            <h5 class="modal-title" id="exampleModalLabel">Tomar Foto</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="formUsuarios">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">                             
                                            <form action="../../Conexion/insertar.php" method="POST" enctype="multipart/form-data">
                                                <fieldset style="font-size: 20px; color: red; font-weight: 500;"></fieldset>
                                                    <div>
                                                        <label class="control-label" style="color: #000; font-weight: 500;">Subir foto: </label>
                                                    </div>
                                                    <center>
                                                        <div>
                                                            <div class="form-group label-floating">
                                                                <div class="col-md-9">
                                                                    <input type="file" name="archivoAsigE" title="seleccionar fichero" id="importData" accept=".jpg,.jpge,.png" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </center>
                                                </fieldset>
                                                <p class="text-center">
                                                    <button href="#!" class="btn btn-info btn-raised btn-sm" style="background: rgb(138, 4, 4); padding: 16px; border-radius: 8px;" name="enviarFoto"><i class="zmdi zmdi-floppy"></i> Subir Foto</button>
                                                </p>
                                            </form>                  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script src="camara.js"></script>
            <script>
                $(document).ready(function(){
                    var opcion;
                    $('#abrirfoto').click(function(){
                        $('#modalCRUD_DEBER').modal('show');
                    });
                    $('#abrireditor').click(function(){
                        $('#modalCRUD_foto').modal('show');
                    });
                });  
            </script> 
            
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
