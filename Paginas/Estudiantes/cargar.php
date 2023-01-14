<?php
if(!empty($_GET['id'])){
    $fileName = basename($_GET['id']);
    $filePath = '../../BD/archivos/'.$fileName;
    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
        exit;
    }else{
        echo 'El archivo no Existe.';
    }
}else{
    echo 'No hay';
}