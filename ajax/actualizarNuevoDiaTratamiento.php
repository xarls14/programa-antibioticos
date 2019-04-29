
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

    $query2 = "INSERT INTO fecha_tratamiento(fecha, antibioticos_id_antibiotico, antibioticos_tratamientos_id_tratamiento)
                        VALUES('$fecha', '$antibiotico_id', '$tratamiento_id')";


    $result = mysqli_query($link, $query2);    
    if(!$result){
        $flag = false;
        echo "Detalles de error: ".mysqli_error($link).".";
    } 

    /*$query = "UPDATE pacientes, muestras SET tipo_muestra = '$tipo_muestra', establecimiento_origen = 'HPL' , areas_id_area = '$unidad_origen', num_frasco = '$num_frasco' WHERE id_muestra = '$id'";*/

    /*$query = "UPDATE antibioticos SET tipo_muestra = '$tipo_muestra' WHERE id_antibiotico = '$id'";*/

    /*if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }*/
    echo "Antibiotico actualizado correctamente.";

}