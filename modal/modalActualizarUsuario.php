<style type="text/css">
  .error {
  color: red;
}
</style>
<div class="modal fade" id="myModalActualizarUsuario">
    <div class="modal-dialog modal-lg" style="width: 600px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Actualizar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="FormActualizarUsuario" method="post" role="form">

            <!--Nombre-->
            <div class="row">
              <div class="form-group col-sm-6">
                <label>Nombre</label>
                <input placeholder="Ingresa nombre" id="actualizar_nombre" name="actualizar_nombre" class="form-control" data-validation-engine="validate[required]" maxlength="20">
              </div>  
            <!--Apellido-->
              <div class="form-group col-sm-6">
                  <label>Apellido</label>
                  <input placeholder="Ingresa apellido" id="actualizar_apellido" name="actualizar_apellido" class="form-control" data-validation-engine="validate[required]" maxlength="20" >
              </div> 
            </div>

            <!--Rut -->
            <div class="row">
              <div class="form-group col-sm-6">
                <label>Rut</label>
                <input placeholder="Ingresa rut" id="actualizar_usuario_rut" name="actualizar_usuario_rut" class="form-control" data-validation-engine="validate[required]"  maxlength="12">
              </div>
              <!--Tipo Usuario-->
              <div class="form-group col-sm-6">
                  <label>Tipo Usuario</label>
                  <select class="form-control" type="select" id="actualizar_selectUsuario" name="actualizar_selectUsuario">
                    <option selected>Elegir tipo de usuario...</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Medico Basico">Médico Básico</option>
                    <option value="Basico">Básico</option>
                  </select>
              </div>
            </div>         
            
             
            <!--Email-->
            <div class="row">
              <div class="form-group col-sm-12">
                <label>Email</label>
                <input placeholder="Ingresa email" type="email" id="actualizar_email" name="actualizar_email" class="form-control" data-validation-engine="validate[required]"  maxlength="50">
              </div>
            </div>
            
            <div class="modal-footer">
              <button type="submit" name="submit" id="submit" class="btn btn-primary">Actualizar Usuario</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
              <input type="hidden" id="id_paciente_oculto_id_usuario">

            </div>
        </form>
        </div>
        
    </div>
  </div>
</div>    


<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

    function validacionCaracteresRut(e){
      key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "-.0123456789kK";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

    function validarCaracteresEmail(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "qwertyuioplkjhgfdsazxcvbnm0123456789.-_@";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

    function validarCaracteresPassword(e){
      key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "qwertyuioplkjhgfdsazxcvbnm0123456789.-_";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>