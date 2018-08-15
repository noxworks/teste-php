<div class="modal fade" tabindex="-1" role="dialog" id="fixedModal">
    <div class="modal-dialog">
        <div class="modal-content" style="min-width: 700px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Verifique os erros abaixo:</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 alert alert-danger">
                        <?=$erromsg;?>
                    </div>
                </div>
            </div>
            <div id="msg" style="padding: 10px;"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="btnFechar">Fechar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(document).ready(function () {
        $('#fixedModal').modal().on('hidden.bs.modal', function () {
            $("#modalPlaceholder").html('');
        });
    });
</script>
