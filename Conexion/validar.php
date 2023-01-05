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
    $_SESSION['contraseña'] = $contraseña;


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
/*
    $consulta="SELECT*FROM LOGIN where USU_LOG='$usuario' and PAS_LOG='$contraseña'";
    $resultado=mysqli_query($conexion,$consulta);
    $filas=mysqli_fetch_array($resultado);
*/
?>