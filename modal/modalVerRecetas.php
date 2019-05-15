<style type="text/css">
  .error {
  color: red;
}
</style>
<div class="modal fade" id="myModalVerRecetas">
    <div class="modal-dialog modal-xl" style="width: 1000px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Recetas prescritas</h4>
          <button type="button" class="close" data-dismiss="modal" onclick="limpiarTablaRecetas()">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="formCambioEstadoATB" method="post" role="form">

          <!--Tabla donde mostramos a los pacientes y sus datos-->

          <table id="tablaRecetas" class="table table-borderless table-hover">
          <thead>
            <tr>
              <th>N°</th>
              <th>Médico prescriptor</th>
              <th>Fecha</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
          
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarTablaRecetas()">Cancelar</button>
          <input type="hidden" id="id_paciente_oculto_id_paciente">
          <input type="hidden" id="id_paciente_oculto_id_tratamiento">
          <input type="hidden" id="id_paciente_oculto_id_antibiotico">
          </div>          
          </form>
        </div>
        
        
        
    </div>

  </div>

</div>
