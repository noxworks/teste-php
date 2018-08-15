<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_database extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_produto' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nome' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'descricao' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'quantidade' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'preco' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
            ),
            'dt_registro' => array(
                'type' => 'datetime' 
            ),
            'dt_update' => array(
                'type' => 'datetime' 
            )
        ));
        $this->dbforge->add_key('id_produto', TRUE);
        $this->dbforge->create_table('produtos');
    }

    public function down() {
        $this->dbforge->drop_table('produtos');
    }

}
