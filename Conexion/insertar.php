<?php
    include("conectar.php");
    $con = conectar();
    session_start();

//************************************************************************* */

    $nombreD = $_POST["nombreD"];
    $apellidoD = $_POST["apellidoD"];
    $cedulaD = $_POST["cedulaD"];
    $direccionD = $_POST["direccionD"];
    $correoD = $_POST["correoD"];
    $telefonoD = $_POST["telefonoD"];
    $fechaD = $_POST["fechaD"];

    if(isset($_POST["enviarD"]))
    {
        if(is_uploaded_file($_FILES['perfilD']['tmp_name'])){

            $ruta = "../BD/archivos/"; 
            $nombrefinal= trim ($_FILES['perfilD']['name']); 
            $rutaFinal= $ruta.$nombrefinal;  
            $upload= $ruta.$nombrefinal;  
    
            //Se verifica que existe el archivo
            if(move_uploaded_file($_FILES['perfilD']['tmp_name'], $upload)) { 
                    
                $nombre = $_FILES['perfilD']['name'];
                $tipo = $_FILES['perfilD']['type'];  
                $tamano = $_FILES['perfilD']['size'];

                //Se crea una insercion de datos en la tabla DOCENTES
                $sqlD = "INSERT INTO docentes(CED_DOC, NOM_DOC, APE_DOC, DIR_DOC, COR_INS_DOC, TEL_DOC, FEC_NAC_DOC, NOM_ARCH, RUT_ARCH, TIP_ARCH, TAM_ARCH)values('$cedulaD', '$nombreD', '$apellidoD', '$direccionD', '$correoD', '$telefonoD', '$fechaD', '$nombrefinal', '$rutaFinal', '$tipo', '$tamano')";
                $consultaD = $con->prepare($sqlD);
                $consultaD -> execute();
                $lastInsertIdD = $con->lastInsertId();
                
                if($lastInsertIdD>0){

                    //Se redirige a la pagina principal de envio
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/docentes.php'>";
                    echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombreD  </div>";
                }else{
                    //Se redirige a la pagina principal de envio
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/docentes.php'>";
                    echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                    print_r($consultaD->errorInfo()); 
                }
            }
        }
    };

    if(isset($_POST["enviarD"]))
    {   
        $rolD = "Docente";
        $sqlD = "INSERT INTO login(USU_LOG, PAS_LOG, ROL_LOG, NOM_USU_LOG)values('$correoD', '$cedulaD', '$rolD', '$nombreD')";
        $consultaD = $con->prepare($sqlD);
        $consultaD -> execute();
        $lastInsertIdD = $con->lastInsertId();
        
        if($lastInsertIdD>0){
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/docentes.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $correoD  </div>";
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/docentes.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaD->errorInfo()); 
        }
    };

//************************************************************************* */

    $nombreE = $_POST["nombreE"];
    $apellidoE = $_POST["apellidoE"];
    $cedulaE = $_POST["cedulaE"];
    $direccionE = $_POST["direccionE"];
    $correoE = $_POST["correoE"];
    $telefonoE = $_POST["telefonoE"];
    $fechaE = $_POST["fechaE"];
    $celularE = $_POST["celularE"];


    if(isset($_POST["enviarE"]))
    {
        if(is_uploaded_file($_FILES['perfilE']['tmp_name'])){

            $ruta = "../BD/archivos/"; 
            $nombrefinal= trim ($_FILES['perfilE']['name']); 
            $rutaFinal= $ruta.$nombrefinal;  
            $upload= $ruta.$nombrefinal;  
    
            //Se verifica que existe el archivo
            if(move_uploaded_file($_FILES['perfilE']['tmp_name'], $upload)) { 
                    
                $nombre = $_FILES['perfilE']['name'];
                $tipo = $_FILES['perfilE']['type'];  
                $tamano = $_FILES['perfilE']['size'];

                $sqlE = "INSERT INTO estudiantes(CED_EST, NOM_EST, APE_EST, DIR_EST, COR_INS_EST, TEL_EST, FEC_NAC_EST, CEL_EST, NOM_ARCH, RUT_ARCH, TIP_ARCH, TAM_ARCH)values('$cedulaE', '$nombreE', '$apellidoE', '$direccionE', '$correoE', '$telefonoE', '$fechaE', '$celularE', '$nombrefinal', '$rutaFinal', '$tipo', '$tamano')";
                $consultaE = $con->prepare($sqlE);
                $consultaE -> execute();
                $lastInsertIdE = $con->lastInsertId();
                
                if($lastInsertIdE>0){
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/estudiantes.php'>";
                    echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombreE  </div>";
                }else{
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/estudiantes.php'>";
                    echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                    print_r($consultaE->errorInfo()); 
                }
            }
        }
    };

    if(isset($_POST["enviarE"]))
    {   
        $rolE = "Estudiante";
        $sqlE = "INSERT INTO login(USU_LOG, PAS_LOG, ROL_LOG, NOM_USU_LOG)values('$correoE', '$cedulaE', '$rolE', '$nombreE')";
        $consultaE = $con->prepare($sqlE);
        $consultaE -> execute();
        $lastInsertIdE = $con->lastInsertId();
        
        if($lastInsertIdE>0){
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/estudiantes.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $correoE  </div>";
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/estudiantes.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaE->errorInfo()); 
        }
    };

//************************************************************************* */

    $nombreU = $_POST["nombreU"];
    $apellidoU = $_POST["apellidoU"];
    $cedulaU = $_POST["cedulaU"];
    $direccionU = $_POST["direccionU"];
    $correoU = $_POST["correoU"];
    $telefonoU = $_POST["telefonoU"];
    $fechaU = $_POST["fechaU"];

    if(isset($_POST["enviarU"]))
    {
        $sqlU = "INSERT INTO usuarios(CED_USU, NOM_USU, APE_USU, DIR_USU, COR_INS_USU, TEL_USU, FEC_NAC_USU)values('$cedulaU', '$nombreU', '$apellidoU', '$direccionU', '$correoU', '$telefonoU', '$fechaU')";
        $consultaU = $con->prepare($sqlU);
        $consultaU -> execute();
        $lastInsertIdU = $con->lastInsertId();
        
        if($lastInsertIdU>0){
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/usuarios.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombreU  </div>";
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/usuarios.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaU->errorInfo()); 
        }
    };

    if(isset($_POST["enviarU"]))
    {   
        $rolU = "Invitado";
        $sqlU = "INSERT INTO login(USU_LOG, PAS_LOG, ROL_LOG, NOM_USU_LOG)values('$correoU', '$cedulaU', '$rolU', '$nombreU')";
        $consultaU = $con->prepare($sqlU);
        $consultaU -> execute();
        $lastInsertIdU = $con->lastInsertId();
        
        if($lastInsertIdU>0){
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/usuarios.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $correoU  </div>";
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/usuarios.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaU->errorInfo()); 
        }
    };

//************************************************************************* */

    $nombreC = $_POST["nombreC"];
    $codigoC = $_POST["codigoC"];

    if(isset($_POST["enviarC"]))
    {
        $sqlC = "INSERT INTO cursos(COD_CUR, NOM_CUR)values('$codigoC', '$nombreC')";
        $consultaC = $con->prepare($sqlC);
        $consultaC -> execute();
        $lastInsertIdC = $con->lastInsertId();
        
        if($lastInsertIdC>0){
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/cursos.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Nombre CURSO es : $nombreC  </div>";
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/cursos.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaC->errorInfo()); 
        }
    };

//************************************************************************* */

    $nombreA = $_POST["nombreA"];
    $codigoA = $_POST["codigoA"];
    $horasA = $_POST["horasA"];
    $cursoA = $_POST["cursoA"];
    $docenteA = $_POST["docenteA"];

    if(isset($_POST["enviarA"]))
    {
        $sqlA = "INSERT INTO asignaturas(COD_ASI, NOM_ASI, HOR_ASI, CUR_ASI, DOC_ASI)values('$codigoA', '$nombreA', '$horasA', '$cursoA', '$docenteA')";
        $consultaA = $con->prepare($sqlA);
        $consultaA -> execute();
        $lastInsertIdA = $con->lastInsertId();
        
        if($lastInsertIdA>0){
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/asignaturas.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombreA  </div>";
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/asignaturas.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaA->errorInfo()); 
        }
    };

//************************************************************************* */
    
    $codigoAD = $_POST["codigoAD"];
    $docentesAD = $_POST["docentesAD"];
    $asignaturasAD = $_POST["asignaturasAD"];

    if(isset($_POST["enviarAD"]))
    {
        $sqlAD = "INSERT INTO asignacionD(COD_ASID, NOM_DOC_ASID, NOM_ASI_ASID)values('$codigoAD', '$docentesAD', '$asignaturasAD')";
        $consultaAD = $con->prepare($sqlAD);
        $consultaAD -> execute();
        $lastInsertIdAD = $con->lastInsertId();
        
        if($lastInsertIdAD>0){
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/asignacionD.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Nombre CURSO es : $nombreC  </div>";
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/asignacionD.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaAD->errorInfo()); 
        }
    };

//************************************************************************* */

    $codigoAE = $_POST["codigoAE"];
    $estudiantesAE = $_POST["estudiantesAE"];
    $asignaturasAE = $_POST["asignaturasAE"];

    if(isset($_POST["enviarAE"]))
    {
        $sqlAE = "INSERT INTO asignacionE(COD_ASIE, NOM_EST_ASIE, NOM_ASI_ASIE)values('$codigoAE', '$estudiantesAE', '$asignaturasAE')";
        $consultaAE = $con->prepare($sqlAE);
        $consultaAE -> execute();
        $lastInsertIdAE = $con->lastInsertId();
        
        if($lastInsertIdAE>0){
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/asignacionE.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Nombre CURSO es : $nombreC  </div>";
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/asignacionE.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaAE->errorInfo()); 
        }
    };

//************************************************************************* */
    
    $codigoAsignatura = $_SESSION['codigoAsignatura'];
    $codigoDocente = $_SESSION['codigoDocente'];
    $nombreAsig = $_POST["nombreAsig"];
    $descripcionAsig = $_POST["descripcionAsig"];
    $fechaAsig = $_POST["fechaAsig"];

    if(isset($_POST["enviarAsig"]))
    { 
        if(is_uploaded_file($_FILES['archivoAsig']['tmp_name'])){

            $ruta = "../BD/archivos/"; 
            $nombrefinal= trim ($_FILES['archivoAsig']['name']); 
            $rutaFinal= $ruta.$nombrefinal;  
            $upload= $ruta.$nombrefinal;  

            
            if(move_uploaded_file($_FILES['archivoAsig']['tmp_name'], $upload)) { 
                    
                $nombre = $_FILES['archivoAsig']['name'];
                $tipo = $_FILES['archivoAsig']['type'];  
                $tamano = $_FILES['archivoAsig']['size'];
            
                $sqlAsig = "INSERT INTO asignacion_deberes(COD_ASI, COD_DOC, NOM_ASIG, DES_ASIG, FEC_ASIG, NOM_ARCH, RUT_ARCH, TIP_ARCH, TAM_ARCH, EST_ASIG)values('$codigoAsignatura', '$codigoDocente', '$nombreAsig', '$descripcionAsig', '$fechaAsig', '$nombrefinal', '$rutaFinal', '$tipo', '$tamano','N')";
                $consultaAsig = $con->prepare($sqlAsig);
                $consultaAsig -> execute();
                $lastInsertIdAsig = $con->lastInsertId();
            
                if($lastInsertIdAsig>0){
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Docentes/asignacion.php'>";
                    echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombreU  </div>";

                }else{
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Docentes/asignacion.php'>";
                    echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                    print_r($consultaAsig->errorInfo()); 
                }
            };
        }else{
                $sqlAsig = "INSERT INTO asignacion_deberes(COD_ASI, COD_DOC, NOM_ASIG, DES_ASIG, FEC_ASIG, EST_ASIG)values('$codigoAsignatura', '$codigoDocente', '$nombreAsig', '$descripcionAsig', '$fechaAsig','N')";
                $consultaAsig = $con->prepare($sqlAsig);
                $consultaAsig -> execute();
                $lastInsertIdAsig = $con->lastInsertId();
            
                if($lastInsertIdAsig>0){
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Docentes/asignacion.php'>";
                    echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombreU  </div>";
                }else{
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Docentes/asignacion.php'>";
                    echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                    print_r($consultaAsig->errorInfo()); 
                }
        }
    }
    if(isset($_POST['enviarAsig'])) {
        $estadoA = "Sin Enviar";
        $con = conectar();
        
        //Consulta para encontrar el id de la ultima actividad ingresada
        $query2 = " SELECT id 
                    FROM asignacion_deberes
                    WHERE NOM_ASIG=? 
                    AND DES_ASIG=? 
                    AND FEC_ASIG=? 
                    AND COD_ASI=? 
                    AND COD_DOC=?";
        $sentencia2 = $con -> prepare($query2);
        $sentencia2 -> execute(array($nombreAsig, $descripcionAsig, $fechaAsig, $codigoAsignatura, $codigoDocente));
        $r2 = $sentencia2->fetch();
        
        //Consulta para encontrar todos los usuarios pertenecientes a una asignatura
        $query3 = " SELECT id 
                    FROM estudiantes 
                    WHERE id IN (
                                SELECT ID_EST 
                                FROM detalle_estudiantes 
                                WHERE ID_ASI = ?
                    )";
        $sentencia3 = $con -> prepare($query3);
        $sentencia3 -> execute(array($codigoAsignatura));
        $r3 = $sentencia3->fetchAll();
        
        //Bucle para generar un detalle por cada usuario registrado
        foreach($r3 as $resu){
            $query4 = " INSERT INTO detalle_asignacion(ID_EST_ASIG, COD_ASIG_DEB, ESTADO) 
                        VALUES (?,?,?)";
            $sentencia4 = $con -> prepare($query4);
            $sentencia4 -> execute(array($resu['id'], $r2['id'], $estadoA));
        }
        echo("Actividad Ingresada");
        
    }

    //************************************************************************* */
    
    $codigoAsignacion = $_SESSION['codigoAsignacion'];
    $codigoEstudiante = $_SESSION['codigoEstudiante'];
    $descripcionAsig = $_POST["informacionnAsig"];
    $estado = "";

    if(isset($_POST["enviarAsigE"]))
    { 
        $query2 = " SELECT FEC_ASIG
                    FROM asignacion_deberes
                    WHERE id =?";
        $sentencia2 = $con -> prepare($query2);
        $sentencia2 -> execute(array($codigoAsignacion));
        $r2 = $sentencia2->fetch();

        // comprobar si la fecha actual es anterior a la fecha límite
        $fechaactual = date("Y-m-d");
        if($fechaactual < $r2['FEC_ASIG']){
            echo "dentro del limtie";
        }else{
            echo "fuera limite";
        }
        if ($fechaactual < $r2['FEC_ASIG']){
            $estado = "Enviado";

            if(is_uploaded_file($_FILES['archivoAsig2']['tmp_name'])){

                $ruta = "../BD/archivos/"; 
                $nombrefinal= trim ($_FILES['archivoAsig2']['name']); 
                $rutaFinal= $ruta.$nombrefinal;  
                $upload= $ruta.$nombrefinal;  
    
                
                if(move_uploaded_file($_FILES['archivoAsig2']['tmp_name'], $upload)) { 
                        
                    $nombre = $_FILES['archivoAsig2']['name'];
                    $tipo = $_FILES['archivoAsig2']['type'];  
                    $tamano = $_FILES['archivoAsig2']['size'];
                
                    $sqlAsig = "UPDATE detalle_asignacion 
                                SET     DES_ASIG_DEB = '$descripcionAsig', 
                                        NOM_ARCH = '$nombre', 
                                        RUT_ARCH = '$rutaFinal', 
                                        TIP_ARCH = '$tipo', 
                                        TAM_ARCH = '$tamano',
                                        ESTADO = '$estado'
                                WHERE COD_ASIG_DEB = ?
                                AND ID_EST_ASIG = ?";
                    $sqlAct= "UPDATE asignacion_deberes set EST_ASIG='S' WHERE id= $codigoAsignacion ";
                    $consultaAsiga=$con->prepare($sqlAct);
                    $consultaAsiga-> execute();
                    $consultaAsig = $con->prepare($sqlAsig);
                    $consultaAsig -> execute(array($codigoAsignacion, $codigoEstudiante));
                    $lastInsertIdAsig = $con->lastInsertId();
                
                    if($lastInsertIdAsig>0){
                       echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignatura.php'>";
                        echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es 2: $nombreU  </div>";
                    }else{
                        echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignatura.php'>";
                        echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                        print_r($consultaAsig->errorInfo()); 
                    }
                };
            }else{
                    $sqlAsig = "UPDATE detalle_asignacion 
                                SET     DES_ASIG_DEB = '$descripcionAsig', 
                                        ESTADO = '$estado'
                                WHERE COD_ASIG_DEB = ?
                                AND ID_EST_ASIG = ?";
                    $sqlAct= "UPDATE asignacion_deberes set EST_ASIG='S' WHERE id= $codigoAsignacion ";
                    $consultaAsiga=$con->prepare($sqlAct);
                    $consultaAsiga-> execute();
                    $consultaAsig = $con->prepare($sqlAsig);
                    $consultaAsig -> execute(array($codigoAsignacion, $codigoEstudiante));
                    $lastInsertIdAsig = $con->lastInsertId();
                
                    if($lastInsertIdAsig>0){
                        echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignatura.php'>";
                        echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es 1: $nombreU  </div>";
                    }else{
                        echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignatura.php'>";
                        echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                        print_r($consultaAsig->errorInfo()); 
                    }
            };
        }else {
            $nota = 0;
            $estado = "No Enviado";

            $sqlAsig = "UPDATE  detalle_asignacion 
                        SET     ESTADO = '$estado',
                                NOT_ASIG = '$nota'
                        WHERE COD_ASIG_DEB = ?
                        AND ID_EST_ASIG = ?";
            $sqlAct= "UPDATE asignacion_deberes set EST_ASIG='S' WHERE id= $codigoAsignacion ";
            $consultaAsiga=$con->prepare($sqlAct);
            $consultaAsiga-> execute();
            $consultaAsig = $con->prepare($sqlAsig);
            $consultaAsig -> execute(array($codigoAsignacion, $codigoEstudiante));
            $lastInsertIdAsig = $con->lastInsertId();
                
            if($lastInsertIdAsig>0){
                echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignatura.php'>";
                echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es 1: $nombreU  </div>";
            }else{
                echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignatura.php'>";
                echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                print_r($consultaAsig->errorInfo()); 
            }
        }
    }

     //************************************************************************* */

    if(isset($_POST["enviarFoto"]))
    { 

        if(is_uploaded_file($_FILES['archivoAsigE']['tmp_name'])){

            $ruta = "../BD/archivos/"; 
            $nombrefinal= trim ($_FILES['archivoAsigE']['name']); 
            $rutaFinal= $ruta.$nombrefinal;  
            $upload= $ruta.$nombrefinal;  

            
            if(move_uploaded_file($_FILES['archivoAsigE']['tmp_name'], $upload)) { 
                    
                $nombre = $_FILES['archivoAsigE']['name'];
                $tipo = $_FILES['archivoAsigE']['type'];  
                $tamano = $_FILES['archivoAsigE']['size'];
            
                //$sqlAsig = "INSERT INTO fotos(CED_EST_PER,NOM_ARCH, RUT_ARCH, TIP_ARCH, TAM_ARCH)values('$cedulaE', '$nombre', '$rutaFinal', '$tipo', '$tamano')";
                $sqlAsig = "UPDATE estudiantes SET  NOM_ARCH='$nombre', RUT_ARCH='$rutaFinal', TIP_ARCH='$tipo', TAM_ARCH='$tamano' where CED_EST=?";
                $consultaAsig = $con->prepare($sqlAsig);
                $consultaAsig -> execute(array($_SESSION['contraseña']));
                $lastInsertIdAsig = $con->lastInsertId();
            
                if($lastInsertIdAsig>0){
                   echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/perfil.php'>";
                    echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es 2: $nombreU  </div>";
                }else{
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/perfil.php'>";
                    echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                    print_r($consultaAsig->errorInfo()); 
                }
            };
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/perfil.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
        };
    };

     //************************************************************************* */

    if(isset($_POST["enviarFotoD"]))
    { 
        if(is_uploaded_file($_FILES['archivoAsigE']['tmp_name'])){

            $ruta = "../BD/archivos/"; 
            $nombrefinal= trim ($_FILES['archivoAsigE']['name']); 
            $rutaFinal= $ruta.$nombrefinal;  
            $upload= $ruta.$nombrefinal;  

            
            if(move_uploaded_file($_FILES['archivoAsigE']['tmp_name'], $upload)) { 
                    
                $nombre = $_FILES['archivoAsigE']['name'];
                $tipo = $_FILES['archivoAsigE']['type'];  
                $tamano = $_FILES['archivoAsigE']['size'];
            
                $sqlAsig = "UPDATE docentes SET  NOM_ARCH='$nombre', RUT_ARCH='$rutaFinal', TIP_ARCH='$tipo', TAM_ARCH='$tamano' where CED_DOC=?";
                $consultaAsig = $con->prepare($sqlAsig);
                $consultaAsig -> execute(array($_SESSION['contraseña']));
                $lastInsertIdAsig = $con->lastInsertId();
            
                if($lastInsertIdAsig>0){
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Docentes/perfil.php'>";
                    echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es 2: $nombreU  </div>";
                }else{
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Docentes/perfil.php'>";
                    echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                    print_r($consultaAsig->errorInfo()); 
                }
            };
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Docentes/perfil.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
        };
    };

    //************************************************************************* */
    $codigoAsignacion = $_SESSION['codigoAsignacion'];
    $codigoEstudiante = $_SESSION['codigoEstudiante'];
    $descripcionAsig = $_POST["informacionnAsig"];

    if(isset($_POST["modificar"]))
    { 
        if((is_uploaded_file($_FILES['archivoAsigE']['tmp_name']))){

            $ruta = "../BD/archivos/"; 
            $nombrefinal= trim ($_FILES['archivoAsigE']['name']); 
            $rutaFinal= $ruta.$nombrefinal;  
            $upload= $ruta.$nombrefinal;  

            
            if(move_uploaded_file($_FILES['archivoAsigE']['tmp_name'], $upload)) { 
                    
                $nombre = $_FILES['archivoAsigE']['name'];
                $tipo = $_FILES['archivoAsigE']['type'];  
                $tamano = $_FILES['archivoAsigE']['size'];
            
                $sqlAsig = 
                            "   UPDATE detalle_asignacion 
                                SET DES_ASIG_DEB='$descripcionAsig', 
                                    NOM_ARCH = '$nombre', 
                                    RUT_ARCH = '$rutaFinal', 
                                    TIP_ARCH = '$tipo', 
                                    TAM_ARCH = '$tamano'
                                WHERE COD_ASIG_DEB = ? AND ID_EST_ASIG = ?";
                $consultaAsig = $con->prepare($sqlAsig);
                $consultaAsig -> execute(array($_SESSION['codigoAsignacion'], $_SESSION['codigoEstudiante']));
                $lastInsertIdAsig = $con->lastInsertId();
            
                if($lastInsertIdAsig>0){
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignacionreal.php'>";
                    echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es 2: $nombreU  </div>";
                }else{
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignacionreal.php'>";
                    echo "<div class='content alert alert-danger'> No se pueden agregar datos 1</div>";
                    print_r($consultaAsig->errorInfo()); 
                }
            };
        }else{
                $sqlAsig = "UPDATE detalle_asignacion
                            SET DES_ASIG_DEB = '$descripcionAsig'
                            WHERE COD_ASIG_DEB = ? AND ID_EST_ASIG = ?";
                $consultaAsig = $con->prepare($sqlAsig);
                $consultaAsig -> execute(array($_SESSION['codigoAsignacion'], $_SESSION['codigoEstudiante']));
                $lastInsertIdAsig = $con->lastInsertId();
            
                if($lastInsertIdAsig>0){
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignacionreal.php'>";
                    echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es 2: $nombreU  </div>";
                }else{
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignacionreal.php'>";
                    echo "<div class='content alert alert-danger'> No se pueden agregar datos 2</div>";
                    print_r($consultaAsig->errorInfo()); 
                }
        };
    };

?>
