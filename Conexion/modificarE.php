<?php 
    include_once('../Conexion/conectar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="../CSS/stylePaginas.css">
    <link rel="stylesheet" type="text/css" href="../CSS/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Eatudiantes (editar)</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../CSS/sb-admin-2.min.css" rel="stylesheet">
    <script src="JqueryLib.js"></script>
    <script src="../JS/jquery-3.1.1.min.js"></script>
	<script src="../JS/sweetalert2.min.js"></script>
	<script src="../JS/bootstrap.min.js"></script>
	<script src="../JS/material.min.js"></script>
	<script src="../JS/ripples.min.js"></script>
	<script src="../JS/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../JS/main.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: rgb(158, 7, 7);">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon">
                    <img src="../img/Escudo_de_la_Universidad_Técnica_de_Ambato.png" class="imgNavbar"><br>
                </div>
                <br>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../Paginas/estudiantes.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Regresar</span></a>
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
                                <h3 style="color: #000;">Estudiantes <small>modificaciones</small></h3>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" >Opciones</span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" >
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
                <section>
                    <div class="page-header" style="margin-top: -15px;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="nav nav-tabs" style="margin-bottom: 15px; background: rgb(180, 39, 39);">
                                        <li class="active" style="background: red;"><a href="#new" data-toggle="tab">Modificar</a></li>
                                        <li><a href="#list" data-toggle="tab">Modificar</a></li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div class="tab-pane fade active in" id="new">
                                            <div class="container-fluid">
                                            <?php
                                                $con = conectar();
                                                if(isset($_POST['actualizar']))
                                                {
                                                    $id=trim($_POST['id']);
                                                    $CED_EST=trim($_POST['CED_EST']);
                                                    $NOM_EST=trim($_POST['NOM_EST']);
                                                    $APE_EST=trim($_POST['APE_EST']);
                                                    $DIR_EST=trim($_POST['DIR_EST']);
                                                    $COR_INS_EST=trim($_POST['COR_INS_EST']);
                                                    $TEL_EST=trim($_POST['TEL_EST']);
                                                    $FEC_NAC_EST = trim($_POST['FEC_NAC_EST']);

                                                    $consulta = "UPDATE estudiantes SET `CED_EST`= :CED_EST, `NOM_EST`= :NOM_EST, `APE_EST` = :APE_EST, `DIR_EST` = :DIR_EST, `COR_INS_EST` = :COR_INS_EST, `TEL_EST` = :TEL_EST, `FEC_NAC_EST` = :FEC_NAC_EST WHERE `id` = :id";
                                                    
                                                    $sql = $con->prepare($consulta);
                                                    
                                                    $sql->bindParam(':CED_EST',$CED_EST,PDO::PARAM_STR, 25);
                                                    $sql->bindParam(':NOM_EST',$NOM_EST,PDO::PARAM_STR, 25);
                                                    $sql->bindParam(':APE_EST',$APE_EST,PDO::PARAM_STR, 25);
                                                    $sql->bindParam(':DIR_EST',$DIR_EST,PDO::PARAM_STR,25);
                                                    $sql->bindParam(':COR_INS_EST',$COR_INS_EST,PDO::PARAM_STR,25);
                                                    $sql->bindParam(':TEL_EST',$TEL_EST,PDO::PARAM_STR,25);
                                                    $sql->bindParam(':FEC_NAC_EST',$FEC_NAC_EST,PDO::PARAM_STR);
                                                    $sql->bindParam(':id',$id,PDO::PARAM_INT);

                                                    $sql->execute();

                                                    if($sql->rowCount() > 0)
                                                    {
                                                        $count = $sql -> rowCount();
                                                        echo "<div class='content alert alert-primary' > 
                                                        Gracias: $count registro ha sido actualizado  </div>";
                                                    }
                                                    else{
                                                        echo "<div class='content alert alert-danger'> No se pudo actulizar el registro  </div>";
                                                        print_r($sql->errorInfo()); 
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
                                                <div class="col-12 col-md-12"> 
                                                    <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                                        <input value="<?php echo $obj->id;?>" name="id" type="hidden">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="NOM_EST">Nombres</label>
                                                                <input value="<?php echo $obj->NOM_EST;?>" name="NOM_EST" type="text" class="form-control" placeholder="Nombre...">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="APE_EST">Apellidos</label>
                                                                <input value="<?php echo $obj->APE_EST;?>" name="APE_EST" type="text" class="form-control" placeholder="Apellido...">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">  
                                                            <div class="form-group col-md-6">
                                                                <label for="DIR_EST">Dirección</label>
                                                                <input value="<?php echo $obj->DIR_EST;?>" name="DIR_EST" type="text" class="form-control" placeholder="Dirección...">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="COR_INS_EST">Email</label>
                                                                <input value="<?php echo $obj->COR_INS_EST;?>" name="COR_INS_EST" type="text" class="form-control" placeholder="Email...">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">  
                                                            <div class="form-group col-md-6">
                                                                <label for="TEL_EST">Telefono</label>
                                                                <input value="<?php echo $obj->TEL_EST;?>" name="TEL_EST" type="text" class="form-control" placeholder="Telefono...">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="FEC_NAC_EST">Fecha Nacimiento</label>
                                                                <input value="<?php echo $obj->FEC_NAC_EST;?>" name="FEC_NAC_EST" type="text" class="form-control" placeholder="Fecha Nacimiento...">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">  
                                                            <div class="form-group col-md-6">
                                                                <label for="CED_EST">Cedula</label>
                                                                <input value="<?php echo $obj->CED_EST;?>" name="CED_EST" type="text" class="form-control" placeholder="Telefono...">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button name="actualizar" type="submit" class="btn btn-primary  btn-block" style="color: #fff;">Actualizar Registro</button>
                                                        </div>
                                                    </form>
                                                </div>  
                                                <?php }?>
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
                                                                    <th class="text-center">Modificar</th>
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
                                                                    <th class="text-center">Modificar</th>
                                                                </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                <?php
                                                                    $con = conectar();

                                                                    $sql = "SELECT * FROM estudiantes"; 
                                                                    $query = $con -> prepare($sql); 
                                                                    $query -> execute(); 
                                                                    $results = $query -> fetchAll(PDO::FETCH_OBJ); 

                                                                    if($query -> rowCount() > 0)   
                                                                    { 
                                                                        foreach($results as $result) 
                                                                        { 
                                                                            echo "
                                                                                <tr>
                                                                                    <td>".$result -> CED_EST."</td>
                                                                                    <td>".$result -> NOM_EST."</td>
                                                                                    <td>".$result -> APE_EST."</td>
                                                                                    <td>".$result -> DIR_EST."</td>
                                                                                    <td>".$result -> COR_INS_EST."</td>
                                                                                    <td>".$result -> TEL_EST."</td>
                                                                                    <td>".$result -> FEC_NAC_EST."</td>
                                                                                    <td>
                                                                                        <form method='POST' action='".$_SERVER['PHP_SELF']."'>
                                                                                            <input type='hidden' name='id' value='".$result -> id."'>
                                                                                            <button name='editar' class='btn btn-primary' style='color: #fff; background: rgb(231, 180, 40);'>Editar</button>
                                                                                        </form>
                                                                                    </td>
                                                                                </tr>";
                                                                        }
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    </form>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </section>
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
                    <a class="btn btn-primary" href="cerrar.php" id="cerrar" style="background: rgb(138, 4, 4);">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>