<?php $this->load->view('_header_logado'); ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading"><?= $admArea; ?></h2>
            </div>
        </div>

        <div class="m-datatable">
            <?php if ($dados->totalRegistros >= 1): ?>
                <table id="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Preço (R$)</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados->records as $row): ?>
                            <tr data-id="<?= $row->id; ?>" class="<?= ($row->quantidade <= 3) ? 'table-warning' : '' ?>"  title="<?= ($row->quantidade <= 3) ? 'Baixo Estoque' : '' ?>">
                                <td >
                                    <?= $row->id; ?>
                                </td>
                                <td>
                                    <a title="Visualizar" href="#" class="link-info btnView" data-url="<?= site_url($area . '/visualizar/' . $row->id); ?>"><?= $row->nome; ?></a>
                                </td>
                                <td class="td_qtd">
                                    <?= $row->quantidade; ?>
                                </td>
                                <td>
                                    <?= number_format($row->preco / 100, 2, '.', '') ?>
                                </td>

                                <td class="text-center">
                                    <div class="btn-group text-center">
                                        <a title="Editar" href="#" class="btn btn-warning btn-sm btnEditar" data-url="<?= site_url($area . '/editar/' . $row->id); ?>"><span class="btn-icon ua-icon-pencil"></span></a>
                                        <a title="Aumentar Estoque" href="#" class="btn btn-primary btn-sm btnEstoqueUp" data-id="<?= $row->id; ?>" data-url="<?= site_url($area . '/estoqueUp/' . $row->id); ?>"><span class="btn-icon ua-icon-arrow-up"></a>
                                        <a title="Reduzir Estoque" href="#" class="btn btn-primary btn-sm btnEstoqueDown" data-id="<?= $row->id; ?>" data-url="<?= site_url($area . '/estoqueDown/' . $row->id); ?>"><span class="btn-icon ua-icon-arrow-down"></a>
                                        <a title="Excluir" href="#" class="btn btn-danger btn-sm btnExcluir" data-url="<?= site_url($area . '/excluir/' . $row->id); ?>"><span class="btn-icon ua-icon-trash"></span></a>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="row">
                    <div class="col-12 text-center]">
                        <b>Nenhum produto registrado!</b>
                        <br><br>
                        <a title="Criar" href="<?= site_url('produtos/criar'); ?>" class="btn btn-success">
                            <span class="btn-icon ua-icon-action-plus"></span>&nbsp;Criar Novo Produto
                        </a>
                    </div>

                </div>
            <?php endif; ?>
        </div>
        <div id="modalPlaceholder"></div>
    </div> <!-- /container -->
</div>
<script>
    var urlCriar = '<?= site_url($area . '/criar'); ?>';
</script>
<?php
$this->load->view('_footer_logado', [
    'jsfiles' => [
        'produtos/listagem.js',
        'produtos/datatables.js',
        '../vendor/datatables/datatables.min.js',
    ]
]);
?>