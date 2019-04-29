
<?php

include ("../config.php");
 
// check request
if(isset($_POST))
{
    //tomamos los datos que vienen de los script y se asignan a una nueva variable
    $antibiotico_id = mysqli_real_escape_string($link, $_POST["id_antibiotico"]); 

    $estado_antibiotico = mysqli_real_escape_string($link, $_POST["estado_antibiotico"]); 
 
    /*comprobado que se puede agregar trazabilidad y cambiar el estado*/
    
    $query = "UPDATE antibioticos 
            SET estado_antibiotico = '$estado_antibiotico'
            WHERE id_antibiotico = '$antibiotico_id'
            ";

    /*$query = "UPDATE pacientes, muestras SET tipo_muestra = '$tipo_muestra', establecimiento_origen = 'HPL' , areas_id_area = '$unidad_origen', num_frasco = '$num_frasco' WHERE id_muestra = '$id'";*/

    /*$query = "UPDATE antibioticos SET tipo_muestra = '$tipo_muestra' WHERE id_antibiotico = '$id'";*/

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
    echo "Estado ATB actualizado correctamente.";

}