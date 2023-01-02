<?php
    include_once("listar.php");

    if (isset($_GET['action_type']) && $_GET['action_type'] == 'docente') {
		
		echo (consultaDocentes());
	}
    if (isset($_GET['action_type']) && $_GET['action_type'] == 'asignatura') {
		
		echo (consultaAsignaturas());
	}
?>
