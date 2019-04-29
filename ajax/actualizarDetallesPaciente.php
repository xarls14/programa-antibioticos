
<?php

include ("../config.php");
 
// check request
if(isset($_POST))
{
    //tomamos los datos que vienen de los script y se asignan a una nueva variable
    $id = mysqli_real_escape_string($link, $_POST["id"]); 
    $tratamiento_id = mysqli_real_escape_string($link, $_POST["id_tratamiento"]); 
    $antibiotico_id = mysqli_real_escape_string($link, $_POST["id_antibiotico"]); 


    $nombres = mysqli_real_escape_string($link, $_POST["nombres"]);  
    $apellidos = mysqli_real_escape_string($link, $_POST["apellidos"]); 
    $rut = mysqli_real_escape_string($link, $_POST["rut"]);  
    $sala_cama = mysqli_real_escape_string($link, $_POST["sala_cama"]); 
    $dosis = mysqli_real_escape_string($link, $_POST["dosis"]);  
    $antibiotico = mysqli_real_escape_string($link, $_POST["nombre"]); 
 
    /*comprobado que se puede agregar trazabilidad y cambiar el estado*/
    
    $query = "UPDATE pacientes, tratamientos, antibioticos 
            SET nombres = '$nombres', apellidos = '$apellidos', rut = '$rut', sala_cama = '$sala_cama', dosis = '$dosis', nombre = '$antibiotico' 
            WHERE id_paciente = '$id' 
            AND id_tratamiento = '$tratamiento_id'
            AND id_antibiotico = '$antibiotico_id'

            ";

    /*$query = "UPDATE pacientes, muestras SET tipo_muestra = '$tipo_muestra', establecimiento_origen = 'HPL' , areas_id_area = '$unidad_origen', num_frasco = '$num_frasco' WHERE id_muestra = '$id'";*/

    /*$query = "UPDATE antibioticos SET tipo_muestra = '$tipo_muestra' WHERE id_antibiotico = '$id'";*/

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
    echo "Antibiotico actualizado correctamente.";

}