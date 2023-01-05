<?php
    include("conectar.php");
    $con = conectar();

    $nombreD = $_POST["nombreD"];
    $apellidoD = $_POST["apellidoD"];
    $cedulaD = $_POST["cedulaD"];
    $direccionD = $_POST["direccionD"];
    $correoD = $_POST["correoD"];
    $telefonoD = $_POST["telefonoD"];
    $fechaD = $_POST["fechaD"];

    if(isset($_POST["enviarD"]))
    {
        $sqlD = "INSERT INTO docentes(CED_DOC, NOM_DOC, APE_DOC, DIR_DOC, COR_INS_DOC, TEL_DOC, FEC_NAC_DOC)values('$cedulaD', '$nombreD', '$apellidoD', '$direccionD', '$correoD', '$telefonoD', '$fechaD')";
        $consultaD = $con->prepare($sqlD);
        $consultaD -> execute();
        $lastInsertIdD = $con->lastInsertId();
        
        if($lastInsertIdD>0){
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/docentes.php'>";
            echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombreD  </div>";
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../Paginas/Admin/docentes.php'>";
            echo "<div class='content alert alert-danger'> No se pueden agregar datos </div>";
            print_r($consultaD->errorInfo()); 
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

    $nombreE = $_POST["nombreE"];
    $apellidoE = $_POST["apellidoE"];
    $cedulaE = $_POST["cedulaE"];
    $direccionE = $_POST["direccionE"];
    $correoE = $_POST["correoE"];
    $telefonoE = $_POST["telefonoE"];
    $fechaE = $_POST["fechaE"];

    if(isset($_POST["enviarE"]))
    {
        $sqlE = "INSERT INTO estudiantes(CED_EST, NOM_EST, APE_EST, DIR_EST, COR_INS_EST, TEL_EST, FEC_NAC_EST)values('$cedulaE', '$nombreE', '$apellidoE', '$direccionE', '$correoE', '$telefonoE', '$fechaE')";
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
?>