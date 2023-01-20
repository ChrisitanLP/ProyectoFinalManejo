<?php
    //Inicia la sesion actual
    session_start();

    //Destruye la sesion actual
    session_destroy();

     //Se utilizan varios metodos de eliminacion para asegurar la destrucion
    //de variables de sesion
    session_abort();
    session_unset(); 
    $_SESSION['u']="";

    //Se redirige al login
    echo "Saliendo<br>";
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
?>