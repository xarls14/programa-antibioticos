
<?php

include ("../config.php");
 
// check request
if((isset($_POST['id']) && isset($_POST['id']) != "") && (isset($_POST['id_tratamiento']) && isset($_POST['id_tratamiento']) != "")){

    $id = mysqli_real_escape_string($link, $_POST["id"]); 
    $tratamiento_id = mysqli_real_escape_string($link, $_POST["id_tratamiento"]);
    $descripcion = mysqli_real_escape_string($link, $_POST["descripcion_pdf"]);

    if (is_uploaded_file($_FILES['fichero']['tmp_name'])) {
        
        //nombre usamos funcion de files 
        $ruta = "../pdf/";
        $nombreFinal = trim($_FILES['fichero']['name']);
        $nombreFinal = preg_replace("'/\s/'", "", $nombreFinal);
        $upload = $ruta.$nombreFinal;

        if(move_uploaded_file(($_FILES['fichero']['tmp_name']), $upload)){//movemos archivo a su ubicacion  
            echo "<b>Upload exitoso!. Datos:</b><br>";
            echo "Nombre: <i><a href=\"".$ruta.$nombreFinal."\">".$_FILES['fichero']['name']."</a></i><br>"; 
            echo "Tipo MIME: <i>".$_FILES['fichero']['type']."</i><br>";
            echo "Peso: <i>".$_FILES['fichero']['size']." bytes</i><br>";  
                        echo "<br><hr><br>";

            $query = "INSERT INTO cultivos(descripcion, nombre_archivo, tratamientos_id_tratamiento, tratamientos_pacientes_id_paciente, fecha_pdf) VALUES('$descripcion', '$nombreFinal', '$tratamiento_id', '$id', DATE_ADD(NOW(), INTERVAL -1 HOUR))";

            if (!$result = mysqli_query($link, $query)) {
                exit(mysqli_error($link));
            }
            echo "PDF subido correctamente.";
        }else{
            echo 'no se subio el archivo a su ubicacion';
        }
    }else{
        echo 'no se subio archivo';
    }

    /*$archivo = $_FILES['fichero'];

    $nombre_archivo = $archivo['tmp_name'];
    $ruta="../pdf/".$nombre_archivo;
    echo $nombre_archivo.'<br>';
    echo $ruta.'<br>';
    move_uploaded_file($archivo['tmp_name'], $ruta);

    $query = "INSERT INTO cultivos(descripcion, nombre_archivo, tratamientos_id_tratamiento) VALUES('$descripcion', '$nombre_archivo', $tratamiento_id)";

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }*/

}else{
    echo 'algo ocurrio';
}