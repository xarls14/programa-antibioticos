<style type="text/css">
  .error {
  color: red;
}
</style>
<div class="modal fade" id="myModalNuevoPassword">
    <div class="modal-dialog modal-lg" style="width: 600px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Cambiar contraseña</h4>
          <button type="button" class="close" data-dismiss="modal" onclick="limpiarNuevoPassword()">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <form id="FormNuevoPassword" method="post" role="form">
            <div class="row">
              <!--contraseña-->
              <div class="form-group col-sm-12">
                  <label>Contraseña</label>
                  <input placeholder="Ingresa contraseña" type="password" id="nuevo_password" name="nuevo_password" class="form-control" data-validation-engine="validate[required]" onkeypress="return validarCaracteresPassword(event)" maxlength="30">
              </div>
            </div>
            <div class="row">
              <!--Confirmar contraseña-->
              <div class="form-group col-sm-12">
                  <label>Confirmar Contraseña</label>
                  <input placeholder="Confirma contraseña" type="password" id="nuevo_conf_password" name="nuevo_conf_password" class="form-control" data-validation-engine="validate[required]"  maxlength="30" onkeypress="return validarCaracteresPassword(event)">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit_password" id="submit_password" class="btn btn-primary" onclick="validarFormNuevoPassword()">Aceptar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarNuevoPassword()">Cancelar</button>
              <input type="hidden" id="id_usuario_oculto_id_usuario">
            </div>
        </form>
        </div>
        
    </div>
  </div>
</div>    
