
<?php

include ("../config.php");
 
// check request
if(isset($_POST))
{
    //tomamos los datos que vienen de los script y se asignan a una nueva variable
    $id = mysqli_real_escape_string($link, $_POST["id"]); 


    $nombre = mysqli_real_escape_string($link, $_POST["nombres"]);  
    $apellido = mysqli_real_escape_string($link, $_POST["apellidos"]); 
    $rut = mysqli_real_escape_string($link, $_POST["rut"]);  
    $email = mysqli_real_escape_string($link, $_POST["email"]); 
    $dosis = mysqli_real_escape_string($link, $_POST["dosis"]);  
    $antibiotico = mysqli_real_escape_string($link, $_POST["nombre"]); 
 
    /*comprobado que se puede agregar trazabilidad y cambiar el estado*/
    
    $query = "UPDATE usuarios
            SET nombres = '$nombres', apellidos = '$apellidos', rut = '$rut', sala_cama = '$sala_cama', dosis = '$dosis', nombre = '$antibiotico' 
            WHERE id_paciente = '$id' 
            ";

    /*$query = "UPDATE pacientes, muestras SET tipo_muestra = '$tipo_muestra', establecimiento_origen = 'HPL' , areas_id_area = '$unidad_origen', num_frasco = '$num_frasco' WHERE id_muestra = '$id'";*/

    /*$query = "UPDATE antibioticos SET tipo_muestra = '$tipo_muestra' WHERE id_antibiotico = '$id'";*/

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
    echo "Antibiotico actualizado correctamente.";

}