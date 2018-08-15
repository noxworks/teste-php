<div class="modal fade" tabindex="-1" role="dialog" id="fixedModal">
  <div class="modal-dialog">
    <div class="modal-content" style="min-width: 700px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Produto ID #<?=$dados->id_produto;?></h4>
      </div>
      <div class="modal-body">
          <b>Produto:</b> <?=$dados->nome;?><br>
          <b>Descrição:</b> <?= $dados->descricao;?><br>
          <b>Quantidade:</b> <?= $dados->quantidade;?><br>
          <b>Preço:</b> R$ <?= number_format($dados->preco / 100, 2, ',', '.') ?><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="btnFechar">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(document).ready(function(){
        $('#fixedModal').modal().on('hidden.bs.modal', function(){
            $("#modalPlaceholder").html('');
        });
    });
</script>
    