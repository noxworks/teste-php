<div class="main-container container-fh__content">
    <form role="form" method="post" name="form1" action="<?= site_url($area . '/salvar'); ?>" enctype="multipart/form-data" onSubmit="return validaForm('<?= site_url($area . '/validaSalvar'); ?>', this);">
        <input type="hidden" name="acao" value="<?= $acao; ?>" />
        <input type="hidden" name="fld_id" value="<?= $dados->id_produto; ?>" />
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="fld_descricao">Nome</label>
                    <input type="text" class="form-control" name="fld_nome" id="fld_nome" placeholder="Nome do Produto" maxlength="200" value="<?= $dados->nome; ?>" required>
                </div>
                <div class="form-group">
                    <label for="fld_descricao">Descrição</label>
                    <textarea class="form-control" name="fld_descricao" id="fld_descricao" placeholder="Descrição do Produto"><?= $dados->descricao; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="fld_descricao">Quantidade</label>
                    <input type="number" class="form-control" name="fld_quantidade" id="fld_quantidade" min="1" value="<?= ($dados->quantidade)?$dados->quantidade:1; ?>" required>
                </div>

                <div class="form-group">
                    <label for="fld_valor_unitario">Valor Unitário</label>
                    <div class="input-group">
                        <span class="input-group-addon">R$</span>
                        <input type="text" class="form-control" name="fld_preco" id="fld_preco" placeholder="0,00"  value="<?= $dados->preco/100; ?>" required>
                    </div>
                </div>


            </div>

        </div>
        <hr />
        <div class="form-group" data-btns>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success">
                        <?php if ($acao === 'criar'): ?>
                            <span class="btn-icon ua-icon-action-plus"></span>&nbsp;Criar Novo Registro
                        <?php else: ?>
                            <span class="btn-icon ua-icon-fm-check"></span>&nbsp;Salvar
                        <?php endif; ?>
                    </button>
                    <button type="button" class="btn btn-default" onClick="javascript:document.location.href = '<?= site_url($area); ?>';">
                        <span class="btn-icon ua-icon-back-alt"></span>&nbsp;Cancelar e voltar para a listagem
                    </button>
                </div>
                <?php if ($acao === 'editar'): ?>
                    <div class="col text-right">
                        <button type="button" class="btn btn-danger btnExcluir" data-url="<?= site_url($area . '/excluir/' . $dados->id_produto); ?>">
                            <span class="btn-icon ua-icon-trash"></span>&nbsp;Excluir registro
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </form><!-- /form -->
</div>
<div id="modalPlaceholder"></div>

<script type="text/javascript">
    var acao = '<?= $acao; ?>';
    var urlMmOpenner = '<?= base_url('mediamanager/opener'); ?>/';
    var urlCategorias = '<?= site_url('categorias'); ?>';
    var urlProfissionais = '<?= site_url('profissionais'); ?>';
    var urlAmbientes = '<?= site_url('ambientes'); ?>';
    var urlMarcas = '<?= site_url('marcas'); ?>';
    var urlSemImagem = '<?= base_url('resources / images / semimagem.png'); ?>';
    var urlProdImagens = '<?= base_url('prod_imagens'); ?>/';
</script>