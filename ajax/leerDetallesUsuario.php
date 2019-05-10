<?php 
// include Database connection file

include ("../config.php");

 
//para actualizar al paciente antes debemos obtener los datos de el
if((isset($_POST['id']) && isset($_POST['id']) != ""))
{
    // obtenemos id del paciente
    $usuario_id = $_POST['id'];

    //select para modificar muestra pero trayendo informacion del paciente, muestras y trazabilidad
    $query = "                SELECT *
                     FROM usuarios
                     WHERE id_usuario = $usuario_id;";           

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
?>