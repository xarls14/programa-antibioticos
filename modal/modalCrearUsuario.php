<style type="text/css">
  .error {
  color: red;
}
</style>
<div class="modal fade" id="myModalCrearUsuario">
    <div class="modal-dialog modal-lg" style="width: 600px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Registrar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal" onclick="limpiarCrearUsuario()">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <form id="FormCrearUsuario" method="post" role="form">

            <!--Nombre-->
            <div class="row">
              <div class="form-group col-sm-6">
                <label>Nombre</label>
                <input placeholder="Ingresa nombre" id="nombre" name="nombre" class="form-control" data-validation-engine="validate[required]" maxlength="20" onkeypress="return soloLetras(event)">
              </div>  
            <!--Apellido-->
              <div class="form-group col-sm-6">
                  <label>Apellido</label>
                  <input placeholder="Ingresa apellido" id="apellido" name="apellido" class="form-control" data-validation-engine="validate[required]" maxlength="20" onkeypress="return soloLetras(event)">
              </div> 
            </div>

            <div class="row">
              <div class="form-group col-sm-12">
                <label>Rut</label>
                <input placeholder="Ingresa rut" id="usuario_rut" name="usuario_rut" class="form-control" data-validation-engine="validate[required]"  maxlength="12" onkeypress="return validacionCaracteresRut(event)">
              </div>

            </div>

            <!--Rut -->
            <div class="row">
              <!--Tipo Usuario-->
              <div class="form-group col-sm-6">
                  <label>Tipo Usuario</label>
                  <select class="form-control" type="select" id="selectUsuario" name="selectUsuario">
                    <option value="Administrador">Administrador</option>
                    <option value="Medico Basico">Médico Básico</option>
                    <option value="Basico">Básico</option>
                  </select>
              </div>

              <div class="form-group col-sm-6">
                  <label>Unidad usuario</label>
                  <select class="form-control" type="select" id="selectUnidad" name="selectUnidad" placeholder="Seleccione unidad">
                    <option selected>Elegir unidad...</option>
                    <option value="1">Farmacia</option>
                    <option value="2">Medicina</option>
                    <option value="3">Laboratorio</option>
                  </select>
              </div>
            </div>         
            
             
            <!--Email-->
            <div class="row">
              <div class="form-group col-sm-12">
                <label>Email</label>
                <input placeholder="Ingresa email" type="email" id="email" name="email" class="form-control" data-validation-engine="validate[required]"  maxlength="50" onkeypress="return validarCaracteresEmail(event)">
              </div>
            </div>
            
            
            <div class="row">
              <!--contraseña-->
              <div class="form-group col-sm-12">
                  <label>Contraseña</label>
                  <input placeholder="Ingresa contraseña" type="password" id="password" name="password" class="form-control" data-validation-engine="validate[required]" onkeypress="return validarCaracteresPassword(event)" maxlength="30">
              </div>
            </div>
            <div class="row">
              <!--Confirmar contraseña-->
              <div class="form-group col-sm-12">
                  <label>Confirmar Contraseña</label>
                  <input placeholder="Confirma contraseña" type="password" id="conf_password" name="conf_password" class="form-control" data-validation-engine="validate[required]"  maxlength="30" onkeypress="return validarCaracteresPassword(event)">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="validarCrearUsuario()">Crear Usuario</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarCrearUsuario()">Cancelar</button>
            </div>
        </form>
        </div>
        
    </div>
  </div>
</div>    
