<?php
     if(isset($_SESSION)){
        $_SESSION['u']="";
    }else{
        session_start();
        $_SESSION['u']="";
    }
    include_once("conectar.php");
    $conexion=mysqli_connect("localhost","root","","manejo");
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];

    //session_start();
    $_SESSION['usuario'] = $usuario;

    $consulta="SELECT*FROM LOGIN where USU_LOG='$usuario' and PAS_LOG='$contraseña'";
    $resultado=mysqli_query($conexion,$consulta);
    
    $filas=mysqli_fetch_array($resultado);

    $_SESSION['rol'] = $filas['ROL_LOG'];

    if($filas['ROL_LOG']=="Administrador"){ //administrador
        header("location:../Paginas/Admin/pag_admin.php");
    }else
        if($filas['ROL_LOG']=="Docente"){ //cliente
            header("location:../Paginas/Docentes/pag_docentes.php");
        }
        else{
            if($filas['ROL_LOG']=="Estudiante"){ //cliente
                header("location:../Paginas/Estudiantes/pag_estudiantes.php");
            }else{
                header("location:../login.php"); 
            }
        }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>
<?php
    //echo "Hola Mundo";
    if(isset($_SESSION)){
        $_SESSION['u']="";
    }else{
        session_start();
        $_SESSION['u']="";
    }
    include_once("conectar.php");
    if(isset($_POST['u'])){
        $con = conectar();
        $query = "SELECT COUNT(*)cantidad FROM usuarios WHERE nom_usuario = ? AND passwordd = ? ";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute(array($_POST['u'],$_POST['c']));
        $r = $sentencia -> fetch();
        
        if($r['cantidad']==1){
            $_SESSION['u']= $_POST['u'];
        }

        echo $r['cantidad'];
    }
?>