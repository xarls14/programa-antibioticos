<?php
    session_start();
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['rut']) && isset($_POST['sala_cama']) && isset($_POST['medico_tratante']) && isset($_POST['antibiotico']) && isset($_POST['dosis']))
    {
        include ("../config.php");

        
        $nombre = mysqli_real_escape_string($link, $_POST["nombre"]);  
        $nombreUpperCase = strtoupper($nombre);
        $apellido = mysqli_real_escape_string($link, $_POST["apellido"]); 
        $apellidoUpperCase = strtoupper($apellido);
        $rut = mysqli_real_escape_string($link, $_POST["rut"]);  
        $sala_cama = mysqli_real_escape_string($link, $_POST["sala_cama"]); 
        $medico_tratante = mysqli_real_escape_string($link, $_POST["medico_tratante"]); 
        //$tipo_muestra = mysqli_real_escape_string($link, $_POST["tipo_muestra"]); 
        //$num_frasco = mysqli_real_escape_string($link, $_POST["num_frasco"]); 

        //array combine para obtener tipo de muestra y num frasco
        foreach (array_combine($_POST["antibiotico"], $_POST["dosis"]) as $f =>$n) {
            echo "antibiotico: ".$f."<br>"."dosis :".$n;
            echo "<br>";
        }


        //cuando el usuario es admin, ingresamos la unidad del paciente con el select si es otro tipo de usuario la unidad de setea de manera automatica dependiendo del usuario y area del usuario
            
            if($_SESSION['tipo_usuario'] != "Administrador" && $_SESSION['tipo_usuario'] != "basico"){

                switch ($_SESSION['areas_id_area']){
            
                    case '1':// Farmacia
        
                    mysqli_autocommit($link, false);
                    $flag = true;

                    $query1 = "INSERT INTO pacientes(nombres, apellidos, rut, fecha_ingreso, sala_cama, areas_id_area) VALUES('$nombreUpperCase','$apellidoUpperCase','$rut', now(), '$sala_cama', '1')";

                    $result = mysqli_query($link, $query1);

                    $idPaciente = mysqli_insert_id($link);
                    
                    
                    if(!$result){
                        $flag = false;
                        echo "Detalles de error: ".mysqli_error($link).".";
                    }



                    //ingresamos datos de la tabla correspondiente a tratamientos, por cada paciente se le asocia un

                    $query2 = "INSERT INTO tratamientos(diagnostico, fecha_ingreso, observacion, pacientes_id_paciente, medico_tratante)  
                    VALUES('Sin diagnóstico', now(), 'Sin observaciones.', '$idPaciente', '$medico_tratante')";

                    $result = mysqli_query($link, $query2);
                    $idTratamiento = mysqli_insert_id($link);
                    

                    if(!$result){
                        $flag = false;
                        echo "Detalles de error: ".mysqli_error($link).".";
                    }

                    /*si llegara a realizar el insert del pdf tendria que ingresarlo primero aca antes de los antibioticos*/
                    
                    foreach (array_combine($_POST["antibiotico"], $_POST["dosis"]) as $antibiotico =>$dosis){    

                        

                        //ingresamos datos de la tabla antibioticos
                        $query3 = "INSERT INTO antibioticos(dias_tratamiento, nombre, dosis, tratamientos_id_tratamiento, estado_antibiotico, num_frasco)
                        VALUES('0', '$antibiotico', '$dosis', '$idTratamiento', 'CONTINUAR TERAPIA', '0')"; 

                        $result = mysqli_query($link, $query3);
                        $idAntibiotico = mysqli_insert_id($link);
                        echo ($idAntibiotico);
                        echo "<br>";
                        
                        if(!$result){
                            $flag = false;
                            echo "Detalles de error: ".mysqli_error($link).".";
                        }

                        if($flag){
                            mysqli_commit($link);
                            echo "Paciente ingresado correctamente";
                        }else{
                            mysqli_rollback($link);
                            echo "All queries were rolled back";
                        }
                    }
                break;

                case '2'://Medicina
                    mysqli_autocommit($link, false);
                    $flag = true;

                    $query1 = "INSERT INTO pacientes(nombres, apellidos, rut, fecha_ingreso, establecimiento_origen, areas_id_area) VALUES('$nombreUpperCase','$apellidoUpperCase','$rut', now(), 'HPL', '2')";

                    $result = mysqli_query($link, $query1);

                    $idPaciente = mysqli_insert_id($link);
                    echo $idPaciente;
                    echo "<br>";
                    
                    if(!$result){
                        $flag = false;
                        echo "Detalles de error: ".mysqli_error($link).".";
                    }
                    
                    foreach (array_combine($_POST["tipo_muestra"], $_POST["num_frasco"]) as $tipo_muestra =>$num_frasco){    

                        echo "tipo_muestra: ".$tipo_muestra."<br>"."num_frasco :".$num_frasco;
                        echo "<br>";

                        $query2 = "INSERT INTO muestras(tipo_muestra, num_frasco, pacientes_id_paciente, cirujano) 
                        VALUES('$tipo_muestra', '$num_frasco', '$idPaciente', '$cirujano')";

                        $result = mysqli_query($link, $query2);
                        $idMuestra = mysqli_insert_id($link);
                        echo ($idMuestra);
                        echo "<br>";

                        if(!$result){
                            $flag = false;
                            echo "Detalles de error: ".mysqli_error($link).".";
                        }

                        $query3 = "INSERT INTO trazabilidad(estado_trazabilidad, fecha_estado, muestras_id_muestra)
                        VALUES('SIN ESTADO', now(), '$idMuestra')"; 

                        $result = mysqli_query($link, $query3);
                        $idTrazabilidad = mysqli_insert_id($link);
                        echo ($idTrazabilidad);
                        echo "<br>";
                        
                        if(!$result){
                            $flag = false;
                            echo "Detalles de error: ".mysqli_error($link).".";
                        }

                        if($flag){
                            mysqli_commit($link);
                            echo "Paciente ingresado correctamente";
                        }else{
                            mysqli_rollback($link);
                            echo "All queries were rolled back";
                        }
                    } 
                break;

                case "3"://Laboratorio
                    mysqli_autocommit($link, false);
                    $flag = true;

                    $query1 = "INSERT INTO pacientes(nombres, apellidos, rut, fecha_ingreso, establecimiento_origen, areas_id_area) VALUES('$nombreUpperCase','$apellidoUpperCase','$rut', now(), 'HPL', '3')";

                    $result = mysqli_query($link, $query1);

                    $idPaciente = mysqli_insert_id($link);
                    echo $idPaciente;
                    echo "<br>";
                    
                    if(!$result){
                        $flag = false;
                        echo "Detalles de error: ".mysqli_error($link).".";
                    }
                    
                    foreach (array_combine($_POST["tipo_muestra"], $_POST["num_frasco"]) as $tipo_muestra =>$num_frasco){    

                        echo "tipo_muestra: ".$tipo_muestra."<br>"."num_frasco :".$num_frasco;
                        echo "<br>";

                        $query2 = "INSERT INTO muestras(tipo_muestra, num_frasco, pacientes_id_paciente, cirujano) 
                        VALUES('$tipo_muestra', '$num_frasco', '$idPaciente', '$cirujano')";

                        $result = mysqli_query($link, $query2);
                        $idMuestra = mysqli_insert_id($link);
                        echo ($idMuestra);
                        echo "<br>";

                        if(!$result){
                            $flag = false;
                            echo "Detalles de error: ".mysqli_error($link).".";
                        }

                        $query3 = "INSERT INTO trazabilidad(estado_trazabilidad, fecha_estado, muestras_id_muestra)
                        VALUES('SIN ESTADO', now(), '$idMuestra')"; 

                        $result = mysqli_query($link, $query3);
                        $idTrazabilidad = mysqli_insert_id($link);
                        echo ($idTrazabilidad);
                        echo "<br>";
                        
                        if(!$result){
                            $flag = false;
                            echo "Detalles de error: ".mysqli_error($link).".";
                        }

                        if($flag){
                            mysqli_commit($link);
                            echo "Paciente ingresado correctamente";
                        }else{
                            mysqli_rollback($link);
                            echo "All queries were rolled back";
                        }
                    }  
                break;

            
            }
               

        }
        /*if (!$result = mysqli_query($link, $query)) {
            exit(mysqli_error($link));
        }*/        
    }
?>