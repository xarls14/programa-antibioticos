
<?php

include ("../config.php");
 
// check request
if(isset($_POST))
{
    //tomamos los datos que vienen de los script y se asignan a una nueva variable
    $id = mysqli_real_escape_string($link, $_POST["id"]); 
    $tratamiento_id = mysqli_real_escape_string($link, $_POST["id_tratamiento"]); 
    $antibiotico_id = mysqli_real_escape_string($link, $_POST["id_antibiotico"]); 
    $dia_tratamiento = mysqli_real_escape_string($link, $_POST["dias_tratamiento"]);
    $num_frasco = mysqli_real_escape_string($link, $_POST["num_frasco"]); 
    $fecha = mysqli_real_escape_string($link, $_POST["fecha"]);
    $medico_prescripcion = mysqli_real_escape_string($link, $_POST["medico_prescripcion"]); 
    
    
 
    /*comprobado que se puede agregar trazabilidad y cambiar el estado*/
    
    $query1 = "UPDATE pacientes, tratamientos, antibioticos 
            SET num_frasco = '$num_frasco', dias_tratamiento = '$dia_tratamiento'
            WHERE id_paciente = '$id' 
            AND id_tratamiento = '$tratamiento_id'
            AND id_antibiotico = '$antibiotico_id'

            ";
    $result = mysqli_query($link, $query1);  

    if(!$result){
        $flag = false;
        echo "Detalles de error: ".mysqli_error($link).".";
    }  

    $query2 = "INSERT INTO fecha_tratamiento(fecha, antibioticos_id_antibiotico, antibioticos_tratamientos_id_tratamiento, medico_prescripcion)
                        VALUES('$fecha', '$antibiotico_id', '$tratamiento_id', '$medico_prescripcion')";


    $result = mysqli_query($link, $query2);    
    if(!$result){
        $flag = false;
        echo "Detalles de error: ".mysqli_error($link).".";
    } 

    /*tercera query para traer datos de vuelta y poder manejarlos y enviarlos por post a la funcion de enviar email por php*/

    $query3 = "SELECT *
    FROM pacientes p
    INNER JOIN tratamientos t ON p.id_paciente = t.pacientes_id_paciente
    INNER JOIN antibioticos a ON t.id_tratamiento = a.tratamientos_id_tratamiento
    
    WHERE id_paciente = $id and id_tratamiento = $tratamiento_id and id_antibiotico = $antibiotico_id;";


    $result = mysqli_query($link, $query3);    
    if(!$result){
        $flag = false;
        echo "Detalles de error: ".mysqli_error($link).".";
    } 

    /*$query = "UPDATE pacientes, muestras SET tipo_muestra = '$tipo_muestra', establecimiento_origen = 'HPL' , areas_id_area = '$unidad_origen', num_frasco = '$num_frasco' WHERE id_muestra = '$id'";*/

    /*$query = "UPDATE antibioticos SET tipo_muestra = '$tipo_muestra' WHERE id_antibiotico = '$id'";*/

    /*if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }*/
    echo "Nuevo día de tratamiento ingresado correctamente.";

}