
<div class="modal fade" id="myModalActualizarPaciente">
    <div class="modal-dialog modal-lg" style="width: 600px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editar paciente</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form method="post">
            <!--Nombres y apellidos -->
            <div class="row">
              <div class="form-group col-sm-6">
              <label>Nombre</label>
              <input type="form-text" class="form-control" maxlength="20" id="actualizar_nombres" name="actualizar_nombres" placeholder="Ingresa nombre" onkeypress="return soloLetras(event)">     
            </div>
              <div class="form-group col-sm-6">
                <label>Apellido</label>
                <input type="form-text" class="form-control" maxlength="20" id="actualizar_apellidos" name="actualizar_apellidos" placeholder="Ingresa apellido" onkeypress="return soloLetras(event)">
              </div>
            </div>
            <!--Rut y sala - cama -->
           <div class="row">
             <div class="form-group col-sm-6">
              <label>Rut</label>
              <input type="form-text" class="form-control" maxlength="12" id="actualizar_rut" name="actualizar_rut" placeholder="Ingresa rut" onkeypress="return validacionCaracteresRut(event)">     
            </div>
            <div class="form-group col-sm-6">
              <label>Sala - Cama</label>
              <input type="form-text" class="form-control" id="actualizar_sala_cama" placeholder="Ingresa sala/cama" name="actualizar_sala_cama">     
            </div>
           </div>

           <!--Dosis y antibiotico-->
           <div class="row">
            <div class="form-group col-sm-12">
              <label>Dosis</label>
              <input type="form-text" class="form-control" id="actualizar_dosis" placeholder="Ingresa dosis" name="actualizar_dosis">
            </div>
           </div>

           <div class="row">
            <div class="form-group col-sm-12">
              <label>Antibióticos</label>
                <!--<select class="selectpicker form-control" data-live-search="true" id="antibioticos" name="antibioticos">
                  <option>Hot Dog, Fries and a Soda</option>
                  <option>Burger, Shake and a Smile</option>
                  <option>Sugar, Spice and alnombrel things nice</option>
                </select>-->
                <select class="form-control" type="select" id="actualizar_antibiotico" name="actualizar_antibiotico">
                <option selected>Seleccione antibiótico....</option>
                    <option value="AMIKACINA FA 500 MG">AMIKACINA FA 500 MG</option>
                    <option value="AMPICILINA 1 GR FA">AMPICILINA 1 GR FA</option>
                    <option value="CEFAZOLINA FA 1 GR">CEFAZOLINA FA 1 GR</option>
                    <option value="CEFTAZIDIMA FA 1 GR">CEFTAZIDIMA FA 1 GR</option>
                    <option value="CEFTRIAXONA FA 1GR">CEFTRIAXONA FA 1GR</option>
                    <option value="CLINDAMICINA AM 600 MG/ML">CLINDAMICINA AM 600 MG/ML</option>
                    <option value="CLOXACILINA SODICA FA 500 MG">CLOXACILINA SODICA FA 500 MG</option>
                    <option value="ERTAPENEM FC 1 GRAMO">ERTAPENEM FC 1 GRAMO</option>  
                    <option value="ESTREPTOMICINA FA 1 GR">ESTREPTOMICINA FA 1 GR</option>
                    <option value="GENTAMICINA AM 80 MG/2 ML">GENTAMICINA AM 80 MG/2 ML</option>
                    <option value="IMIPENEM FA 500 MG">IMIPENEM FA 500 MG</option>                   
                    <option value="MEROPENEM FA 1 GR">MEROPENEM FA 1 GR</option>
                    <option value="METRONIDAZOL FA 500MG/100ML">METRONIDAZOL FA 500MG/100ML</option>
                    <option value="PENICILINA BENZATINA FA 1.200.000 UI">PENICILINA BENZATINA FA 1.200.000 UI</option>
                    <option value="PENICILINA G SODICA FA 2.000.000 UI">PENICILINA G SODICA FA 2.000.000 UI</option>
                    <option value="PIPERACILINA/TAZOBACTAM FA 4,5 GR">PIPERACILINA/TAZOBACTAM FA 4,5 GR</option>
                    <option value="SULFAMETOXAZOL/TRIMETOPRIMA 400/80MG AM">SULFAMETOXAZOL/TRIMETOPRIMA 400/80MG AM</option>
                    <option value="VANCOMICINA CLORHIDRATO 1 GR">VANCOMICINA CLORHIDRATO 1 GR</option>
                  </select>

 
            </div>
           </div>

          </form>
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="actualizarPaciente()">Editar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

          <input type="hidden" id="id_paciente_oculto_id_paciente">
          <input type="hidden" id="id_paciente_oculto_id_tratamiento">
          <input type="hidden" id="id_paciente_oculto_id_antibiotico">
        </div>
    </div>
  </div>
</div>
