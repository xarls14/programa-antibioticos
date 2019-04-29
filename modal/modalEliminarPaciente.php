<body>
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar paciente</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <div class="modal-body">
                    <p>Usted esta intentando borrar el registro de este paciente. Éste proceso es irreversible.</p>
                    <p>¿Desea eliminar este registro?</p>
                    <p class="debug-url"></p>
                </div>
                    
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" onclick="eliminarPaciente(id)">Eliminar</button>
                    <button type="button" class="btn" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>

    <!--<script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>-->

</body>