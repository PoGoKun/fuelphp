<?php

namespace Fuel\Migrations;

class Create_clientes_table
{
	public function up()
{
    \DBUtil::create_table('clientes', array(
        'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
        'nombre' => array('constraint' => 100, 'type' => 'varchar'),
        'apellido' => array('constraint' => 100, 'type' => 'varchar'),
        'email' => array('constraint' => 100, 'type' => 'varchar'),
        'direccion' => array('type' => 'text', 'null' => true),
        'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
        'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
    ), array('id'));
}

	public function down()
	{
		\DBUtil::drop_table('clientes_table');
	}
}