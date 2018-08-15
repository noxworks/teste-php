<div class="modal fade" tabindex="-1" role="dialog" id="fixedModal">
    <div class="modal-dialog">
        <div class="modal-content" style="min-width: 700px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Contrato # <b><?= $dados->num_contrato; ?></b> - Status: <b><?= $dados->status; ?></b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        Cliente: <b><?= $dados->cliente; ?></b>
                    </div>
                    <div class="col-md-6">
                        Consultor: <b><?= $dados->consultor; ?></b>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        Início da Obra: <b><?= date("d/m/Y", strtotime($dados->dt_inicio_obra)); ?></b><br>
                        Metragem da Obra: <b><?= $dados->metragem_obra; ?> m2</b><br>
                    </div>
                    <div class="col-md-6">
                        Término da Obra: <b><?= date("d/m/Y", strtotime($dados->dt_termino_obra)); ?></b><br>
                        Quant. Produtos/Serviços: <b><?= $dados->qtd_prodserv; ?></b><br>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>Taxa</th>
                                    <th>%</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Administração</td>
                                    <td style="text-align: center"><?= $dados->taxa_administracao; ?></td>
                                </tr>
                                <tr>
                                    <td>Consultor</td>
                                    <td style="text-align: center"><?= $dados->taxa_consultor; ?></td>
                                </tr>
                                <tr>
                                    <td>Indicação</td>
                                    <td style="text-align: center"><?= $dados->taxa_indicacao; ?></td>
                                </tr>
                                <tr>
                                    <td>Parcelamento Cartão</td>
                                    <td style="text-align: center"><?= $dados->taxa_parcelamento_cartao; ?></td>
                                </tr>
                                <tr>
                                    <td>Margem de Risco</td>
                                    <td style="text-align: center"><?= $dados->margem_risco; ?></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    <div class="col-md-12">
                        Valor total do Orçamento: <b>R$ <?= number_format($dados->valor_total,2,',','.'); ?></b>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Fechar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(document).ready(function () {
        $('#fixedModal').modal();
    });
</script>