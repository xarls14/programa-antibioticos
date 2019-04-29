<!--Tabla de prueba con datos en duro-->
<div style="width:95%; margin: 0 auto;">
    <h3 style="margin-bottom: 25px;">Lista de pacientes</h3>
    <table class="display table-hover" id="muestra" style="width:100%; margin: 0 auto;">
        <thead>
            <tr>
                <!--<th style="height: 40px; width: 40px;"></th>-->
                <th>Rut</th>
                <th>Paciente</th>
                <th>Sala - Cama</th>
                <th>Diagnóstico</th>
                <th>Antibiótico</th>
                <th>Médico tratante</th>
                <th>Dosis</th>
                <th>Días ATB</th>
                <th>Frascos Despachados</th>
                <th>Estado</th>
                <th>Cultivo</th>
                <th>Observaciones</th>
                <th>PDF</th>
                <th>Opciones</th>
            </tr>
        </thead>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>17.344.683-7</td><!--Rut-->
                <td>Carlos Henriquez Irribarra</td><!--Paciente-->
                <td>S15-C2</td><!--Sala - Cama-->
                <td>Neumonía</td><!--Diagnostico-->
                <td>Ceftriaxona</td><!--Antibiotico-->
                <td>Dr. Navarro</td><!--Medico tratante-->
                <td>2 gr/día</td><!--dosis-->
                <td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalVerFechaTratamiento">
                  dias <span class="badge badge-light">4</span>
                </button>
                </td><!--dias tratamiento-->
                <td>2</td><!--frascos despachados-->
                <td><span class="badge badge-danger">Suspendido</span></td><!--estado-->
                <td>Positivo</td><!--cultivo-->
                <td>Paciente sin clínica compatible</td><!--observacion-->
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td><!--PDF-->
                <td>
                    <span data-toggle="tooltip" data-placement="top" title="Agregar nueva dosis">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNuevoDiaTratamiento">
                        <i class="fas fa-pills"></i></button>   
                    </span> 
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarPaciente">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>
                </td><!--OPCIONES-->
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>17.344.683-7</td>
                <td>Carlos Henriquez Irribarra</td>
                <td>S15-C2</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>Dr. Navarro</td>
                <td>2 gr/día</td>
                <td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalVerFechaTratamiento">
  dias <span class="badge badge-light">7</span>
</button></td>
                <td>2</td>
                <td><span class="badge badge-success">Alta paciente</span></td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top" title="Agregar nueva dosis">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNuevoDiaTratamiento">
                        <i class="fas fa-pills"></i></button>   
                    </span> 
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarPaciente">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>17.344.683-7</td>
                <td>Carlos Henriquez Irribarra</td>
                <td>S15-C2</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>Dr. Navarro</td>
                <td>2 gr/día</td>
                <td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalVerFechaTratamiento">
                  dias <span class="badge badge-light">2</span>
                </button></td>
                <td>2</td>
                <td><span class="badge badge-warning">Mantener</span></td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top" title="Agregar nueva dosis">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNuevoDiaTratamiento">
                        <i class="fas fa-pills"></i></button>   
                    </span> 
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarPaciente">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>17.344.683-7</td>
                <td>Carlos Henriquez Irribarra</td>
                <td>S15-C2</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>Dr. Navarro</td>
                <td>2 gr/día</td>
                <td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalVerFechaTratamiento">
                  dias <span class="badge badge-light">2</span>
                </button></td>
                <td>2</td>
                <td><span class="badge badge-warning">Mantener</span></td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top" title="Agregar nueva dosis">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-pills"></i></button>   
                    </span> 
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalNuevoDiaTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>17.344.683-7</td>
                <td>Carlos Henriquez Irribarra</td>
                <td>S15-C2</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>Dr. Navarro</td>
                <td>2 gr/día</td>
                <td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalVerFechaTratamiento">
                  dias <span class="badge badge-light">2</span>
                </button></td>
                <td>2</td>
                <td><span class="badge badge-warning">Mantener</span></td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top" title="Agregar nueva dosis">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNuevoDiaTratamiento">
                        <i class="fas fa-pills"></i></button>   
                    </span> 
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarPaciente">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>17.344.683-7</td>
                <td>Carlos Henriquez Irribarra</td>
                <td>S15-C2</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>Dr. Navarro</td>
                <td>2 gr/día</td>
                <td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalVerFechaTratamiento">
                  dias <span class="badge badge-light">2</span>
                </button></td>
                <td>2</td>
                <td><span class="badge badge-warning">Mantener</span></td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top" title="Agregar nueva dosis">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNuevoDiaTratamiento">
                        <i class="fas fa-pills"></i></button>   
                    </span> 
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarPaciente">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>17.344.683-7</td>
                <td>Carlos Henriquez Irribarra</td>
                <td>S15-C2</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>Dr. Navarro</td>
                <td>2 gr/día</td>
                <td><button style="width: 70px; height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalVerFechaTratamiento">
                  dias <span class="badge badge-light">2</span>
                </button></td>
                <td>2</td>
                <td><span class="badge badge-warning">Mantener</span></td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top" title="Agregar nueva dosis">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNuevoDiaTratamiento">
                        <i class="fas fa-pills"></i></button>   
                    </span> 
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarPaciente">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
    </table>
</div>