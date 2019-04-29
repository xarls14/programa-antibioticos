
<?php

include ("../config.php");
 
// check request
if(isset($_POST))
{
    //tomamos los datos que vienen de los script y se asignan a una nueva variable
    $id = mysqli_real_escape_string($link, $_POST["id"]); 
    $tratamiento_id = mysqli_real_escape_string($link, $_POST["id_tratamiento"]); 
 
    $dosis = mysqli_real_escape_string($link, $_POST["dosis"]);  
    $antibiotico = mysqli_real_escape_string($link, $_POST["nombre"]); 
 
    /*comprobado que se puede agregar trazabilidad y cambiar el estado*/
    
    $query = "INSERT INTO antibioticos(dias_tratamiento, nombre, dosis, tratamientos_id_tratamiento, estado_antibiotico, num_frasco)
                        VALUES('0', '$antibiotico', '$dosis', '$tratamiento_id', 'CONTINUAR TERAPIA', '0')"; 

    /*$query = "UPDATE pacientes, muestras SET tipo_muestra = '$tipo_muestra', establecimiento_origen = 'HPL' , areas_id_area = '$unidad_origen', num_frasco = '$num_frasco' WHERE id_muestra = '$id'";*/

    /*$query = "UPDATE antibioticos SET tipo_muestra = '$tipo_muestra' WHERE id_antibiotico = '$id'";*/

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
    echo "Antibiotico creado correctamente.";

}