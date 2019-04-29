<?php 
// include Database connection file

include ("../config.php");

 
//para actualizar al paciente antes debemos obtener los datos de el
if((isset($_POST['id']) && isset($_POST['id']) != "") && (isset($_POST['id_tratamiento']) && isset($_POST['id_tratamiento']) != ""))
{
    // obtenemos id del paciente
    $paciente_id = $_POST['id'];
    $tratamiento_id = $_POST['id_tratamiento'];
    

    //select para modificar muestra pero trayendo informacion del paciente, muestras y trazabilidad
    $query = "                SELECT c.descripcion,c.nombre_archivo, c.fecha_pdf
                     FROM pacientes p
                     INNER JOIN tratamientos t ON p.id_paciente = t.pacientes_id_paciente
                     INNER JOIN cultivos c ON t.id_tratamiento = c.tratamientos_id_tratamiento
                     
                     WHERE id_paciente = $paciente_id and id_tratamiento = $tratamiento_id
                     ORDER BY c.fecha_pdf DESC;";           

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;//recuperamos en un array las fechas desde la base
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