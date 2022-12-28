<?php
    session_start();
    if(isset($_SESSION['u']))
        header("Location: index.php");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/styleLogin.css">

    <script src="JS/JqueryLib.js"></script>
    <script>
        $(document).ready(function(){
            $("#ingresar").click(function(){
                var usuario= $("#usuario").val();
                var clave= $("#clave").val();

                $.post("Conexion/validar.php",
                {
                    u: usuario,
                    c: clave
                },
            
                function(data, status){
                    alert("valor:"+data+" Estado:"+status);
                    if(data==1){
                        location.href = 'index.php';
                    }
                });
            });
        });
    </script>
	
</head>
<body>
    <div id="login-bg" class="container-fluid">

    <div class="bg-img"></div>
    <div class="bg-color"></div>
    </div>
    <div class="container" id="login">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="login">

                    <h1>Login</h1>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="usuario" aria-describedby="emailHelp" placeholder="Ingrese Usuario">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="clave" placeholder="Ingrese Contraseña">
                        </div>
                        <div class="form-group">
                            <select name="seleccionar" id="seleccionar">
                                <option value="0" style="display:none;"><label>Seleccionar ocupación</label></option>
                                <option value="admin">Administrador</option>
                                <option value="docente">Docente</option>
                                <option value="estudiante">Estudiante</option>
                            </select>
                        </div>

                        <div class="form-check">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                            <label class="form-check-label" for="exampleCheck1">Recordar Contraseña</label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-lg btn-block btn-success" id="ingresar">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
