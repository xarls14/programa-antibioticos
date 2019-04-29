<style type="text/css">
  .error {
  color: red;
}
</style>
<div class="modal fade" id="myModalNuevoPaciente">
    <div class="modal-dialog modal-lg" style="width: 600px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ingresar paciente</h4>
          <button type="button" class="close" data-dismiss="modal"  onclick="limpiarNuevoPaciente()">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="formCrearPaciente" method="post" role="form">

            <!--Nombres y apellidos-->
            <div class="row">
               <div class="form-group col-sm-6">
                <label>Nombre</label>
                <input tdype="form-text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa nombre" maxlength="20" onkeypress="return soloLetras(event)">     
              </div>
              <div class="form-group col-sm-6">
                <label>Apellido</label>
                <input type="form-text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa apellido" maxlength="20" onkeypress="return soloLetras(event)">     
              </div>
            </div>

            <!--Rut y sala - cama -->
           <div class="row">
            <div class="form-group col-sm-6">
              <label>Rut</label>
              <input type="form-text" class="form-control" id="rut" placeholder="Ingresa rut" name="rut" onkeypress="return validacionCaracteresRut(event)" maxlength="12">     
            </div>
            <div class="form-group col-sm-6">
              <label>Sala - Cama</label>
              <input type="form-text" class="form-control" id="sala_cama" placeholder="Ingresa sala-cama" name="sala_cama">     
            </div>
           </div>

           <div class="row">
             <div class="form-group col-sm-6">
              <label>Médico tratante</label>
              <input type="form-text" class="form-control" id="medico_tratante" placeholder="Ingresa médico tratante" name="medico_tratante">     
            </div>
           </div>

          <div class="row">
            <div class="form-group col-sm-11">
              <label>Haz click en el icono para ingresar mas de un antibiótico</label>
            </div>
            <div class="form-group col-sm-1">
                <button type="button" class="btn btn-success" href="#" id="addAntibiotico" style="width: 30px;
                  height: 30px;
                  padding: 6px 0px;
                  border-radius: 15px;
                  text-align: center;
                  font-size: 12px;
                  line-height: 1.42857;
                  float: right;">
                  <i class="fas fa-plus"></i></button> 
              </div>
          </div> 



          <!-- Select de antibioticos -->
          <div>
            <div class="row">
              <div class="form-group col-sm-12">
                  <label>Antibiótico N°1</label>
                  <select class="form-control" type="select" id="antibiotico" name="antibiotico[1]">
                    <option selected>Elegir antibiótico...</option>
                    <option value="AMIKACINA FA 500 MG">AMIKACINA FA 500 MG</option>
                    <option value="AMPICILINA 1 GR FA">AMPICILINA 1 GR FA</option>
                    <option value="CEFAZOLINA FA 1 GR">CEFAZOLINA FA 1 GR</option>
                    <option value="CEFTAZIDIMA FA 1 GR">CEFTAZIDIMA FA 1 GR</option>
                    <option value="CEFTRIAXONA FA 1GR">CEFTRIAXONA FA 1GR</option>
                    <option value="ERTAPENEM FC 1 GRAMO">ERTAPENEM FC 1 GRAMO</option>
                    <option value="ESTREPTOMICINA FA 1 GR">ESTREPTOMICINA FA 1 GR</option>
                    <option value="GENTAMICINA AM 80 MG/2 ML">GENTAMICINA AM 80 MG/2 ML</option>
                    <option value="IMIPENEM FA 500 MG">IMIPENEM FA 500 MG</option>
                    <option value="MEROPENEM FA 1 GR">MEROPENEM FA 1 GR</option>
                    <option value="PENICILINA BENZATINA FA 1.200.000 UI">PENICILINA BENZATINA FA 1.200.000 UI</option>
                    <option value="PENICILINA G SODICA FA 2.000.000 UI">PENICILINA G SODICA FA 2.000.000 UI</option>
                    <option value="PIPERACILINA/TAZOBACTAM FA 4,5 GR">PIPERACILINA/TAZOBACTAM FA 4,5 GR</option>
                    <option value="SULFAMETOXAZOL/TRIMETOPRIMA 400/80MG AM">SULFAMETOXAZOL/TRIMETOPRIMA 400/80MG AM</option>
                    <option value="VANCOMICINA CLORHIDRATO 1 GR">VANCOMICINA CLORHIDRATO 1 GR</option>
                  </select>
              </div>
             </div>

             <!--Dosis y medico tratante-->
             <div class="row">
              <div class="form-group col-sm-6">
                <label>Dosis</label>
                <input type="form-text" class="form-control" id="dosis" placeholder="Ingresa dosis n°1" name="dosis[]">     
              </div> 
             </div>
          </div>

           <div class="row"  id="antibioticos" style="margin-top: 8px;"></div>
           
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="validarFormPaciente()">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarNuevoPaciente()">Cancelar</button>
        </div>
          </form>
        </div>
        
        
        
    </div>

  </div>

</div>
