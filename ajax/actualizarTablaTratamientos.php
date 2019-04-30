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

   }else{//entonces es basico

     //esta variable contendra codigo html y php de la tabla que se muestra en actualizarTabla()
     switch ($_SESSION['areas_id_area']) { //preguntamos por el area
        case '1':
                 $data = '<table class="display table-hover" id="tablaPacientes" style="width:100%; margin: 0 auto;">
          <thead>
              <tr>

                  <th>Rut</th>
                  <th>Paciente</th>
                  <th>Sala - Cama</th>
                  <th>Diagnóstico</th>
                  <th>Médico tratante</th>                              
                  <!--<th>Observaciones</th>-->                  
                  <th>Nuevo ATB</th>
                  <th>Ver PDF</th>
              </tr>
          </thead>';

        break;

        case '2':
                 $data = '<table class="display table-hover" id="tablaPacientes" style="width:100%; margin: 0 auto;">
          <thead>
              <tr>

                  <th>Rut</th>
                  <th>Paciente</th>
                  <th>Sala - Cama</th>
                  <th>Diagnóstico</th>
                  <th>Médico tratante</th>                              
                  <!--<th>Observaciones</th>-->                  
                  <th>Ver PDF</th>
              </tr>
          </thead>';

        break;

        case '3':
                 $data = '<table class="display table-hover" id="tablaPacientes" style="width:100%; margin: 0 auto;">
          <thead>
              <tr>

                  <th>Rut</th>
                  <th>Paciente</th>
                  <th>Sala - Cama</th>
                  <th>Diagnóstico</th>
                  <th>Médico tratante</th>                              
                  <!--<th>Observaciones</th>-->                  
                  <th>Opciones PDF</th>
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

   }else{//si el usuario es basico

       //luego de saber si es administrador filtramos la consulta dependiendo del area a la que pertenece
       switch ($_SESSION['areas_id_area']) {//preguntamos por el area 

       case '1'://FARMACIA -> mostramos los tratamientos si estamos en perfil farmacia

               $query = "SELECT *
                     FROM pacientes p
                     INNER JOIN tratamientos t ON p.id_paciente = t.pacientes_id_paciente

                     WHERE p.areas_id_area = 1
                ORDER BY p.fecha_ingreso DESC;";
        break;

        case '2'://MEDICINA -> mostramos los tratamientos si estamos en perfil medicina

               $query = "SELECT *
                     FROM pacientes p
                     INNER JOIN tratamientos t ON p.id_paciente = t.pacientes_id_paciente

                     WHERE p.areas_id_area = 1
                ORDER BY p.fecha_ingreso DESC;";
        break;

        case '3'://LABORATORIO -> mostramos los tratamientos si estamos en perfil laboratorio

               $query = "SELECT *
                     FROM pacientes p
                     INNER JOIN tratamientos t ON p.id_paciente = t.pacientes_id_paciente

                     WHERE p.areas_id_area = 1
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

               //preguntamos por el tipo de sesion que trae session y escribimos codigo html/php para cada tipo de usuario logueado (concatenado) 
               switch ($_SESSION['tipo_usuario']) {//tipo de usuario

                    case 'Basico':
                       if($_SESSION['areas_id_area'] == "1"){//si el usuario es basico y del area de farmacia mostramos los pacientes de farmacia con un tratamiento activo
                           $data .= '

                           <tr>
                               <td>'.$row['rut'].'</td>
                               <td>'.$row['nombres'].' '.$row['apellidos'].'</td> 
                               <td>'.$row['sala_cama'].'</td>  
                               <td>'.$row['diagnostico'].'</td>
                                <td>'.$row['medico_tratante'].'</td> 

                               <!--<td>'.$row['observacion'].'</td>-->

                               <td>
                               <div>
                                <!--<span data-toggle="tooltip" data-placement="top" title="Agregar nueva dosis">
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNuevoDiaTratamiento">
                                  <i class="fas fa-pills"></i></button>   
                                </span>--> 

                                <span data-toggle="tooltip" data-placement="top"
                                  title="Agregar un antibiótico a este tratamiento."><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalAgregarATB" onclick="abrirModalATB('.$row['id_paciente'].','.$row['id_tratamiento'].')" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus-circle"></i></button>
                                </span>
                               </td>
                               <td>
                                <div>
                                <span data-toggle="tooltip" data-placement="top"
                                  title="Ver archivos pdf de este tratamiento."><button type="button" class="btn btn-success" data-toggle="modal" onclick="abrirModalVerPdf('.$row['id_paciente'].','.$row['id_tratamiento'].')" data-backdrop="static" data-keyboard="false"><i class="fas fa-file-pdf"></i></button>
                                </span>
                                </div>
                               </td>


                           </tr>';

                        }elseif ($_SESSION['areas_id_area'] == "2") {
                          $data .= '

                           <tr>
                               <td>'.$row['rut'].'</td>
                               <td>'.$row['nombres'].' '.$row['apellidos'].'</td> 
                               <td>'.$row['sala_cama'].'</td>  
                               <td>'.$row['diagnostico'].'</td>
                               <td>'.$row['medico_tratante'].'</td> 
                               <!--<td>'.$row['observacion'].'</td>-->

                               <td>
                               <div>
                                <!--<span data-toggle="tooltip" data-placement="top"
                                  title="Diagnosticar a este paciente."><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalAgregarATB" onclick="abrirModalATB('.$row['id_paciente'].','.$row['id_tratamiento'].')" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus-circle"></i></button>
                                </span>-->
                                <span data-toggle="tooltip" data-placement="top"
                                  title="Ver archivos pdf de este tratamiento."><button type="button" class="btn btn-success" data-toggle="modal" onclick="abrirModalVerPdf('.$row['id_paciente'].','.$row['id_tratamiento'].')" data-backdrop="static" data-keyboard="false"><i class="fas fa-file-pdf"></i></button>
                                </span>

                               </td>

                           </tr>';
                        }elseif ($_SESSION['areas_id_area'] == "3") {
                          $data .= '

                           <tr>
                               <td>'.$row['rut'].'</td>
                               <td>'.$row['nombres'].' '.$row['apellidos'].'</td> 
                               <td>'.$row['sala_cama'].'</td>  
                               <td>'.$row['diagnostico'].'</td>
                               <td>'.$row['medico_tratante'].'</td> 
                               <!--<td>'.$row['observacion'].'</td>-->

                               <td>
                               <div>
                                <span data-toggle="tooltip" data-placement="top"
                                  title="Subir un PDF a este tratamiento."><button type="button" class="btn btn-primary" data-toggle="modal" onclick="abrirModalSubirPdf('.$row['id_paciente'].','.$row['id_tratamiento'].')" data-backdrop="static" data-keyboard="false"><i class="fas fa-upload"></i></button>
                                </span>

                                <span data-toggle="tooltip" data-placement="top"
                                  title="Ver archivos pdf de este tratamiento."><button type="button" class="btn btn-success" data-toggle="modal" onclick="abrirModalVerPdf('.$row['id_paciente'].','.$row['id_tratamiento'].')" data-backdrop="static" data-keyboard="false"><i class="fas fa-file-pdf"></i></button>
                                </span>

                               </td>

                           </tr>';
                        }
                        break;
               }    
           }
       }else{

           // Sí no se muestran los datos debemos colocar esto dependiendo del numero de columnas por lo que deberia ir un switchpreguntando si es admin o basico (farmacia, medicina y laboratorio)
            switch ($_SESSION['areas_id_area']) {//si es de farmacia
              case '1':
                $data .= '<tr><td colspan="7">¡No se encontraron datos!</td></tr>';
                break;  

              case '2':
                $data .= '<tr><td colspan="6">¡No se encontraron datos!</td></tr>';
                break;
                
              case '3':
                $data .= '<tr><td colspan="6">¡No se encontraron datos!</td></tr>';
                break;    
            }

          }

       //concatenamos donde termina la etiqueta table
       $data .= '</table>';

       //imprimimos tabla completa
       echo $data;
   ?>