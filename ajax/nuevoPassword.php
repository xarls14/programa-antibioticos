<?php
    if(isset($_POST['id_usuario']) && isset($_POST['nuevo_password']))
    {
        include ("../config.php");

        //asignamos variables enviadas por la data de script.js

        $id_usuario = mysqli_real_escape_string($link, $_POST["id_usuario"]);  
        $password = mysqli_real_escape_string($link, $_POST["nuevo_password"]); 

        //enscriptamos la password con funcion password_hash
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE usuarios
        SET password = '$password_hash'
        WHERE id_usuario = '$id_usuario'
        ";

        if (!$result = mysqli_query($link, $query)){
            exit(mysqli_error($link));
        }
        echo "Contraseña modificada correctamente.";
    }
?>