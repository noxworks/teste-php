<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->prefix = '';
        $this->table = 'produtos';
        $this->idField = 'id_produto';
    }

    public function listagemPaginado($page, $limit = 20) {
        $binds = $this->vWhereFiltros()->binds;
        $vWhere = $this->vWhereFiltros()->where;

        $order = $this->input->post("order");
        if (empty($order)) {
            $order = 'nome, preco';
        }

        $offset = ($limit * ($page - 1));

        $query = "
            SELECT
                *,
                {$this->idField} as id
            from 
                {$this->prefix}{$this->table} as tb 
            WHERE $vWhere ";
        $retorno = new stdClass();
        $retorno->totalRegistros = $this->db->query("SELECT count(*) as numrows FROM ($query) a", $binds)->row()->numrows;
        $retorno->totalPaginas = ceil($retorno->totalRegistros / $limit);
        $retorno->paginaAtual = $page;
        $retorno->has_more = ($page < $retorno->totalPaginas) ? true : false;

        $query = $query . "ORDER BY $order  LIMIT  $limit OFFSET $offset";

        $data = $this->db->query($query, $binds);

        $retorno->records = $data->result();

        return $retorno;
    }

    private function vWhereFiltros() {
        $binds = array();
        $vWhere = '1=1';

        $id = $this->input->post('fld_id');
        $categoria = $this->input->post("fld_id_categoria");
        $ambiente = $this->input->post("fld_id_ambiente");
        $tipo = $this->input->post("fld_tipo");
        $termo = $this->input->post("fld_termo");

        if (!empty($id)) {
            $vWhere .= " AND tb.id_produto = ? ";
            $binds[] = $id;
        }

        if (!empty($ambiente)) {
            $vWhere .= " AND FIND_IN_SET({$ambiente}, tb.id_ambientes) ";
            //$binds[] = $id;
        }

        if (!empty($categoria)) {
            $vWhere .= " AND tb.id_categoria = ? ";
            $binds[] = $categoria;
        }
        if (!empty($tipo)) {
            $vWhere .= " AND tb.tipo = ? ";
            $binds[] = $tipo;
        }

        if (!empty($termo)) {
            $vWhere .= " AND (tb.nome LIKE '%{$termo}%' or tb.descricao LIKE '%{$termo}%') ";
            //$binds[] = $termo;
        }

        //**********************************************************************

        $retorno = new stdClass();
        $retorno->where = $vWhere;
        $retorno->binds = $binds;
        return $retorno;
    }

    function salvarAmbientes($idProduto, $ambientes) {
        $this->db->where('id_produto', $idProduto)->delete('tb_produtos_ambientes');
        addLog('DELETE', ["name" => 'tb_produtos_ambientes'], ['id_produto' => $idProduto]);
        sleep(1);
        $logIds = [];
        foreach ($ambientes as $id) {
            $dbData = array(
                'id_produto' => $idProduto,
                'id_ambiente' => $id
            );
            $this->db->insert('tb_produtos_ambientes', $dbData);
            $logIds[] = $dbData;
        }
        addLog('INSERT', ["name" => 'tb_produtos_ambientes'], $logIds);
    }

}
