<?php

	//Se incluye la pagina listar que trae metodos de consulta
    include_once("listar.php");

	//Se traen archivos por metodo ajax
    if (isset($_GET['action_type']) && $_GET['action_type'] == 'docente') {
		
		//lista a todos los docentes
		echo (consultaDocentes());
	}

	//Se traen archivos por metodo ajax
    if (isset($_GET['action_type']) && $_GET['action_type'] == 'asignatura') {
		
		//lista a todas las asignaturas
		echo (consultaAsignaturas());
	}

	//Se traen archivos por metodo ajax
    if (isset($_GET['action_type']) && $_GET['action_type'] == 'estudiante') {
		
		//lista a todos los estudiantes
		echo (consultaEstudiantes());
	}

	//Se traen archivos por metodo ajax
	if (isset($_GET['action_type']) && $_GET['action_type'] == 'curso') {
		
		//lista a todos los cursos
		echo (consultaCursos());
	}

	if(isset($_POST['opcion']) && $_POST['opcion']==1){
		$con = conectar();
		$query = "UPDATE detalle_asignacion SET NOT_ASIG=? WHERE  id = ?";
		$sentencia = $con->prepare($query);
	
		$sentencia->execute(array($_POST['nota'], $_POST['asignacion_id']));
		
		echo ("Usuario editado");
	}
?>
