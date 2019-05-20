<?php 
if(isset($_POST['id']) && isset($_POST['id']) != ""){
	
	include ("../config.php");

	$antibiotico_id = $_POST['id'];
	$tratamiento_id = $_POST['id_tratamiento'];

	//para realizar el eliminado de un paciente ahora debemos eliminar primero la trazabilidad -> muestra -> paciente

	/*$query = "DELETE FROM pacientes, muestras, trazabilidad WHERE id_paciente = '$paciente_id'";*/

	mysqli_autocommit($link, false);

            /*$query = "DELETE t
			FROM pacientes p
			INNER JOIN muestras m
			ON p.id_paciente = m.pacientes_id_paciente
			INNER JOIN trazabilidad t
			ON m.id_muestra = t.muestras_id_muestra
			where m.id_muestra = '$antibiotico_id'";

			mysqli_query($link, $query);
			


			mysqli_autocommit($link, false);
			$flag = true;

			$query1 = "INSERT INTO pacientes(nombres, apellidos, rut, fecha_ingreso, sala_cama, areas_id_area) VALUES('$nombre','$apellido','$rut', now(), '$sala_cama', '1')";

			$result = mysqli_query($link, $query1);

			$idPaciente = mysqli_insert_id($link);
			
			
			if(!$result){
				$flag = false;
				echo "Detalles de error: ".mysqli_error($link).".";
			}
			
			*/

			mysqli_autocommit($link, false);
			$flag = true;

			/*eliminamos primero todo lo perteneciente a fechas de tratamiento de dicho antibiotico*/
			$query1 = "DELETE FROM fecha_tratamiento WHERE antibioticos_id_antibiotico = '$antibiotico_id'
													 AND antibioticos_tratamientos_id_tratamiento = '$tratamiento_id'";
			$result = mysqli_query($link, $query1);

            if(!$result){
				$flag = false;
				echo "Detalles de error: ".mysqli_error($link).".";
			}

			/*eliminamos observaciones pertenecientes a dicho antibiotico*/ 

			$query2 = "DELETE FROM observaciones WHERE antibioticos_id_antibiotico = '$antibiotico_id'
												AND antibioticos_tratamientos_id_tratamiento = '$tratamiento_id'";

			$result = mysqli_query($link, $query2);

			if(!$result){
				$flag = false;
				echo "Detalles de error: ".mysqli_error($link).".";
			}


			/*por ultimo eliminamos el antibiotico*/
			$query3 = "DELETE FROM antibioticos WHERE id_antibiotico = '$antibiotico_id'";

            $result = mysqli_query($link, $query3);

			if(!$result){
				$flag = false;
				echo "Detalles de error: ".mysqli_error($link).".";
			}

			if($flag){
				mysqli_commit($link);
				echo "El antibiotico seleccionado se ha eliminado correctamente.";
			}else{
				mysqli_rollback($link);
				echo "All queries were rolled back";
			}

	/*if(!$result = mysqli_query($link, $query)){
		mysqli_rollback($con);
		exit(mysqli_error($link));
	}*/
	//echo("El antibiotico seleccionado se ha eliminado correctamente.");
}
 ?>