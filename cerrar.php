<?php

    session_start();
    session_destroy();
    session_abort();
    session_unset(); 
    $_SESSION['u']="";
    echo "Saliendo<br>";
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";

?>