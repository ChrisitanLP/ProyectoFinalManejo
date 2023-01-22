<?php

    //Se crea un metodo que permite crear una conexion a la BD
    function conectar(){

        $servidor = "localhost";
        $usuario = "root";
        $clave = "";
        $nombreBD = "manejo";

        $con = new PDO('mysql:host='.$servidor.';dbname='.$nombreBD, $usuario, $clave);
       
        return $con;
    }

?>