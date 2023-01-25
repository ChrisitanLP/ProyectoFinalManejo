<?php    
    //Se verifica que exista una sesion
     if(isset($_SESSION)){
        $_SESSION['u']="";
    }else{
        session_start();
        $_SESSION['u']="";
    }

    //Se incluye la pagina conectar que trae un metodo
    include_once("conectar.php");
    $conexion=mysqli_connect("localhost","root","","manejo");

    //Se crean variables con los datos traidos del login
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];

    //Se crea una variable de sesion (Usuario)
    $_SESSION['usuario'] = $usuario;

    //Se crea una consulta SQL que trae todos os datos de la tabla LOGIN
    $consulta="SELECT*FROM LOGIN where USU_LOG='$usuario' and PAS_LOG='$contraseña'";
    $resultado=mysqli_query($conexion,$consulta);
    $filas=mysqli_fetch_array($resultado);

    if($filas['USU_LOG'] = ""){
        $advertencia = 1;
        echo "Usuario no existe ".$usuario." ".$contraseña." o hubo un error ";
        echo mysqli_error($mysqli);
        // si la consulta falla es bueno evitar que el código se siga ejecutando
        exit;
    }

    //Se crean variables de sesion (Rol/Contraseña)
    $_SESSION['rol'] = $filas['ROL_LOG'];
    $_SESSION['contraseña'] = $contraseña;


    //Segun el tipo de rol del usuario se permite el ingreso a ciertas paginas
    //Administrador
        if($filas['ROL_LOG']=="Administrador"){ 
            header("location:../Paginas/Admin/pag_admin.php");
        }else
            //Docente
            if($filas['ROL_LOG']=="Docente"){ 
                header("location:../Paginas/Docentes/pag_docentes.php");
            }
            else{
                //Estudiante
                if($filas['ROL_LOG']=="Estudiante"){ 
                    header("location:../Paginas/Estudiantes/pag_estudiantes.php");
                }else{
                    //Si no existe un rol, se redirige al login
                    header("location:../login.php"); 
                }
            }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>