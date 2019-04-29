<style type="text/css">
  .error {
  color: red;
}
</style>
<div class="modal fade" id="myModalVerFechaTratamiento">
    <div class="modal-dialog modal-lg" style="width: 600px;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Días de tratamiento</h4>
          <button type="button" class="close" data-dismiss="modal" onclick="limpiarNuevaDosisVerDiasTratamiento()">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="formDateMultiPicker">
            <input class="form-control" type="text" name="daterange" id="daterange"/>
          </form>
        <!--<input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />-->
        

        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarNuevaDosisVerDiasTratamiento()">Cancelar</button>
        </div>
        
        
    </div>
  </div>
</div>
