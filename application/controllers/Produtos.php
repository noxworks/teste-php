<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->area = 'produtos';
        $this->table = 'produtos';
        $this->idField = 'id_produto';

        $this->load->model('produto_model', $this->area);
    }

    public function index() {
        $page = $this->input->post('page');
        if (empty($page)) {
            $page = 1;
        }
        $dados = $this->{$this->area}->listagemPaginado($page, 9999);

        $assign = array(
            'area' => $this->area,
            'admArea' => ucfirst($this->area),
            'dados' => $dados,
            'pagina' => $page
        );

        $this->load->view($this->area . '/listagem', $assign);
    }

    public function criar() {
        $dados = new stdClass();
        $fields = $this->db->list_fields($this->table);
        foreach ($fields as $field) {
            $dados->{$field} = set_value($field);
        }
        $dados->id = $dados->{$this->idField};
        $dados->id_ambientes = '';
        $assign = array(
            'area' => $this->area,
            'acao' => 'criar',
            'dados' => $dados,
            'admArea' => 'Criar Produtos'
        );
        $this->load->view($this->area . '/criar', $assign);
    }

    public function editar($id) {
        $dados = $this->db->where($this->idField, $id)->get('produtos')->row();
        $assign = array(
            'area' => $this->area,
            'acao' => 'editar',
            'dados' => $dados,
            'admArea' => 'Editar Produtos/Serviços'
        );
        $this->load->view($this->area . '/editar', $assign);
    }

    public function excluir($id) {
        $dados = $this->db->select($this->idField . ' as id, ' . $this->table . '.* ')->where($this->idField, $id)->get($this->table)->row();

        $assign = array(
            'area' => $this->area,
            'acao' => 'excluir',
            'dados' => $dados
        );
        $this->load->view($this->area . '/excluir', $assign);
    }

    public function doExcluir() {
        $retorno = array(
            'sucesso' => false,
            'msg' => 'Erro ao tentar excluir'
        );

        $id = $this->input->post('id');
        if (!empty($id)) {
            $del = $this->db->where($this->idField, $id)->delete($this->table);
            if ($del) {
                $infoPD = $this->db->where($this->idField, $id)->get($this->table)->row();
                $retorno = array(
                    'sucesso' => true
                );
            } else {
                $err = $this->db->error();
                $retorno['msg'] = "<b>Um erro de base de dados ocorreu!</b><Br><small>{$err['message']}</small>";
            }
        }
        echo json_encode($retorno);
    }

    public function visualizar($id) {
        $dados = $this->db->where($this->idField, $id)->get($this->table)->row();

        $assign = array(
            'area' => $this->area,
            'acao' => 'visualizar',
            'dados' => $dados
        );
        $this->load->view($this->area . '/view', $assign);
    }

    public function validaSalvar() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fld_nome', 'Nome do Produto', 'required');
        $this->form_validation->set_rules('fld_descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('fld_quantidade', 'Quantidade', 'required');
        $this->form_validation->set_rules('fld_preco', 'Preço', 'required');

        $this->form_validation->set_error_delimiters('<p> • ', '</p>');
        if ($this->form_validation->run() !== FALSE) {
            echo '1';
        } else {
            $this->load->view('shared/form_validate_error', array('erromsg' => $this->form_validation->error_string()));
        }
    }

    public function salvar() {
        $this->load->helper('security');
        $fields = $this->db->list_fields($this->table);
        $posts = $this->input->post();
        foreach ($fields as $field) {
            if (isset($posts['fld_' . $field])) {
                $dbData[$field] = $this->esterilizar($field, $posts['fld_' . $field]);
            }
        }

        if ($posts['acao'] == 'criar') {
            $dbData['dt_registro'] = date('Y-m-d H:i:s');
            $this->db->insert($this->table, $dbData);
            $id = $this->db->insert_id();
            
        } else if ($posts['acao'] == 'editar') {
            $id = $posts['fld_id'];
            $dbData['dt_update'] = date('Y-m-d H:i:s');
            $this->db->where($this->idField, $id)->update($this->table, $dbData);
        }
        redirect($this->area);
    }


    public function ajaxSearch() {
        $this->load->helper('produtos');
        $dados = $this->{$this->area}->listagemPaginado(1, 5);
        $retorno = array(
            'sucesso' => false,
            'dados' => array()
        );
        if ($dados->totalRegistros >= 1) {
            $retorno['sucesso'] = true;
            foreach ($dados->records as $row) {
                $row->map_categoria = mapCategoria($row->id_categoria);
                $retorno['dados'][] = $row;
            }
        }
        echo json_encode($retorno);
    }

    
    private function esterilizar($field, $valor) {
        switch ($field) {
            case 'preco':
                $valor = str_replace(array(',', '.'), '', $valor);
                break;
            default:
                $valor = mb_strtoupper($valor, 'UTF-8');
        }
        return xss_clean($valor);
    }
    
    public function estoqueUp() {
        $retorno = array(
            'sucesso' => false,
            'msg' => 'Erro ao tentar alterar'
        );

        $id = $this->input->post('id');
        if (!empty($id)) {
            $qtd = $this->db->where($this->idField, $id)->select('quantidade')->get($this->table)->row()->quantidade;
            $newQtd = $qtd+1;
            $alt = $this->db->where($this->idField, $id)->update($this->table, ['quantidade' => $newQtd, 'dt_update' => date('Y-m-d H:i:s')]);
            if ($alt) {
                $retorno = array(
                    'sucesso' => true,
                    'qtd' => $newQtd
                );
            } else {
                $err = $this->db->error();
                $retorno['msg'] = "<b>Um erro de base de dados ocorreu!</b><Br><small>{$err['message']}</small>";
            }
        }
        echo json_encode($retorno);
    }
    
    public function estoqueDown() {
        $retorno = array(
            'sucesso' => false,
            'msg' => 'Erro ao tentar alterar'
        );

        $id = $this->input->post('id');
        if (!empty($id)) {
            $qtd = $this->db->where($this->idField, $id)->select('quantidade')->get($this->table)->row()->quantidade;
            $newQtd = ($qtd-1 < 0)?0:$qtd-1;
            
            $alt = $this->db->where($this->idField, $id)->update($this->table, ['quantidade' => $newQtd, 'dt_update' => date('Y-m-d H:i:s')]);
            if ($alt) {
                $retorno = array(
                    'sucesso' => true,
                    'qtd' => $newQtd
                );
            } else {
                $err = $this->db->error();
                $retorno['msg'] = "<b>Um erro de base de dados ocorreu!</b><Br><small>{$err['message']}</small>";
            }
        }
        echo json_encode($retorno);
    }

}
