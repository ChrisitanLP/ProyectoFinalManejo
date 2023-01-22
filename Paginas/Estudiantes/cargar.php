<?php

    //Se verifica que existe id por metodo GET
    if(!empty($_GET['id'])){


        $fileName = basename($_GET['id']);
        $filePath = '../../BD/archivos/'.$fileName;

        //Se verifica la existencia del archivo
        if(!empty($fileName) && file_exists($filePath)){
            
            // Define los encabezados
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$fileName");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");
            
            // Lee el archivo
            readfile($filePath);
            exit;
        }else{
            echo 'El archivo no Existe.';
        }
    }else{
        echo 'No hay';
    }
?>