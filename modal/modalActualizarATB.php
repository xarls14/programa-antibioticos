<div class="modal fade" id="myModalActualizarTratamiento">
    <div class="modal-dialog modal-lg" style="width: 600px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editar tratamiento</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form method="post">
            <!--Nombres y apellidos -->
            <div class="row">
              <div class="form-group col-sm-6">
              <label>Diagnóstico</label>
              <input type="form-text" class="form-control" maxlength="20" id="actualizar_diagnostico" placeholder="Ingresa diagnóstico" onkeypress="return soloLetras(event)">     
            </div>
              <div class="form-group col-sm-6">
                <label>Antibiótico</label>
                <input type="form-text" class="form-control" maxlength="20" id="actualizar_antibiotico" placeholder="Ingresa antibiótico" onkeypress="return soloLetras(event)">
              </div>
            </div>
            <!--dosis y dias atb -->
           <div class="row">
             <div class="form-group col-sm-6">
              <label>Dosis</label>
              <input type="form-text" class="form-control" maxlength="20" id="actualizar_dosis" placeholder="Ingresa dosis">     
            </div>
            <div class="form-group col-sm-6">
              <label>Días ATB</label>
              <input type="form-text" class="form-control" maxlength="20" id="actualizar_dias_atb" placeholder="Ingresa días ATB">
            </div>
           </div>
           <!--frascos despachados y estado-->
           <div class="row">
             <div class="form-group col-sm-6">
              <label>Frascos despachados</label>
              <input type="form-number" class="form-control" maxlength="20" id="actualizar_frascos_despachados" placeholder="Ingresa frascos despachados">     
            </div>
            <div class="form-group col-sm-6">
              <label>Estado</label>
              <input type="form-text" class="form-control" maxlength="20" id="actualizar_estado" placeholder="Ingresa estado">
            </div>
           </div>
           <!--cultivo y observaciones-->
           <div class="row">
             <div class="form-group col-sm-6">
              <label>Cultivo</label>
              <input type="form-number" class="form-control" maxlength="20" id="actualizar_cultivo" placeholder="Ingresa frascos despachados">     
            </div>
           </div>
           <div class="row">
             <div class="form-group col-sm-12">
              <label>Observaciones</label>
              <textarea type="form-text" class="form-control" maxlength="20" id="actualizar_observaciones" placeholder="Ingresa estado"></textarea>
              <!--<input type="form-text" class="form-control" maxlength="20" id="actualizar_observaciones" placeholder="Ingresa estado">-->
            </div>
           </div>
          </form>
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <input type="hidden" id="id_paciente_oculto">
        </div>
    </div>
  </div>
</div>