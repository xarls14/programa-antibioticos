<style type="text/css">
  .error {
  color: red;
}
</style>
<div class="modal fade" id="myModalNuevoDiaTratamiento">
    <div class="modal-dialog modal-lg" style="width: 600px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Nueva dosis al tratamiento</h4>
          <button type="button" class="close" data-dismiss="modal" onclick="limpiarNuevaDosisTratamiento()">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="formNuevoDiaTratamiento" method="post" role="form">
            <div class="row">
            <div class="form-group col-sm-12">
              <label>Cantidad de frascos</label>
              <input class="form-control" type="number" id="num_frasco" name="num_frasco" placeholder="Ingrese cantidad de frascos">    
            </div>
              <!--<div class="form-group col-sm-6">
                <label>Dias del tratamiento</label>
                <input type="form-text" class="form-control" maxlength="20" id="dia_tratamiento" name="dia_tratamiento" placeholder="Ingresa antibiótico" onkeypress="return soloLetras(event)">
              </div>-->
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label>Fecha tratamiento</label>
                <input class="form-control" id="fecha_tratamiento" name="fecha_tratamiento" placeholder="Ingrese fecha tratamiento">
              </div>
              <div class="form-group col-sm-6">
                <label>Médico prescriptor</label>
                <input class="form-control" type="text" id="medico_prescripcion" name="medico_prescripcion" placeholder="Ingrese médico prescriptor">    
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" onclick="validarFormNuevoDiaTratamiento()">Aceptar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarNuevaDosisTratamiento()">Cancelar</button>
              <input type="hidden" id="id_paciente_oculto_id_paciente">
              <input type="hidden" id="id_paciente_oculto_id_tratamiento">
              <input type="hidden" id="id_paciente_oculto_id_antibiotico">
              <input type="hidden" id="id_paciente_oculto_num_frasco">
              <input type="hidden" id="id_paciente_oculto_fecha_inicio">
              <input type="hidden" id="id_paciente_oculto_fecha_termino">
              <input type="hidden" id="id_paciente_oculto_dias_tratamiento">
            </div>
          </form>
        </div>      
    </div>
  </div>
</div>
