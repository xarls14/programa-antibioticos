<?php
session_start();

include '../modal/modalActualizarATB.php';
include '../modal/modalEliminarPaciente.php';
include '../modal/modalNuevoATB.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Farmacia - Datos del paciente</title>
<style type="text/css">
	   td.details-control {
    background: url('../resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('../resources/details_close.png') no-repeat center center;
}
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>

<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css ">
<link rel="stylesheet" href="../css/tabla-pacientes.css">

<script type="text/javascript" src="../js/functions.js"></script>

<link rel="icon" type="image/ico" href="../images/icons/favicon.ico"/>
</head>
<body>
<?php include '../layout/headerFarmacia.php';?>

<div style="float: right; margin-right: 50px;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalActualizarATB">Nuevo ATB <i class="fas fa-user-plus"></i></button></span></div>

<!--Tabla de prueba con datos en duro-->
<div style="width:95%; margin: 0 auto;">
	<h3 style="margin-bottom: 25px;">Carlos Henriquez Irribarra</h3>
	<table class="display table-hover" id="muestra" style="width:100%; margin: 0 auto;">
        <thead>
            <tr>
            	<!--<th style="height: 40px; width: 40px;"></th>-->
                <th>Fecha Ingreso</th>
                <th>Diagnóstico</th>
                <th>Antibiótico</th>
                <th>Dosis</th>
                <th>Días ATB</th>
                <th>Frascos Despachados</th>
                <th>Estado</th>
                <th>Cultivo</th>
                <th>Observaciones</th>
                <th>PDF</th>
                <!--<th>Nuevo ATB</th>
                <th>Función renal</th>
                <th>Días de ATB</th>-->
                <th>Opciones</th>
            </tr>
        </thead>
            <tr>
            	<!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="left"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </td>
            </tr>
            <tr>
                <!--<td class="details-control"></td>-->
                <td>25-01-2019</td>
                <td>Neumonía</td>
                <td>Ceftriaxona</td>
                <td>2 gr/día</td>
                <td>5</td>
                <td>2</td>
                <td>Mantener</td>
                <td>Positivo</td>
                <td>Paciente sin clínica compatible</td>
                <td><a target="blank" href="http://www.africau.edu/images/default/sample.pdf"><i style="width: 20px;height: 20px;" class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top"
                    title="Editar datos tratamiento"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalActualizarTratamiento">
                    <i class="fas fa-pen-square"></i></button></span>
                    <span data-toggle="tooltip" data-placement="top" title="Eliminar tratamiento">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt"></i></button>   
                    </span>  
                </tdb
            </tr>
    </table>
</div>

<?php include '../layout/footer.php';?>

</body>
</html>


<script type="text/javascript">

/*En esta variable guardamos la data de cada fila por lo que en este lugar se deberian traer los datos por cada tratamiento y por cada paciente*/
var data = [
    { Observaciones :'Esto es un ejemplo de descripcion', Opciones: '<button type="button" class="btn btn-primary">Abrir Modal</button>'},
    { key1 :'value1', key2 :'value2'},
    { key1 :'value1', key2 :'value2'},
    { key1 :'value1', key2 :'value2'},
    { key1 :'value1', key2 :'value2'}
];
function format (index ) {
    var json_data =  data[parseInt(index)];
    var op = '';
    $.each(json_data, function(key, value){
        op +=


        /*'<table style="border:0; cellspacing:0; cellpadding:0;">'+
        '<tr>'+
            '<td style="float: left;">'+ key +':</td>'+
            '<td style="float: left;">'+ value + '</td>'+
        '</tr>'+
    '</table>';*/

    /*'<div>' + '<b>'+key+'</b>' + ' : '+ value + '</div>';*/

    '<ul class="list-group list-group-flush">'+
	  '<li style="text-align:left" class="list-group-item">'+ key + ' : '+ value +'</li>'+
	'</ul>';
    });
    return op;
}
</script>
