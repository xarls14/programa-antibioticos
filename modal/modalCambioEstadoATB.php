<style type="text/css">
  .error {
  color: red;
}
</style>
<div class="modal fade" id="myModalCambioEstadoATB">
    <div class="modal-dialog modal-lg" style="width: 600px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Cambio estado ATB</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="formCambioEstadoATB" method="post" role="form">

          <!-- Select de antibioticos -->
          <div>
            <div class="row">
              <div class="form-group col-sm-12">
                  <label>Estado ATB</label>
                  <select class="form-control" type="select" id="cambiar_estado_antibiotico" name="cambiar_estado_antibiotico">
                    <option selected>Elegir estado...</option>
                    <option value="ALTA">ALTA</option>
                    <option value="SUSPENSION">SUSPENSIÓN</option>
                    <!--<option value="ALBUMINA HUMANA">ALBUMINA HUMANA</option>-->
                    <!--<option value="TERLIPRESINA">TERLIPRESINA</option>-->
                    <!--<option value="PENDIENTE CULTIVOS HH">PENDIENTE CULTIVOS HH</option>-->
                    <option value="CONTINUAR TERAPIA">CONTINUAR TERAPIA</option>
                  </select>
              </div>
             </div>
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="cambioEstadoATB()">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <input type="hidden" id="id_paciente_oculto_id_antibiotico">
          </div>          
          </form>
        </div> 
    </div>

  </div>

</div>
