<?php 
// include Database connection file

include ("../config.php");

 
//para actualizar al paciente antes debemos obtener los datos de el
if((isset($_POST['id']) && isset($_POST['id']) != "") && (isset($_POST['id_tratamiento']) && isset($_POST['id_tratamiento']) != "") && (isset($_POST['id_antibiotico']) && isset($_POST['id_antibiotico']) != ""))
{
    // obtenemos id del paciente
    $paciente_id = $_POST['id'];
    $tratamiento_id = $_POST['id_tratamiento'];
    $antibiotico_id = $_POST['id_antibiotico'];

    //select para modificar muestra pero trayendo informacion del paciente, muestras y trazabilidad
    $query = "                SELECT *
                     FROM pacientes p
                     INNER JOIN tratamientos t ON p.id_paciente = t.pacientes_id_paciente
                     INNER JOIN antibioticos a ON t.id_tratamiento = a.tratamientos_id_tratamiento
                     
                     WHERE id_paciente = $paciente_id and id_tratamiento = $tratamiento_id and id_antibiotico = $antibiotico_id;";           

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