<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('seletorBuilder');
    }

    public function index() {
        $this->load->model('produto_model', 'produto');
        
        /* PRODUTOS COM 3 OU MENOS QUANTIDADE */
        $rsBaixoEstoque = $this->db->where('quantidade <=', 3)->order_by('nome')->get('produtos');
       
        /*cinco últimos produtos movimentados no estoque*/
        $rsMovimento = $this->db->where('dt_update !=', '0000-00-00 00:00:00')
        ->order_by('dt_update', 'DESC')
        ->limit(5)
        ->get('produtos');

        $outrasInfos = [
            'qtd_produtos'      => $this->db->get('produtos')->num_rows(),
        ];
        
        $assign = array(
            'movimento' => $rsMovimento,
            'baixoestoque' => $rsBaixoEstoque,
            'outrasInfos' => $outrasInfos
        );
        $this->load->view('dashboard', $assign);
    }
}
