<?php

    //Se incluye la pagina conectar que trae un metodo
    include("conectar.php");
    $con = conectar();

    //Inicia la sesion actual
    session_start();

//************************************************************************* */

    //Se crean varias variables que son traidas docentes.php por metodo POST (Formulario)
    $nombreD = $_POST["nombreD"];
    $apellidoD = $_POST["apellidoD"];
    $cedulaD = $_POST["cedulaD"];
    $direccionD = $_POST["direccionD"];
    $correoD = $_POST["correoD"];
    $telefonoD = $_POST["telefonoD"];
    $fechaD = $_POST["fechaD"];

    //Se verifica que si existe enviarD por metodo POST entonces realice una consulta
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

    //Se verifica que existe enviarD por metodo POST
    if(isset($_POST["enviarD"]))
    {   
        //Se crea una insercion de datos en la tabla LOGIN para crear distintos usuarios 
        $rolD = "Docente";
        $sqlD = "INSERT INTO login(USU_LOG, PAS_LOG, ROL_LOG, NOM_USU_LOG)values('$correoD', '$cedulaD', '$rolD', '$nombreD')";
        $consultaD = $con->prepare($sqlD);
        $consultaD -> execute();
        $lastInsertIdD = $con->lastInsertId();
        
        if($lastInsertIdD>0){

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/docentes.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $correoD  </div>";
        }else{

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/docentes.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaD->errorInfo()); 
        }
    };

//************************************************************************* */

    //Se crean varias variables que son traidas estudiantes.php por metodo POST (Formulario)
    $nombreE = $_POST["nombreE"];
    $apellidoE = $_POST["apellidoE"];
    $cedulaE = $_POST["cedulaE"];
    $direccionE = $_POST["direccionE"];
    $correoE = $_POST["correoE"];
    $celularE = $_POST["celularE"];
    $telefonoE = $_POST["telefonoE"];
    $fechaE = $_POST["fechaE"];

    //Se verifica que si existe enviarE por metodo POST entonces realice una consulta
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

                //Se crea una insercion de datos en la tabla ESTUDIANTES
                $sqlE = "INSERT INTO estudiantes(CED_EST, NOM_EST, APE_EST, DIR_EST, COR_INS_EST, CEL_EST, TEL_EST, FEC_NAC_EST, NOM_ARCH, RUT_ARCH, TIP_ARCH, TAM_ARCH)values('$cedulaE', '$nombreE', '$apellidoE', '$direccionE', '$correoE', '$celularE', '$telefonoE', '$fechaE', '$nombrefinal', '$rutaFinal', '$tipo', '$tamano')";
                $consultaE = $con->prepare($sqlE);
                $consultaE -> execute();
                $lastInsertIdE = $con->lastInsertId();
                
                if($lastInsertIdE>0){

                    //Se redirige a la pagina principal de envio
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/estudiantes.php'>";
                    echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombreE  </div>";
                }else{

                    //Se redirige a la pagina principal de envio
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/estudiantes.php'>";
                    echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                    print_r($consultaE->errorInfo()); 
                }
            }
        }
    };

    //Se verifica que existe enviarE por metodo POST
    if(isset($_POST["enviarE"]))
    {   
        //Se crea una insercion de datos en la tabla LOGIN para crear distintos usuarios 
        $rolE = "Estudiante";
        $sqlE = "INSERT INTO login(USU_LOG, PAS_LOG, ROL_LOG, NOM_USU_LOG)values('$correoE', '$cedulaE', '$rolE', '$nombreE')";
        $consultaE = $con->prepare($sqlE);
        $consultaE -> execute();
        $lastInsertIdE = $con->lastInsertId();
        
        if($lastInsertIdE>0){

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/estudiantes.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $correoE  </div>";
        }else{

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/estudiantes.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaE->errorInfo()); 
        }
    };

//************************************************************************* */

    //Se crean varias variables que son traidas usuarios.php por metodo POST (Formulario)
    $nombreU = $_POST["nombreU"];
    $apellidoU = $_POST["apellidoU"];
    $cedulaU = $_POST["cedulaU"];
    $direccionU = $_POST["direccionU"];
    $correoU = $_POST["correoU"];
    $telefonoU = $_POST["telefonoU"];
    $fechaU = $_POST["fechaU"];

    //Se verifica que si existe enviarU por metodo POST entonces realice una consulta
    if(isset($_POST["enviarU"]))
    {
        //Se crea una insercion de datos en la tabla USUARIOS
        $sqlU = "INSERT INTO usuarios(CED_USU, NOM_USU, APE_USU, DIR_USU, COR_INS_USU, TEL_USU, FEC_NAC_USU)values('$cedulaU', '$nombreU', '$apellidoU', '$direccionU', '$correoU', '$telefonoU', '$fechaU')";
        $consultaU = $con->prepare($sqlU);
        $consultaU -> execute();
        $lastInsertIdU = $con->lastInsertId();
        
        if($lastInsertIdU>0){

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/usuarios.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombreU  </div>";
        }else{

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/usuarios.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaU->errorInfo()); 
        }
    };

    //Se verifica que existe enviarU por metodo POST
    if(isset($_POST["enviarU"]))
    {   
        //Se crea una insercion de datos en la tabla LOGIN para crear distintos usuarios 
        $rolU = "Invitado";
        $sqlU = "INSERT INTO login(USU_LOG, PAS_LOG, ROL_LOG, NOM_USU_LOG)values('$correoU', '$cedulaU', '$rolU', '$nombreU')";
        $consultaU = $con->prepare($sqlU);
        $consultaU -> execute();
        $lastInsertIdU = $con->lastInsertId();
        
        if($lastInsertIdU>0){

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/usuarios.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $correoU  </div>";
        }else{

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/usuarios.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaU->errorInfo()); 
        }
    };

//************************************************************************* */

    //Se crean varias variables que son traidas cursos.php por metodo POST (Formulario)
    $nombreC = $_POST["nombreC"];
    $codigoC = $_POST["codigoC"];

    //Se verifica que si existe enviarC por metodo POST entonces realice una consulta
    if(isset($_POST["enviarC"]))
    {
        //Se crea una insercion de datos en la tabla CURSOS
        $sqlC = "INSERT INTO cursos(COD_CUR, NOM_CUR)values('$codigoC', '$nombreC')";
        $consultaC = $con->prepare($sqlC);
        $consultaC -> execute();
        $lastInsertIdC = $con->lastInsertId();
        
        if($lastInsertIdC>0){

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/cursos.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Nombre CURSO es : $nombreC  </div>";
        }else{

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/cursos.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaC->errorInfo()); 
        }
    };

//************************************************************************* */

    //Se crean varias variables que son traidas asignaturas.php por metodo POST (Formulario)
    $nombreA = $_POST["nombreA"];
    $codigoA = $_POST["codigoA"];
    $horasA = $_POST["horasA"];
    $cursoA = $_POST["cursoA"];
    $docenteA = $_POST["docenteA"];

    //Se verifica que si existe enviarA por metodo POST entonces realice una consulta
    if(isset($_POST["enviarA"]))
    {
        //Se crea una insercion de datos en la tabla ASIGNATURAS
        $sqlA = "INSERT INTO asignaturas(COD_ASI, NOM_ASI, HOR_ASI, CUR_ASI, DOC_ASI)values('$codigoA', '$nombreA', '$horasA', '$cursoA', '$docenteA')";
        $consultaA = $con->prepare($sqlA);
        $consultaA -> execute();
        $lastInsertIdA = $con->lastInsertId();
        
        if($lastInsertIdA>0){

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/asignaturas.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombreA  </div>";
        }else{

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/asignaturas.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaA->errorInfo()); 
        }
    };

//************************************************************************* */
    
    //Se crean varias variables que son traidas asignacionD.php por metodo POST (Formulario)
    $codigoAD = $_POST["codigoAD"];
    $docentesAD = $_POST["docentesAD"];
    $asignaturasAD = $_POST["asignaturasAD"];

    //Se verifica que si existe enviarAD por metodo POST entonces realice una consulta
    if(isset($_POST["enviarAD"]))
    {
        //Se crea una insercion de datos en la tabla ASIGNACIOND
        $sqlAD = "INSERT INTO asignacionD(COD_ASID, NOM_DOC_ASID, NOM_ASI_ASID)values('$codigoAD', '$docentesAD', '$asignaturasAD')";
        $consultaAD = $con->prepare($sqlAD);
        $consultaAD -> execute();
        $lastInsertIdAD = $con->lastInsertId();
        
        if($lastInsertIdAD>0){

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/asignacionD.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Nombre CURSO es : $nombreC  </div>";
        }else{

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/asignacionD.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaAD->errorInfo()); 
        }
    };

//************************************************************************* */

    //Se crean varias variables que son traidas asignacionE.php por metodo POST (Formulario)
    $codigoAE = $_POST["codigoAE"];
    $estudiantesAE = $_POST["estudiantesAE"];
    $asignaturasAE = $_POST["asignaturasAE"];

    //Se verifica que si existe enviarAE por metodo POST entonces realice una consulta
    if(isset($_POST["enviarAE"]))
    {
        //Se crea una insercion de datos en la tabla ASIGNACIONE
        $sqlAE = "INSERT INTO asignacionE(COD_ASIE, NOM_EST_ASIE, NOM_ASI_ASIE)values('$codigoAE', '$estudiantesAE', '$asignaturasAE')";
        $consultaAE = $con->prepare($sqlAE);
        $consultaAE -> execute();
        $lastInsertIdAE = $con->lastInsertId();
        
        if($lastInsertIdAE>0){

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/asignacionE.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Nombre CURSO es : $nombreC  </div>";
        }else{

            //Se redirige a la pagina principal de envio
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/asignacionE.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaAE->errorInfo()); 
        }
    };

//************************************************************************* */
    
    //Se crean varias variables que son traidas asignacion.php (Docentes) por metodo POST (Formulario)
    $codigoAsignatura = $_SESSION['codigoAsignatura'];
    $codigoDocente = $_SESSION['codigoDocente'];
    $nombreAsig = $_POST["nombreAsig"];
    $descripcionAsig = $_POST["descripcionAsig"];
    $fechaAsig = $_POST["fechaAsig"];

    //Se verifica que si existe enviarAsig por metodo POST entonces realice una consulta
    if(isset($_POST["enviarAsig"]))
    { 
        //Se verifica  que se envie un archivo
        if(is_uploaded_file($_FILES['archivoAsig']['tmp_name'])){

            $ruta = "../BD/archivos/"; 
            $nombrefinal= trim ($_FILES['archivoAsig']['name']); 
            $rutaFinal= $ruta.$nombrefinal;  
            $upload= $ruta.$nombrefinal;  

            //Se verifica que existe el archivo
            if(move_uploaded_file($_FILES['archivoAsig']['tmp_name'], $upload)) { 
                    
                $nombre = $_FILES['archivoAsig']['name'];
                $tipo = $_FILES['archivoAsig']['type'];  
                $tamano = $_FILES['archivoAsig']['size'];
            
                //Se crea una insercion de datos en la tabla ASIGNACION_DEBERES
                $sqlAsig = "INSERT INTO asignacion_deberes(COD_ASI, COD_DOC, NOM_ASIG, DES_ASIG, FEC_ASIG, NOM_ARCH, RUT_ARCH, TIP_ARCH, TAM_ARCH)values('$codigoAsignatura', '$codigoDocente', '$nombreAsig', '$descripcionAsig', '$fechaAsig', '$nombrefinal', '$rutaFinal', '$tipo', '$tamano')";
                $consultaAsig = $con->prepare($sqlAsig);
                $consultaAsig -> execute();
                $lastInsertIdAsig = $con->lastInsertId();
            
                if($lastInsertIdAsig>0){

                    //Se redirige a la pagina principal de envio
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Docentes/asignacion.php'>";
                    echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombreU  </div>";
                }else{

                    //Se redirige a la pagina principal de envio
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/usuarios.php'>";
                    echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                    print_r($consultaAsig->errorInfo()); 
                }
            };
        }else{
                //Si no hay un archivo
                //Se crea una insercion de datos en la tabla asignacion_deberes (Sin datos de archivo)
                $sqlAsig = "INSERT INTO asignacion_deberes(COD_ASI, COD_DOC, NOM_ASIG, DES_ASIG, FEC_ASIG)values('$codigoAsignatura', '$codigoDocente', '$nombreAsig', '$descripcionAsig', '$fechaAsig')";
                $consultaAsig = $con->prepare($sqlAsig);
                $consultaAsig -> execute();
                $lastInsertIdAsig = $con->lastInsertId();
            
                if($lastInsertIdAsig>0){

                    //Se redirige a la pagina principal de envio
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Docentes/asignacion.php'>";
                    echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombreU  </div>";
                }else{

                    //Se redirige a la pagina principal de envio
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/usuarios.php'>";
                    echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                    print_r($consultaAsig->errorInfo()); 
                }
        }
    };

    //************************************************************************* */
    
    //Se crean varias variables que son traidas asignacion.php (Estudiantes) por metodo POST (Formulario)
    $codigoAsignacion = $_SESSION['codigoAsignacion'];
    $codigoEstudiante = $_SESSION['codigoEstudiante'];
    $descripcionAsig = $_POST["informacionnAsig"];

    //Se verifica que si existe enviarAsigE por metodo POST entonces realice una consulta
    if(isset($_POST["enviarAsigE"]))
    { 

        //Se verifica  que se envie un archivo
        if(is_uploaded_file($_FILES['archivoAsig2']['tmp_name'])){

            //Se crean variables de la ruta del archivo
            $ruta = "../BD/archivos/"; 
            $nombrefinal= trim ($_FILES['archivoAsig2']['name']); 
            $rutaFinal= $ruta.$nombrefinal;  
            $upload= $ruta.$nombrefinal;  

            //Se verifica que existe el archivo
            if(move_uploaded_file($_FILES['archivoAsig2']['tmp_name'], $upload)) { 
                
                //Se crean varias variables segun las caracteristicas del archivo
                $nombre = $_FILES['archivoAsig2']['name'];
                $tipo = $_FILES['archivoAsig2']['type'];  
                $tamano = $_FILES['archivoAsig2']['size'];
            
                //Se crea una insercion de datos en la tabla DETALLE_ASIGNACION
                $sqlAsig = "INSERT INTO detalle_asignacion(COD_ASIG_DEB, ID_EST_ASIG, DES_ASIG_DEB, NOM_ARCH, RUT_ARCH, TIP_ARCH, TAM_ARCH)values('$codigoAsignacion', '$codigoEstudiante', '$descripcionAsig', '$nombre', '$rutaFinal', '$tipo', '$tamano')";
                $consultaAsig = $con->prepare($sqlAsig);
                $consultaAsig -> execute();
                $lastInsertIdAsig = $con->lastInsertId();
            
                if($lastInsertIdAsig>0){

                    //Se redirige a la pagina principal de envio
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignatura.php'>";
                    echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es 2: $nombreU  </div>";
                }else{

                    //Se redirige a la pagina principal de envio
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignatura.php'>";
                    echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                    print_r($consultaAsig->errorInfo()); 
                }
            };
        }else{
                //Si no hay un archivo
                //Se crea una insercion de datos en la tabla detalle_asignacion (Sin datos de archivo)
                $sqlAsig = "INSERT INTO detalle_asignacion(COD_ASIG_DEB, ID_EST_ASIG, DES_ASIG_DEB)values('$codigoAsignacion', '$codigoEstudiante', '$descripcionAsig')";
                $consultaAsig = $con->prepare($sqlAsig);
                $consultaAsig -> execute();
                $lastInsertIdAsig = $con->lastInsertId();
            
                if($lastInsertIdAsig>0){

                    //Se redirige a la pagina principal de envio
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignatura.php'>";
                    echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es 1: $nombreU  </div>";
                }else{

                    //Se redirige a la pagina principal de envio
                    echo "<meta http-equiv='refresh' content='0;url=../Paginas/Estudiantes/asignatura.php'>";
                    echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
                    print_r($consultaAsig->errorInfo()); 
                }
        };
    };
?>