<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SeletorBuilder {

    protected $CI;

    public function __construct() {
        $this->CI = & get_instance();
    }
    
    private function _setDefaults($fieldname, $config) {
        $dc = array(
            'firstrow' => '-selecione-',
            'fieldname' => "{$fieldname}", //Os colchetes [] sao add pelo JS;
            'selected' => set_value($fieldname),
            'class' => 'form-control',
            'id'    => "{$fieldname}",
            'extra' => "",
            'required' => false,
            'multiple' => false,
            'style'     => '',
            'size'     => '',//lg or sm
            'filtro' => ''
        );
        
        if (!empty($config)) {
            foreach ($config as $key => $val) {
                $dc[$key] = $val;
            }
        }
        if ($dc['required']) {$dc['extra'] .= ' required';}
        if ($dc['multiple']) {$dc['extra'] .= ' multiple="multiple"';}
        if ($dc['class']) {$dc['extra'] .= ' class="'.$dc['class'].'"';}
        if ($dc['id']) {$dc['extra'] .= ' id="'.$dc['id'].'"';}
        if (! empty($dc['size'])){$dc['extra'] = str_replace('form-control', 'form-control input-'.$dc['size'], $dc['extra']);}
        return $dc;
    }
    
    public function bancos($config = array()) {
        $dc = $this->_setDefaults('fld_banco', $config); //Default Config values....
        $data = array('' => $dc['firstrow']);
        $rs = $this->CI->db->order_by('principal DESC, banco')->get('tb_bancos')->result();
        foreach ($rs as $row) {
            $banco = $row->codigo . ' - ' . $row->banco;
            $data[$banco] = $banco;
        }
        $html = form_dropdown($dc['fieldname'], $data, $dc['selected'], $dc['extra']);
        return $html;
    }
    
    public function clientes($config = array()) {
        $dc = $this->_setDefaults('fld_id_cliente', $config); //Default Config values....
        $data = array('' => $dc['firstrow']);
        $rs = $this->CI->db->order_by('nome')->get('tb_clientes')->result();
        foreach ($rs as $row) {
            $data[$row->id_cliente] = $row->nome;
        }
        $html = form_dropdown($dc['fieldname'], $data, $dc['selected'], $dc['extra']);
        return $html;
    }
    
    public function clientesFechados($config = array()) {
        $dc = $this->_setDefaults('id_cliente', $config); //Default Config values....
        $data = array('' => ':: Selecione o Cliente ::');
        $rs = $this->CI->db
                ->where('status', 'FECHADO')
                ->where('excluido', 0)
                ->from('tb_clientes')
                ->join('tb_orcamentos', 'tb_clientes.id_cliente = tb_orcamentos.id_cliente')
                ->order_by('tb_orcamentos.dt_registro desc')
                ->get()->result();
        foreach ($rs as $row) {
            $data["{$row->id_cliente}#$row->num_contrato"] = "Cliente: {$row->nome} - Contrato: {$row->num_contrato}";
        }
        $html = form_dropdown($dc['fieldname'], $data, $dc['selected'], $dc['extra']);
        return $html;
    }
    
    public function categorias($config = array()) {
        function filhos($row, $qtdFilhos, &$data, $son = '') {
            $data[$row->id_categoria] = $row->nome;
            if ($qtdFilhos >= 1) {
                foreach ($row->filhos->records as $rowFilho) {
                    if($rowFilho->id_categoria == $son){continue;}
                    $rowFilho->nome = $row->nome . ' / ' . $rowFilho->nome;
                    filhos($rowFilho, $rowFilho->qtd_filhos, $data);
                }
            }
            return $data;
        }
        $dc = $this->_setDefaults('fld_id_categoria', $config); //Default Config values....
        $data = array('' => $dc['firstrow']);
        $this->CI->load->model('categoria_model', 'categoria');
        $rs = $this->CI->categoria->listagemHierarquica();
        foreach ($rs->records as $row) {
            if($row->id_categoria == @$config['son']){continue;}
            filhos($row, $row->qtd_filhos, $data, @$config['son']);
            //$data[$row->id_categoria] = $row->nome;
        }
        if(! empty($dc['style'])){$dc['extra'] .= " style='{$dc['style']}'";}
        $html = form_dropdown($dc['fieldname'], $data, $dc['selected'], $dc['extra']);
        return $html;
    }
    
    public function marcas($config = array()) {
        $dc = $this->_setDefaults('fld_id_marca', $config); //Default Config values....
        $data = array('' => $dc['firstrow']);
        $rs = $this->CI->db->order_by('nome')->get('tb_marcas')->result();
        foreach ($rs as $row) {
            $data[$row->id_marca] = $row->nome;
        }
        if(! empty($dc['style'])){$dc['extra'] .= " style='{$dc['style']}'";}
        $html = form_dropdown($dc['fieldname'], $data, $dc['selected'], $dc['extra']);
        return $html;
    }
    
    public function medidas($config = array()) {
        $dc = $this->_setDefaults('fld_medida', $config); //Default Config values....
        $data = array(
            'unidade'   => 'Unidade',
            'm2'        => 'M&sup2;',
            'ML'        => 'Metro Linear'
        );
        if(! empty($dc['style'])){$dc['extra'] .= " style='{$dc['style']}'";}
        $html = form_dropdown($dc['fieldname'], $data, $dc['selected'], $dc['extra']);
        return $html;
    }
    
    public function ambientes($config = array()) {
        $dc = $this->_setDefaults('fld_id_ambiente', $config); //Default Config values....
        if($dc['multiple']){
            $data = array();
        }else{
            $data = array('' => $dc['firstrow']);
        }
        
        $rs = $this->CI->db->order_by('nome')->get('tb_ambientes')->result();
        foreach ($rs as $row) {
            $data[$row->id_ambiente] = $row->nome;
        }
        if(! empty($dc['style'])){$dc['extra'] .= " style='{$dc['style']}'";}
        $html = form_dropdown($dc['fieldname'], $data, $dc['selected'], $dc['extra']);
        if(isset($dc['multiple'])){
            $html .= $this->_msScript($dc);
        }
        return $html;
    }
    
    public function profissionais($config = array()) {
        $dc = $this->_setDefaults('fld_id_profissional', $config); //Default Config values....
        if($dc['multiple']){
            $data = array();
        }else{
            $data = array('' => $dc['firstrow']);
        }
        
        if(! empty($dc['filtro'])){
            $key = key($dc['filtro']);
            $this->CI->db->where($key, $dc['filtro'][$key]);
        }
        $rs = $this->CI->db->order_by('nome')->get('tb_profissionais')->result();
        foreach ($rs as $row) {
            $data[$row->id_profissional] = $row->nome . ' (' . mb_strtolower($row->funcao) . ')';
        }
        if(! empty($dc['style'])){$dc['extra'] .= " style='{$dc['style']}'";}
        $html = form_dropdown($dc['fieldname'], $data, $dc['selected'], $dc['extra']);
        if(isset($dc['multiple'])){
            $html .= $this->_msScript($dc);
        }
        return $html;
    }
    
     public function tipos($config = array()) {
        $dc = $this->_setDefaults('fld_tipo', $config); //Default Config values....
        if($dc['multiple']){
            $data = array();
        }else{
            $data = array('' => $dc['firstrow']);
        }
        $data['P'] = 'Produto';
        $data['S'] = 'Serviço';
        $data['M'] = 'Material';
        if(! empty($dc['style'])){$dc['extra'] .= " style='{$dc['style']}'";}
        $html = form_dropdown($dc['fieldname'], $data, $dc['selected'], $dc['extra']);
        if(isset($dc['multiple'])){
            $html .= $this->_msScript($dc);
        }
        return $html;
    }
    
    public function status_proposta($config = array()){
        $dc = $this->_setDefaults('fld_status', $config); //Default Config values....
        if($dc['multiple']){
            $data = array();
        }else{
            $data = array('' => $dc['firstrow']);
        }
        $data['ABERTO'] = 'ABERTO';
        $data['FECHADO'] = 'FECHADO';
        $data['REJEITADO'] = 'REJEITADO';
        if(! empty($dc['style'])){$dc['extra'] .= " style='{$dc['style']}'";}
        $html = form_dropdown($dc['fieldname'], $data, $dc['selected'], $dc['extra']);
        if(isset($dc['multiple'])){
            $html .= $this->_msScript($dc);
        }
        return $html;
    }

    /**
     * Plugin utilizado: Bootstrap Multiselect
     * (http://davidstutz.github.io/bootstrap-multiselect/)
     * 
     * @param array $dc
     * @return string
     */
    private function _msScript($dc) {
        return false;
        $html = '';
        if ($dc['multiple']) {
            $html .= '<script>'
                    . '$(function(){'
                    . 'var msoptions = {includeSelectAllOption: true,'
                    . 'enableFiltering: true,'
                    . 'enableFullValueFiltering: true,'
                    . 'filterPlaceholder: \'Procurar\','
                    . 'buttonText: function(options, select) {if (options.length === 0) {
                    return \'Selecione\';
                }
                else if (options.length > 3) {
                    return \'Mais que 3 opções selecionadas!\';
                }else {
                     var labels = [];
                     options.each(function() {
                         if ($(this).attr(\'label\') !== undefined) {
                            labels.push($(this).attr(\'label\'));
                         }
                         else {
                            labels.push($(this).html());
                         }
                     });
                     return labels.join(\', \') + \'\';
                 }},'
                    . 'selectAllText: \'Todos\'};'
                    . ' if($("select[name=' . $dc['fieldname'] . ']").prop("multiple")){'
                    . ' $("select[name=' . $dc['fieldname'] . ']").multiselect(msoptions);'
                    . ' $("select[name=' . $dc['fieldname'] . ']").attr("name", "' . $dc['fieldname'] . '[]");'
                    . ' }'
                    . '});'
                    . '$(document).ready(function(){$("button.multiselect").css("width","100%").parent().css("width","100%");});'
                    . '</script>';
        }
        return $html;
    }

}
