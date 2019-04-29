<style type="text/css">
  .error {
  color: red;
}
</style>
<div class="modal fade" id="myModalObservacionMedico">
    <div class="modal-dialog modal-lg" style="width: 600px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Observación médico</h4>
          <button type="button" class="close" data-dismiss="modal" onclick="limpiarObservacionMedico()">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="formObservacionMedico" method="post" role="form">

          <!-- input para observacion -->
          <div>
            <div class="row">
              <div class="form-group col-sm-12">
                  <label>Observación médico</label>
                  <input type="form-text" class="form-control" maxlength="100" id="observacion_medico" name="observacion_medico" placeholder="Ingresar observación">
              </div>
             </div>
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="validarFormObservacionMedico()">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarObservacionMedico()">Cancelar</button>
          <input type="hidden" id="id_paciente_oculto_id_paciente">
          <input type="hidden" id="id_paciente_oculto_id_tratamiento">
          <input type="hidden" id="id_paciente_oculto_id_antibiotico">
          </div>          
          </form>
        </div>
        
        
        
    </div>

  </div>

</div>
