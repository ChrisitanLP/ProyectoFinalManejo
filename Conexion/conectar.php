<?php
    function conectar(){

        $servidor = "localhost";
        $usuario = "root";
        $clave = "";
        $nombreBD = "manejo";

        $con = new PDO('mysql:host='.$servidor.';dbname='.$nombreBD, $usuario, $clave);
       
        return $con;
    }

?>