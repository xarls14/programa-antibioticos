<?php
   session_start(); 
   
   include ("../config.php");
   
   //cuando entramos a las vistas donde necesitamos realizar check (laboratorio y en especialidades adminisrativas) debemos agregar al thead las opciones de laboratorio para validar recepcion de las muestras desde las distintas unidades clinicas y tambien cuando estas llegan desde el hospital higueras
   

   if($_SESSION['tipo_usuario'] == "Administrador"){
      $data = '<table id="tablaPacientes" class="display table-hover"  style="width:100%; margin: 0 auto;">
          <thead>
              <tr>
                  <!--<th style="height: 40px; width: 40px;"></th>-->
                  <th>Usuario</th>
                  <th>Rut</th>
                  <th>Email</th>
                  <th>Tipo usuario</th>
                  <th>Opciones</th>
              </tr>
          </thead>';
          
             
   }elseif($_SESSION['tipo_usuario'] == "Medico Basico"){
          $data = '<table class="display table-hover" id="tablaPacientes" style="width:100%; margin: 0 auto;">
          <thead>
              <tr>
                  <!--<th style="height: 40px; width: 40px;"></th>-->
                  <th>Rut</th>
                  <th>Paciente</th>
                  <th>Sala - Cama</th>
                  <th>Diagnóstico</th>
                  <th>Antibiótico</th>
                  <!--<th>Médico tratante</th>-->
                  <th>Dosis</th>
                  <th>Días ATB</th>
                  <th>N° Frascos</th>
                  <th>Estado</th>
                  <!--<th>Cultivo</th>-->
                  <th>Opciones</th>
              </tr>
          </thead>';
   }else{//entonces es basico

     //esta variable contendra codigo html y php de la tabla que se muestra en actualizarTabla()
     switch ($_SESSION['areas_id_area']) { //preguntamos por el area
        case '1'://Farmacia sin funciones de PDF y mostrar todos los datos de pacientes
                 $data = '<table class="display table-hover" id="tablaPacientes" style="width:100%; margin: 0 auto;">
          <thead>
              <tr>
                  <!--<th style="height: 40px; width: 40px;"></th>-->
                  <th>Rut</th>
                  <th>Paciente</th>
                  <th>Sala - Cama</th>
                  <th>Diagnóstico</th>
                  <th>Antibiótico</th>
                  <!--<th>Médico tratante</th>-->
                  <th>Dosis</th>
                  <th>Días ATB</th>
                  <th>N° Frascos</th>
                  <th>Estado</th>
                  <!--<th>Cultivo</th>-->
                  <!--<th>Observaciones</th>-->
                  <th>Opciones</th>
              </tr>
          </thead>';
             
        break;
         
        case '2'://Medicina sin funciones de PDF, con funciones de cambiar estados y mostrar todos los datos de pacientes (funciones de medicina aun no determinadas en la tabla)
                 $data = '<table class="display table-hover" id="tablaPacientes" style="width:100%; margin: 0 auto;">
          <thead>
              <tr>
                  <!--<th style="height: 40px; width: 40px;"></th>-->
                  <th>Rut</th>
                  <th>Paciente</th>
                  <th>Sala - Cama</th>
                  <th>Diagnóstico</th>
                  <th>Antibiótico</th>
                  <!--<th>Médico tratante</th>-->
                  <th>Dosis</th>
                  <th>Días ATB</th>
                  <th>N° Frascos</th>
                  <th>Estado</th>
                  <!--<th>Cultivo</th>-->
                  <th>Opciones</th>
              </tr>
          </thead>';
          
             
        break;

        case '3'://Laboratorio funciones de PDF y mostrar todos los datos de pacientes
                 $data = '<table class="display table-hover" id="tablaPacientes" style="width:100%; margin: 0 auto;">
          <thead>
              <tr>
                  <!--<th style="height: 40px; width: 40px;"></th>-->
                  <th>Rut</th>
                  <th>Paciente</th>
                  <th>Sala - Cama</th>
                  <th>Diagnóstico</th>
                  <th>Antibiótico</th>
                  <!--<th>Médico tratante</th>-->
                  <th>Dosis</th>
                  <th>Días ATB</th>
                  <th>N° Frascos</th>
                  <th>Estado</th>
                  <!--<th>Cultivo</th>-->
                  <th>Opciones</th>
              </tr>
          </thead>';
          
             
        break;
     } 
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
               "SELECT rut, nombre, apellido, email, tipo_usuario, areas_id_area FROM usuarios 
                ORDER BY id_usuario";
   
   
   }elseif($_SESSION['tipo_usuario'] == "Medico Basico"){
        $query = "SELECT *
            FROM pacientes p
            INNER JOIN tratamientos t ON p.id_paciente = t.pacientes_id_paciente
            INNER JOIN antibioticos a ON t.id_tratamiento = a.tratamientos_id_tratamiento
            
            WHERE p.areas_id_area = 1 AND (a.estado_antibiotico = 'ALTA')
            ORDER BY p.fecha_ingreso DESC;";
   }else{//si el usuario es basico

       //luego de saber si es administrador filtramos la consulta dependiendo del area a la que pertenece
       switch ($_SESSION['areas_id_area']) {//preguntamos por el area 
       case '1'://FARMACIA -> mostramos solo pacientes de farmacia pero se debe definir en que estado

               $query = "SELECT *
                     FROM pacientes p
                     INNER JOIN tratamientos t ON p.id_paciente = t.pacientes_id_paciente
                     INNER JOIN antibioticos a ON t.id_tratamiento = a.tratamientos_id_tratamiento
                     
                     WHERE p.areas_id_area = 1 AND (a.estado_antibiotico = 'ALTA')
                ORDER BY p.fecha_ingreso DESC;";
        break;
       
        case '2'://MEDICINA -> mostramos pacientes en medicina a 
           $query = "SELECT *
                     FROM pacientes p
                     INNER JOIN tratamientos t ON p.id_paciente = t.pacientes_id_paciente
                     INNER JOIN antibioticos a ON t.id_tratamiento = a.tratamientos_id_tratamiento
                     
                     WHERE p.areas_id_area = 1 AND (a.estado_antibiotico = 'ALTA')
                ORDER BY p.fecha_ingreso DESC;";
        break;
       
        case '3'://LABORATORIO -> mostramos solo pacientes de hospitalizados
           $query = "SELECT *
                     FROM pacientes p
                     INNER JOIN tratamientos t ON p.id_paciente = t.pacientes_id_paciente
                     INNER JOIN antibioticos a ON t.id_tratamiento = a.tratamientos_id_tratamiento
                     
                     WHERE p.areas_id_area = 1 AND (a.estado_antibiotico = 'ALTA')
                ORDER BY p.fecha_ingreso DESC;";
        break;
       }
   }
   
   
   if (!$result = mysqli_query($link, $query)) {
    exit(mysqli_error($link));
   }  
   
   if(mysqli_num_rows($result) > 0)
       {
           $number = 1;
           

           while($row = mysqli_fetch_assoc($result))
           {
              //convertir nombres porque uno es de usuarios y el otro es de antibioticos

              //fecha 
               $fecha = $row['fecha_ingreso'];
               $fecha_parseada = explode(" ", $fecha);
               $fecha_chilena = date("d-m-y", strtotime($fecha_parseada[0]));

               /**/
               switch ($row['estado_antibiotico']) {
                 case 'ALTA':
                   $estadoAntibioticoBadge = '<span class="badge badge-success">'.$row['estado_antibiotico'].'</span>';
                   break;

                 case 'SUSPENSION':
                   $estadoAntibioticoBadge = '<span class="badge badge-danger">'.$row['estado_antibiotico'].'</span>';
                   break;
                   
                 case 'CONTINUAR TERAPIA':
                   $estadoAntibioticoBadge = '<span class="badge badge-dark">'.$row['estado_antibiotico'].'</span>';
                   break;   
               }

               //preguntamos por el tipo de sesion que trae session y escribimos codigo html/php para cada tipo de usuario logueado (concatenado) 
               switch ($_SESSION['tipo_usuario']) {//tipo de usuario
   
                    case 'Administrador'://solo debe mostrar informacion de los usuarios una especia de lista que muestre 
                     
                       $data .= 
                       '<tr>
                           <td>'.$row['rut'].'</td>
                           <td>'.$row['nombre'].' '.$row['apellido'].'</td> 
                           <td>'.$row['email'].'</td>
                           <td>'.$row['tipo_usuario'].'</td>
                           
                           <td id="botonesTabla">
                               <div class="btn-group" role="group" aria-label="Basic example">
                                 <button onclick="obtenerDatosPacientes('.$row['id_usuario'].')" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalActualizarPacienteAdmin" data-backdrop="static" data-keyboard="false"><span><i class="fas fa-edit"></i></span></button>
                                 <button onclick="eliminarPaciente('.$row['id_usuario'].')" type="button" class="btn btn-danger"><span><i class="fas fa-trash-alt"></i></span></button>
                               </div>
                           </td>
                       </tr>';
                    break;

                    case 'Medico Basico'://solo debe mostrar informacion de los usuarios una especia de lista que muestre 
                     
                    $data .= '
                       
                    <tr>
                        <td>'.$row['rut'].'</td>
                        <td>'.$row['nombres'].' '.$row['apellidos'].'</td> 
                        <td>'.$row['sala_cama'].'</td>  
                        <td>'.$row['diagnostico'].'</td>
                        <td>'.$row['nombre'].'</td> 
                        <!--<td>'.$row['medico_tratante'].'</td>--> 
                        <td>'.$row['dosis'].'</td>';

                        if ($row['dias_tratamiento'] == 0) {
                          $data .= '<td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="obtenerDatosRangoFechas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')" disabled>
                           dias <span class="badge badge-light">'.$row['dias_tratamiento'].'</span>
                         </button></td>';
                        }else{
                           $data .= '<td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="obtenerDatosRangoFechas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                           dias <span class="badge badge-light">'.$row['dias_tratamiento'].'</span>
                         </button></td>';
                        }
                        

                        $data.= 
                        '<td>'.$row['num_frasco'].'</td> 
                        <td>'.$estadoAntibioticoBadge.'</td> 
                        <!--<td></td>--> 

                        <!--<td>'.$row['observacion'].'</td>-->

                        <td>
                        <div>
                         <span data-toggle="tooltip" data-placement="top" title="Ver observaciones de antibióticos">
                             <button type="button" class="btn btn-primary" onclick="abrirModalVerObservaciones('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                             <i class="fas fa-comments"></i></button>   
                             </span>';
                                

                                
                             //habilitamos dosis segun existan días de tratamientos 
                              if ($row['dias_tratamiento'] == 0) {
                                $data .= '<span data-toggle="tooltip" data-placement="top" title="Ver recetas de antibióticos prescritos">
                                <button disabled  type="button" class="btn btn-dark" onclick="abrirModalVerRecetas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                <i class="fas fa-prescription-bottle"></i></button>   
                                </span>';
                              }else{
                                 $data .= '<span data-toggle="tooltip" data-placement="top" title="Ver recetas de antibióticos prescritos">
                                 <button  type="button" class="btn btn-dark" onclick="abrirModalVerRecetas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                 <i class="fas fa-prescription-bottle"></i></button>   
                                 </span>';
                              }
                              

                             $data .= '</td>
                        
                    </tr>';
                    break;
                
                    case 'Basico':
                       if($_SESSION['areas_id_area'] == "1"){//si el usuario es basico y del area de farmacia mostramos los pacientes de farmacia con un tratamiento activo
                           $data .= '
                       
                           <tr>
                               <td>'.$row['rut'].'</td>
                               <td>'.$row['nombres'].' '.$row['apellidos'].'</td> 
                               <td>'.$row['sala_cama'].'</td>  
                               <td>'.$row['diagnostico'].'</td>
                               <td>'.$row['nombre'].'</td> 
                               <!--<td>'.$row['medico_tratante'].'</td>--> 
                               <td>'.$row['dosis'].'</td>';

                               if ($row['dias_tratamiento'] == 0) {
                                 $data .= '<td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="obtenerDatosRangoFechas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')" disabled>
                                  días <span class="badge badge-light">'.$row['dias_tratamiento'].'</span>
                                </button></td>';
                               }else{
                                  $data .= '<td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="obtenerDatosRangoFechas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                  días <span class="badge badge-light">'.$row['dias_tratamiento'].'</span>
                                </button></td>';
                               }
                               

                               $data.= 
                               '<td>'.$row['num_frasco'].'</td> 
                               <td>'.$estadoAntibioticoBadge.'</td> 
                               <!--<td></td>--> 

                               <!--<td>'.$row['observacion'].'</td>-->

                               <td>
                               <div>
                                <span data-toggle="tooltip" data-placement="top" title="Agregar nueva día de tratamiento">
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNuevoDiaTratamiento" data-backdrop="static" data-keyboard="false">
                                  <i class="fas fa-pills"></i></button>   
                                </span> 

                                <span data-toggle="tooltip" data-placement="top"
                                  title="Editar datos paciente"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarPaciente" onclick="obtenerDatosPacientes('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')" data-backdrop="static" data-keyboard="false"><i class="fas fa-pen-square"></i></button>
                                </span>

                                <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                                    <button type="button" class="btn btn-danger" onclick="eliminarPaciente('.$row['id_antibiotico'].','.$row['id_tratamiento'].')">
                                    <i class="fas fa-trash-alt"></i></button>   
                                </span>

                                <span data-toggle="tooltip" data-placement="top" title="Ver observaciones de antibióticos">
                                    <button type="button" class="btn btn-primary" onclick="abrirModalVerObservaciones('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                    <i class="fas fa-comments"></i></button>   
                                    </span>
                                    
                                    <span data-toggle="tooltip" data-placement="top" title="Cambiar estado del antibiotico.">
                                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalCambioEstadoATB" data-backdrop="static" data-keyboard="false" onclick="obtenerDatosAntibioticos('.$row['id_antibiotico'].')">
                                  <i class="fas fa-exchange-alt"></i></button>   
                                </span>';
                                

                                
                                    //habilitamos dosis segun existan días de tratamientos 
                                     if ($row['dias_tratamiento'] == 0) {
                                       $data .= '<span data-toggle="tooltip" data-placement="top" title="Ver recetas de antibióticos prescritos">
                                       <button disabled  type="button" class="btn btn-dark" onclick="abrirModalVerRecetas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                       <i class="fas fa-prescription-bottle"></i></button>   
                                       </span>';
                                     }else{
                                        $data .= '<span data-toggle="tooltip" data-placement="top" title="Ver recetas de antibióticos prescritos">
                                        <button  type="button" class="btn btn-dark" onclick="abrirModalVerRecetas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                        <i class="fas fa-prescription-bottle"></i></button>   
                                        </span>';
                                     }
                                     
     
                                    $data .= '</td>
                               
                           </tr>';

                        
                    }elseif ($_SESSION['areas_id_area'] == "2") {//preguntamos si es de Medicina
                          $data .= '
                       
                           <tr>
                               <td>'.$row['rut'].'</td>
                               <td>'.$row['nombres'].' '.$row['apellidos'].'</td> 
                               <td>'.$row['sala_cama'].'</td>  
                               <td>'.$row['diagnostico'].'</td>
                               <td>'.$row['nombre'].'</td> 
                               <!--<td>'.$row['medico_tratante'].'</td>--> 
                               <td>'.$row['dosis'].'</td>';

                               if ($row['dias_tratamiento'] == 0) {
                                 $data .= '<td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="obtenerDatosRangoFechas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')" disabled>
                                  dias <span class="badge badge-light">'.$row['dias_tratamiento'].'</span>
                                </button></td>';
                               }else{
                                  $data .= '<td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="obtenerDatosRangoFechas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                  dias <span class="badge badge-light">'.$row['dias_tratamiento'].'</span>
                                </button></td>';
                               }
                               

                               $data.= 
                               '<td>'.$row['num_frasco'].'</td> 
                               <td>'.$estadoAntibioticoBadge.'</td> 
                               <!--<td></td>--> 

                               <!--<td>'.$row['observacion'].'</td>-->

                               <td>
                               <div>
                                <span data-toggle="tooltip" data-placement="top" title="Cambiar estado del antibiótico.">
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalCambioEstadoATB" data-backdrop="static" data-keyboard="false" onclick="obtenerDatosAntibioticos('.$row['id_antibiotico'].')">
                                  <i class="fas fa-exchange-alt"></i></button>   
                                </span> 

                                <span data-toggle="tooltip" data-placement="top" title="Ver observaciones de antibióticos">
                                    <button type="button" class="btn btn-primary" onclick="abrirModalVerObservaciones('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                    <i class="fas fa-comments"></i></button>   
                                    </span>';
                                

                                
                                    //habilitamos dosis segun existan días de tratamientos 
                                     if ($row['dias_tratamiento'] == 0) {
                                       $data .= '<span data-toggle="tooltip" data-placement="top" title="Ver recetas de antibióticos prescritos">
                                       <button disabled  type="button" class="btn btn-dark" onclick="abrirModalVerRecetas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                       <i class="fas fa-prescription-bottle"></i></button>   
                                       </span>';
                                     }else{
                                        $data .= '<span data-toggle="tooltip" data-placement="top" title="Ver recetas de antibióticos prescritos">
                                        <button  type="button" class="btn btn-dark" onclick="abrirModalVerRecetas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                        <i class="fas fa-prescription-bottle"></i></button>   
                                        </span>';
                                     }
                                     
     
                                    $data .= '</td>
                               
                           </tr>';  
                           
                           
                       }elseif ($_SESSION['areas_id_area'] == "3") {//preguntamos si es de laboratorio
                          $data .= '
                       
                           <tr>
                               <td>'.$row['rut'].'</td>
                               <td>'.$row['nombres'].' '.$row['apellidos'].'</td> 
                               <td>'.$row['sala_cama'].'</td>  
                               <td>'.$row['diagnostico'].'</td>
                               <td>'.$row['nombre'].'</td> 
                               <!--<td>'.$row['medico_tratante'].'</td>--> 
                               <td>'.$row['dosis'].'</td>';

                               if ($row['dias_tratamiento'] == 0) {
                                 $data .= '<td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="obtenerDatosRangoFechas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')" disabled>
                                  dias <span class="badge badge-light">'.$row['dias_tratamiento'].'</span>
                                </button></td>';
                               }else{
                                  $data .= '<td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="obtenerDatosRangoFechas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                  dias <span class="badge badge-light">'.$row['dias_tratamiento'].'</span>
                                </button></td>';
                               }
                               

                               $data.= 
                               '<td>'.$row['num_frasco'].'</td> 
                               <td>'.$estadoAntibioticoBadge.'</td> 
                               <!--<td></td>--> 

                               <!--<td>'.$row['observacion'].'</td>-->

                               <td>
                               <div>

                               <span data-toggle="tooltip" data-placement="top" title="Ver observaciones de antibióticos">
                                    <button type="button" class="btn btn-primary" onclick="abrirModalVerObservaciones('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                    <i class="fas fa-comments"></i></button>   
                                    </span>';
                                

                                
                                    //habilitamos dosis segun existan días de tratamientos 
                                     if ($row['dias_tratamiento'] == 0) {
                                       $data .= '<span data-toggle="tooltip" data-placement="top" title="Ver recetas de antibióticos prescritos">
                                       <button disabled  type="button" class="btn btn-dark" onclick="abrirModalVerRecetas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                       <i class="fas fa-prescription-bottle"></i></button>   
                                       </span>';
                                     }else{
                                        $data .= '<span data-toggle="tooltip" data-placement="top" title="Ver recetas de antibióticos prescritos">
                                        <button  type="button" class="btn btn-dark" onclick="abrirModalVerRecetas('.$row['id_paciente'].','.$row['id_tratamiento'].','.$row['id_antibiotico'].')">
                                        <i class="fas fa-prescription-bottle"></i></button>   
                                        </span>';
                                     }
                                     
     
                                    $data .= '</td>
                               
                           </tr>';  
                           
                           
                       }  
                       break;
               }    
           }
       }else{

           // Sí no se muestran los datos debemos colocar esto dependiendo del numero de columnas por lo que deberia ir un switchpreguntando si es admin o basico (farmacia, medicina y laboratorio)
          if($_SESSION['tipo_usuario'] == "Administrador"){
            $data .= '<tr><td colspan="5">¡No se encontraron datos!</td></tr>';
             
          }elseif($_SESSION['tipo_usuario'] == "Medico Basico"){
            $data .= '<tr><td colspan="10">¡No se encontraron datos!</td></tr>';
          }else{
            switch ($_SESSION['areas_id_area'] == "1") {//si es de farmacia
              case '1':
                $data .= '<tr><td colspan="11">¡No se encontraron datos!</td></tr>';
                break;
              
              case '2'://en caso de que sea medicina colocar en colspan el numero de columnas de medicina
                $data .= '<tr><td colspan="10">¡No se encontraron datos!</td></tr>';
                break;

              case '3'://en caso que sea laboratorio lo mismo pero para laboratorio
                $data .= '<tr><td colspan="10">¡No se encontraron datos!</td></tr>';
                break;  
            }
           
          }
       }
       //concatenamos donde termina la etiqueta table
       $data .= '</table>';
       
       //imprimimos tabla completa
       echo $data;
   ?>




