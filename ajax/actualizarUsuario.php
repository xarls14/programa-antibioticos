
<?php

include ("../config.php");
 
// check request
if(isset($_POST))
{
    //tomamos los datos que vienen de los script y se asignan a una nueva variable
    $id = mysqli_real_escape_string($link, $_POST["id"]); 


    $nombre = mysqli_real_escape_string($link, $_POST["nombre"]);  
    $apellido = mysqli_real_escape_string($link, $_POST["apellido"]); 
    $rut = mysqli_real_escape_string($link, $_POST["rut"]);  
    $email = mysqli_real_escape_string($link, $_POST["email"]); 
    $areas_id_area = mysqli_real_escape_string($link, $_POST["areas_id_area"]);  
    $tipo_usuario = mysqli_real_escape_string($link, $_POST["tipo_usuario"]); 
 
    /*comprobado que se puede agregar trazabilidad y cambiar el estado*/
    
    $query = "UPDATE usuarios
            SET nombre = '$nombre', apellido = '$apellido', rut = '$rut', email = '$email', areas_id_area = '$areas_id_area', tipo_usuario = '$tipo_usuario' 
            WHERE id_usuario = '$id'
            ";

    /*$query = "UPDATE pacientes, muestras SET tipo_muestra = '$tipo_muestra', establecimiento_origen = 'HPL' , areas_id_area = '$unidad_origen', num_frasco = '$num_frasco' WHERE id_muestra = '$id'";*/

    /*$query = "UPDATE antibioticos SET tipo_muestra = '$tipo_muestra' WHERE id_antibiotico = '$id'";*/

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
    echo "Usuario actualizado correctamente.";

}