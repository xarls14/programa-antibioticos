<?php 
if(isset($_POST['id']) && isset($_POST['id']) != ""){
	
	include ("../config.php");

    $usuario_id = $_POST['id'];
    
    
    $password = 123456; 

        //enscriptamos la password con funcion password_hash
    $password_hash = password_hash($password, PASSWORD_DEFAULT);



	$query = "UPDATE usuarios
        SET password = '$password_hash'
        WHERE id_usuario = '$usuario_id'
        ";

	if(!$result = mysqli_query($link, $query)){
		mysqli_rollback($con);
		exit(mysqli_error($link));
	}
	echo("El usuario seleccionado se ha eliminado correctamente.");
}
 ?>