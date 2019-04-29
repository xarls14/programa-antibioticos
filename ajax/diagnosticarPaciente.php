
<?php

include ("../config.php");
 
// check request
if(isset($_POST))
{
    //tomamos los datos que vienen de los script y se asignan a una nueva variable
    $id = mysqli_real_escape_string($link, $_POST["id"]); 
    $tratamiento_id = mysqli_real_escape_string($link, $_POST["id_tratamiento"]); 

    $diagnostico_paciente = mysqli_real_escape_string($link, $_POST["diagnostico"]);  
 
    /*comprobado que se puede agregar trazabilidad y cambiar el estado*/
    
    $query = "UPDATE tratamientos  
            SET diagnostico = '$diagnostico_paciente'
            WHERE id_tratamiento = '$tratamiento_id'
            ";


    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
    echo "Antibiotico actualizado correctamente.";

}