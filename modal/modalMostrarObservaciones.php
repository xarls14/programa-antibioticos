<style type="text/css">
  .error {
  color: red;
}
</style>
<div class="modal fade" id="myModalMostrarObservaciones">
    <div class="modal-dialog modal-xl" style="width: 1000px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Observaciones del antibiótico</h4>
          <button type="button" class="close" data-dismiss="modal" onclick="limpiarTablaObservaciones()">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="formCambioEstadoATB" method="post" role="form">

          <!--Tabla donde mostramos a los pacientes y sus datos-->

          <table id="tablaDescripciones" class="table table-borderless table-hover">
          <thead>
            <tr>
              <th>N°</th>
              <th>Descripción</th>
              <th>Médico</th>
              <th>Fecha</th>
              <!--<th>Opciones</th>-->
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
          
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarTablaObservaciones()">Cancelar</button>
          <input type="hidden" id="id_paciente_oculto_id_antibiotico">
          </div>          
          </form>
        </div>
        
        
        
    </div>

  </div>

</div>
