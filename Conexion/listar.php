<?php
    include_once("conectar.php");

    function listarDocentes(){
        $con = conectar();

        $query = "SELECT * FROM docentes";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();
        
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

    function listarEstudiantes(){
        $con = conectar();
        $query = "SELECT * FROM estudiantes";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();
        
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

    function listarUsuarios(){
        $con = conectar();
        $query = "SELECT * FROM usuarios";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();
        
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

    function listarCursos(){
        $con = conectar();
        $query = "SELECT * FROM cursos";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();
        
        $filas = "";
        foreach($r as $listado){
            $filas.='<tr>
                        <td>'.$listado['COD_CUR'].'</td>
                        <td>'.$listado['NOM_CUR'].'</td>
                    </tr>';
        }    
        return $filas;
    }

    function listarAsignaturas(){
        $con = conectar();
        $query = "SELECT * FROM asignaturas";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();
        
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

    function consultaCursos(){
        $con = conectar();
        $query = "SELECT * FROM cursos";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();

        $opciones = "";
        foreach($r as $p){
           $opciones.= '<option value='.$p['id'].'>'.$p['NOM_CUR'].'</option>';
        }
        return $opciones;
    }


    function consultaAsignaturas(){
        $con = conectar();
        $query = "SELECT * FROM asignaturas";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();

        $opciones = "";
        foreach($r as $p){
           $opciones.= '<option value='.$p['id'].'>'.$p['NOM_ASI'].'</option>';
        }
        return $opciones;
    }

    function consultaDocentes(){
        $con = conectar();

        $query = "SELECT * FROM docentes";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();

        $opciones = "";
        foreach($r as $p){
           $opciones.= '<option value='.$p['id'].'>'.$p['NOM_DOC'].'</option>';
        }
        return $opciones;
    }

    function consultaEstudiantes(){
        $con = conectar();

        $query = "SELECT * FROM estudiantes";
        $sentencia = $con -> prepare($query);
        $sentencia -> execute();
        $r = $sentencia -> fetchAll();

        $opciones = "";
        foreach($r as $p){
           $opciones.= '<option value='.$p['id'].'>'.$p['NOM_EST'].'</option>';
        }
        return $opciones;
    }
?>