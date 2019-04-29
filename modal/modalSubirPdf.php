<style type="text/css">
  .error {
  color: red;
}
</style>
<div class="modal fade" id="myModalSubirPdf">
    <div class="modal-dialog modal-lg" style="width: 600px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Subir PDF tratamiento</h4>
          <button type="button" class="close" data-dismiss="modal" onclick="limpiarSubirPdf()">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="formSubirPdf" name="formSubirPdf" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

          <!-- Select de antibioticos -->
          <div>
            <div class="row" style="margin-left: 0px; margin-right: 0px; margin-bottom: 20px;">
              <div class="custom-file">

                <input type="file" class="custom-file-input" name="fichero" id="fichero" maxlength="200">
                <label class="custom-file-label" for="customFile">Buscar archivo</label>
              </div>
            </div>


            <div class="row"><!--div descripcion-->
              <div class="form-group col-sm-12">
                  <label>Descripción PDF</label>
                  <input type="form-text" class="form-control" maxlength="50" id="descripcion_pdf" name="descripcion_pdf" placeholder="Ingresa descripción" onkeypress="return soloLetras(event)">
                  <input type="hidden" id="id_paciente_oculto_id_paciente" name="id_paciente_oculto_id_paciente">
                  <input type="hidden" id="id_paciente_oculto_id_tratamiento" name="id_paciente_oculto_id_tratamiento">

              </div>
            </div><!--termina div descripcion-->
          </div>

          <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="validarFormPdf()">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarSubirPdf()">Cancelar</button>
          
          </div>          
          </form>
        </div>
        
        
        
    </div>

  </div>

</div>


