<?php
   session_start(); 
   
   include ("../config.php");
   
   //cuando entramos a las vistas donde necesitamos realizar check (laboratorio y en especialidades adminisrativas) debemos agregar al thead las opciones de laboratorio para validar recepcion de las muestras desde las distintas unidades clinicas y tambien cuando estas llegan desde el hospital higueras
   

   if($_SESSION['tipo_usuario'] == "Administrador"){
      $data = '<table id="tablaUsuarios" class="display table-hover"  style="width:100%; margin: 0 auto;">
        <thead>
            <tr>
                <!--<th style="height: 40px; width: 40px;"></th>-->
                <th>Usuario</th>
                <th>Rut</th>
                <th>Email</th>
                <th>Tipo usuario</th>
                <th>Unidad</th>
                <th>Opciones</th>
            </tr>
        </thead>';          
   }
   
   
   
   
   
   
   /*id_area_usuarios
   USUARIOS
   1- FARMACIA
   2- MEDICINA
   3- LABORATORIO
   */
   
   //dependiendo del usuario que loguea se muestran los pacientes que le corresponde a cada tipo de usuario
   //Administrador no listara pacientes, solo se encargara de generar listas de usuarios y hacer gestion de ellos
   if($_SESSION['tipo_usuario'] == "Administrador"){
   
       //como es vista administrador deberia poder ver trazabilidad de una muestra al igual que lab 
       $query = 
               "SELECT * FROM usuarios 
                ORDER BY id_usuario DESC";
   
   
   }
   
   
   if (!$result = mysqli_query($link, $query)) {
    exit(mysqli_error($link));
   }  
   
   if(mysqli_num_rows($result) > 0)
       {
           $number = 1;
           
            //formateamos la unidad para mostrarla en pantalla como unidad y no como numero
           while($row = mysqli_fetch_assoc($result))
           {
            switch ($row['areas_id_area']){
                case '1':
                $row['areas_id_area'] = 'Farmacia';
                break;
                
                case '2':
                $row['areas_id_area'] = 'Medicina';
                break;

                case '3':
                $row['areas_id_area'] = 'Laboratorio';
                break;
              }    

              //convertir nombres porque uno es de usuarios y el otro es de antibioticos

              //fecha 
               /*$fecha = $row['fecha_ingreso'];
               $fecha_parseada = explode(" ", $fecha);
               $fecha_chilena = date("d-m-y", strtotime($fecha_parseada[0]));*/

               /**/

               //preguntamos por el tipo de sesion que trae session y escribimos codigo html/php para cada tipo de usuario logueado (concatenado) 
               switch ($_SESSION['tipo_usuario']) {//tipo de usuario
   
                    case 'Administrador'://solo debe mostrar informacion de los usuarios una especia de lista que muestre 
                     
                       $data .= '
                        <tr>
                            <td>'.$row['nombre'].' '.$row['apellido'].'</td>
                            <td>'.$row['rut'].'</td>                            
                            <td>'.$row['email'].'</td>
                            <td>'.$row['tipo_usuario'].'</td>
                            <td>'.$row['areas_id_area'].'</td>

                            <td id="botonesTabla">
                                <span data-toggle="tooltip" data-placement="top"
                                    title="Editar datos usuario">
                                    <button data-backdrop="static" data-keyboard="false" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarUsuario" onclick="obtenerDatosUsuario('.$row['id_usuario'].')">
                                    <i class="fas fa-pen-square"></i>
                                    </button>
                                </span>

                                <span data-toggle="tooltip" data-placement="top" title="Eliminar usuario">
                                    <button type="button" class="btn btn-danger" onclick="eliminarUsuario('.$row['id_usuario'].')">
                                    <i class="fas fa-trash-alt"></i></button>   
                                </span>

                                <span data-toggle="tooltip" data-placement="top" title="Reestablecer contraseña">
                                    <button type="button" class="btn btn-success" onclick="reestablecerPassword('.$row['id_usuario'].')">
                                    <i class="fas fa-key"></i></button>   
                                </span>
                            </td>
                        </tr>';
                    break;
               }    
           }
       }else{

           // Sí no se muestran los datos debemos colocar esto dependiendo del numero de columnas por lo que deberia ir un switchpreguntando si es admin o basico (farmacia, medicina y laboratorio)
          if($_SESSION['tipo_usuario'] == "Administrador"){
            $data .= '<tr><td colspan="6">¡No se encontraron datos!</td></tr>';
             
          }
       }
       //concatenamos donde termina la etiqueta table
       $data .= '</table>';
       
       //imprimimos tabla completa
       echo $data;
   ?>




