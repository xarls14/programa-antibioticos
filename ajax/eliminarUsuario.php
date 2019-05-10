<?php 
if(isset($_POST['id']) && isset($_POST['id']) != ""){
	
	include ("../config.php");

	$usuario_id = $_POST['id'];

	//para realizar el eliminado de un paciente ahora debemos eliminar primero la trazabilidad -> muestra -> paciente

	mysqli_autocommit($link, false);

			$query = "DELETE FROM usuarios WHERE id_usuario = '$usuario_id'";

            mysqli_query($link, $query);

            mysqli_commit($link);

	if(!$result = mysqli_query($link, $query)){
		mysqli_rollback($con);
		exit(mysqli_error($link));
	}
	echo("El usuario seleccionado se ha eliminado correctamente.");
}
 ?>