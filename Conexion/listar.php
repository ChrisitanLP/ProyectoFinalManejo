<?php

    //Se incluye la pagina conectar que trae un metodo
    include_once("conectar.php");

//************************************************************************* */

    //Se crea un metodo que permite listar a todos los DOCENTES
    function listarDocentes(){

        //Se realiza una consulta en la tabla de DOCENTES
        $con = conectar();
        $query = "SELECT * FROM docentes";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();
        
        //Lista los DOCENTES en estructura de tabla
        $filas = "";
        foreach($r as $listado){
            $filas.='<tr>
                        <td>'.$listado['CED_DOC'].'</td>
                        <td>'.$listado['NOM_DOC'].'</td>
                        <td>'.$listado['APE_DOC'].'</td>
                        <td>'.$listado['DIR_DOC'].'</td>
                        <td>'.$listado['COR_INS_DOC'].'</td>
                        <td>'.$listado['TEL_DOC'].'</td>
                        <td>'.$listado['FEC_NAC_DOC'].'</td>
                    </tr>';
        }    
        return $filas;
    }

//************************************************************************* */

    //Se crea un metodo que permite listar a todos los ESTUDIANTES
    function listarEstudiantes(){

        //Se realiza una consulta en la tabla de ESTUDIANTES
        $con = conectar();
        $query = "SELECT * FROM estudiantes";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();
        
        //Lista los ESTUDIANTES en estructura de tabla
        $filas = "";
        foreach($r as $listado){
            $filas.='<tr>
                        <td>'.$listado['CED_EST'].'</td>
                        <td>'.$listado['NOM_EST'].'</td>
                        <td>'.$listado['APE_EST'].'</td>
                        <td>'.$listado['DIR_EST'].'</td>
                        <td>'.$listado['COR_INS_EST'].'</td>
                        <td>'.$listado['TEL_EST'].'</td>
                        <td>'.$listado['FEC_NAC_EST'].'</td>
                        
                    </tr>';
        }    
        return $filas;
    }

//************************************************************************* */

    //Se crea un metodo que permite listar a todos los USUARIOS
    function listarUsuarios(){

        //Se realiza una consulta en la tabla de USUARIOS
        $con = conectar();
        $query = "SELECT * FROM usuarios";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();
        
        //Lista los USUARIOS en estructura de tabla
        $filas = "";
        foreach($r as $listado){
            $filas.='<tr>
                        <td>'.$listado['CED_USU'].'</td>
                        <td>'.$listado['NOM_USU'].'</td>
                        <td>'.$listado['APE_USU'].'</td>
                        <td>'.$listado['DIR_USU'].'</td>
                        <td>'.$listado['COR_INS_USU'].'</td>
                        <td>'.$listado['TEL_USU'].'</td>
                        <td>'.$listado['FEC_NAC_USU'].'</td>
                        
                    </tr>';
        }    
        return $filas;
    }

//************************************************************************* */

    //Se crea un metodo que permite listar a todos los CURSOS
    function listarCursos(){

        //Se realiza una consulta en la tabla de CURSOS
        $con = conectar();
        $query = "SELECT * FROM cursos";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();
        
        //Lista los CURSOS en estructura de tabla
        $filas = "";
        foreach($r as $listado){
            $filas.='<tr>
                        <td>'.$listado['COD_CUR'].'</td>
                        <td>'.$listado['NOM_CUR'].'</td>
                    </tr>';
        }    
        return $filas;
    }

//************************************************************************* */

    //Se crea un metodo que permite listar a todos los ASIGNATURAS
    function listarAsignaturas(){

        //Se realiza una consulta en la tabla de ASIGNATURAS
        $con = conectar();
        $query = "SELECT * FROM asignaturas";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();
        
        //Lista las ASIGNATURAS en estructura de tabla
        $filas = "";
        foreach($r as $listado){
            $filas.='<tr>
                        <td>'.$listado['COD_ASI'].'</td>
                        <td>'.$listado['NOM_ASI'].'</td>
                        <td>'.$listado['HOR_ASI'].'</td>
                        <td>'.$listado['CUR_ASI'].'</td>
                        <td>'.$listado['DOC_ASI'].'</td>
                    </tr>';
        }    
        return $filas;
    }

//************************************************************************* */

    //Se crea un metodo que permite consultar (ID/ NOMBRE) todos los CURSOS
    function consultaCursos(){

        //Se realiza una consulta en la tabla de CURSOS
        $con = conectar();
        $query = "SELECT * FROM cursos";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();

        //Lista los Cursos como OPTION de un SELECT
        $opciones = "";
        foreach($r as $p){
           $opciones.= '<option value='.$p['id'].'>'.$p['NOM_CUR'].'</option>';
        }
        return $opciones;
    }

//************************************************************************* */

    //Se crea un metodo que permite consultar (ID/ NOMBRE) todas las ASIGNATURAS
    function consultaAsignaturas(){

        //Se realiza una consulta en la tabla de ASIGNATURAS
        $con = conectar();
        $query = "SELECT * FROM asignaturas";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();

        //Lista las ASIGNATURAS como OPTION de un SELECT
        $opciones = "";
        foreach($r as $p){
           $opciones.= '<option value='.$p['id'].'>'.$p['NOM_ASI'].'</option>';
        }
        return $opciones;
    }

//************************************************************************* */

    //Se crea un metodo que permite consultar (ID/ NOMBRE) todos los DOCENTES
    function consultaDocentes(){

        //Se realiza una consulta en la tabla de DOCENTES
        $con = conectar();
        $query = "SELECT * FROM docentes";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();

        //Lista los DOCENTES como OPTION de un SELECT
        $opciones = "";
        foreach($r as $p){
           $opciones.= '<option value='.$p['id'].'>'.$p['NOM_DOC'].'</option>';
        }
        return $opciones;
    }

//************************************************************************* */

    //Se crea un metodo que permite consultar (ID/ NOMBRE) todos los ESTUDIANTES
    function consultaEstudiantes(){

        //Se realiza una consulta en la tabla de ESTUDIANTES
        $con = conectar();
        $query = "SELECT * FROM estudiantes";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();

        //Lista los ESTUDIANTES como OPTION de un SELECT
        $opciones = "";
        foreach($r as $p){
           $opciones.= '<option value='.$p['id'].'>'.$p['NOM_EST'].'</option>';
        }
        return $opciones;
    }
?>