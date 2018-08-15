<div class="modal fade" tabindex="-1" role="dialog" id="fixedModal">
  <div class="modal-dialog">
    <div class="modal-content" style="min-width: 700px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmação de exclusão - ID #<?=$dados->id;?></h4>
      </div>
      <div class="modal-body">
          <b>Produto:</b> <?=$dados->nome;?><br>
          <b>Descrição:</b> <?= $dados->descricao;?><br>
          <b>Quantidade:</b> <?= $dados->quantidade;?><br>
          <b>Preço:</b> R$ <?= number_format($dados->preco / 100, 2, ',', '.') ?><br>
          <br/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnExcluir">Confirmar exclusão</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(document).ready(function(){
        $('#fixedModal').modal();
        $("#btnExcluir").on('click', function(){
            $.post('<?=site_url($area.'/doExcluir');?>',{id: <?=$dados->id;?>}, function(r){
                if(r.sucesso){
                    $(".modal-body").html('<div class="alert alert-success" role="alert">Registro excluído com sucesso!</div>');
                    $(".modal-footer").html('<button type="button" class="btn btn-default" onclick="javascript:retornar();">Fechar</button>');
                    $('#fixedModal').on('hidden.bs.modal', function(){
                        $("#modalPlaceholder").html('');
                        retornar();
                    });
                }else{
                    alert(r.msg);
                }
            },'json'); 
        });
    });
    function retornar(){
        document.location.href='<?=site_url('produtos');?>';
    }
</script>
    