<?php $this->load->view('_header_logado'); ?>

<div class="page-content">
    <div class="container-fluid container-fh">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading"><?= $admArea; ?></h2>
            </div>
        </div>
        <?php $this->load->view($area . '/form'); ?>
    </div> 
</div>

<?php 
$this->load->view('_footer_logado', [
    'jsfiles' => [
        'produtos/editar.js',
        'produtos/form.js'
    ]
]);
?>