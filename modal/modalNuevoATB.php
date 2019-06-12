<style type="text/css">
  .error {
  color: red;
}
</style>
<div class="modal fade" id="myModalAgregarATB">
    <div class="modal-dialog modal-lg" style="width: 600px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ingresar ATB</h4>
          <button type="button" class="close" data-dismiss="modal" onclick="limpiarAgregarATB()">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="formCrearATB" method="post" role="form">

          <!-- Select de antibioticos -->
          <div>
            <div class="row">
              <div class="form-group col-sm-12">
                  <label>Antibiótico N°1</label>
                  <select class="form-control" type="select" id="antibiotico" name="antibiotico">
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

             <!--Dosis y medico tratante-->
             <div class="row">
              <div class="form-group col-sm-12">
                <label>Dosis</label>
                <input type="form-text" class="form-control" id="dosis" placeholder="Ingresa dosis" name="dosis">     
              </div> 
             </div>
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="validarFormAgregarATB()">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarAgregarATB()">Cancelar</button>
          <input type="hidden" id="id_paciente_oculto_id_paciente">
          <input type="hidden" id="id_paciente_oculto_id_tratamiento">
          </div>          
          </form>
        </div>
        
        
        
    </div>

  </div>

</div>
