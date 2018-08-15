<?php $this->load->view('_header_logado'); ?>
<div class="page-content">
    <div class="container-fluid">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Dashboard</h2>
                <div class="page-content__header-description">Bem-vindo a Nox Works System</div>
            </div>
            <!--
            <div class="page-content__header-meta">
                <a href="#" class="btn btn-info icon-left">
                    Add Widget <span class="btn-icon mdi mdi-plus-circle"></span>
                </a>
            </div>
            -->
        </div>
        

        <div class="row">
            <?php if($baixoestoque->num_rows() >= 1):?>
            <div class="col-xl-5 col-lg-12">
                <div class="widget widget-table widget-controls widget-payouts widget-controls--dark">
                    <div class="widget-controls__header">
                        <div>
                            <span class="widget-controls__header-icon ua-icon-arrow-down"></span> Produtos Baixo Estoque
                        </div>
                    </div>
                    <div class="widget-controls__content js-scrollable" style="height: auto; max-height: 400px">
                        <table class="table table-no-border table-striped">
                            <tbody>
                                <?php foreach($baixoestoque->result() as $row):?>
                                <tr>
                                    <td class=""><?=$row->nome;?></td>
                                    <td class="font-semibold">Qtd.: <?=$row->quantidade;?></td>
                                    <td><span class="">R$ <?= number_format($row->preco / 100, 2, ',', '.') ?></span></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php endif?>
             <?php if($movimento->num_rows() >= 1):?>
            <div class="col-xl-5 col-lg-12">
                <div class="widget widget-table widget-controls widget-payouts widget-controls--dark">
                    <div class="widget-controls__header">
                        <div>
                            <span class="widget-controls__header-icon ua-icon-arrow-down"></span> Top 5 últimos movimentos
                        </div>
                    </div>
                    <div class="widget-controls__content js-scrollable" style="height: auto; max-height: 400px">
                        <table class="table table-no-border table-striped">
                            <tbody>
                                <?php foreach($movimento->result() as $row):?>
                                <tr>
                                    <td class="font-semibold"><?=$row->nome;?></td>
                                    <td><span class="">Qtd.: <?=$row->quantidade;?></span></td>
                                    <td><span class="">
                                    <?=($row->dt_update == '0000-00-00 00:00:00')?date("d/m/Y H:i", strtotime($row->dt_registro)):date("d/m/Y H:i", strtotime($row->dt_update)); ?>
                                        </span></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php endif?>
        </div>
        <div class="row">

            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="widget widget-alpha widget-alpha--color-java widget-alpha--help">
                    <div>
                        <div class="widget-alpha__amount"><?= $outrasInfos['qtd_produtos']; ?></div>
                        <div class="widget-alpha__description">Produtos Registrados</div>
                    </div>
                    <span class="widget-alpha__icon ua-icon-table-list"></span>
                </div>
            </div>

        </div>


    </div>
</div> 


<?php
$this->load->view('_footer_logado', [
    'jsfiles' => [
        'dashboard.js'
    ]
]);
?>