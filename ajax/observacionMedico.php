<?php
session_start();

include ("../config.php");


 
// check request
if(isset($_POST))
{   
    //en observacion medico debemos ingresar la observacion que se ingresa a traves del formulario el medico que la ingresa (session) y la fecha actual de cuando se crea el registro
    //tomamos los datos que vienen de los script y se asignan a una nueva variable
    $id = mysqli_real_escape_string($link, $_POST["id"]); 
    $tratamiento_id = mysqli_real_escape_string($link, $_POST["id_tratamiento"]); 
    $antibiotico_id = mysqli_real_escape_string($link, $_POST["id_antibiotico"]);  

    $observacion_medico = mysqli_real_escape_string($link, $_POST["observacion_medico"]);  

    //variables donde guardaremos el nombre y apellido del usuario (medico en este caso)
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $espacio = ' ';

    $medico_observacion = $nombre.$espacio.$apellido;
    /*comprobado que se puede agregar trazabilidad y cambiar el estado*/
    
    $query = "INSERT INTO observaciones(observacion, fecha_observacion, medico_observacion, antibioticos_id_antibiotico, antibioticos_tratamientos_id_tratamiento)
            VALUES('$observacion_medico', NOW(), '$medico_observacion' , '$antibiotico_id', '$tratamiento_id')
            ";


    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
    echo "observación ingresada correctamente.";

}