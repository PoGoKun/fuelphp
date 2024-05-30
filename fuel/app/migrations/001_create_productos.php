<?php

namespace Fuel\Migrations;

class Create_productos
{
	public function up()
	{
		\DBUtil::create_table('productos', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'nombre' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
			'descripcion' => array('null' => false, 'type' => 'text'),
			'precio' => array('constraint' => '10,2', 'null' => false, 'type' => 'decimal'),
			'created_at' => array('constraint' => 11, 'null' => true, 'type' => 'int', 'unsigned' => true),
			'updated_at' => array('constraint' => 11, 'null' => true, 'type' => 'int', 'unsigned' => true),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('productos');
	}
}