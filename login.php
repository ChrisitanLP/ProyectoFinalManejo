<?php
    session_start();
    if(isset($_SESSION['u']))
        header("Location: indexAdmin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="JS/JqueryLib.js"></script>
    <script>
        $(document).ready(function(){
            $("#ingresar").click(function(){
                var usuario = $("#usuario").val();
                var clave = $("#clave").val();

                $.post("validar.php",{
                    u: usuario,
                    c:clave
                },
                function(data, status){
                    if(data == 1){
                        location.href = 'index.php';
                    }
                });
            });
        });
    </script>
</head>
<body>
    
</body>
</html>