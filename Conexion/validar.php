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
        $query = "SELECT COUNT(*)cantidad FROM login WHERE USU_LOG = ? AND PAS_LOG = ? ";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute(array($_POST['u'],$_POST['c']));
        $r = $sentencia -> fetch();
        
        if($r['cantidad']==1){
            $_SESSION['u']= $_POST['u'];
        }

        echo $r['cantidad'];
    }
?>