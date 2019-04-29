<style type="text/css">
  .error {
  color: red;
}
</style>
<div class="modal fade" id="myModalDiagnosticarPaciente">
    <div class="modal-dialog modal-lg" style="width: 600px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Diagnosticar paciente</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="formDiagnosticarPaciente" method="post" role="form">

          <!-- Select de antibioticos -->
          <div>
            <div class="row">
              <div class="form-group col-sm-12">
                  <label>Diagnóstico paciente</label>
                  <input type="form-text" class="form-control" maxlength="50" id="diagnostico_paciente" name="diagnostico_paciente" placeholder="Ingresa diagnóstico" onkeypress="return soloLetras(event)">
              </div>
             </div>
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="validarFormDiagnoticarPaciente()">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <input type="hidden" id="id_paciente_oculto_id_paciente">
          <input type="hidden" id="id_paciente_oculto_id_tratamiento">
          </div>          
          </form>
        </div>
        
        
        
    </div>

  </div>

</div>
