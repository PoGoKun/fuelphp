<?php

namespace Fuel\Migrations;

class Create_libros
{
    public function up()
    {
        \DBUtil::create_table('libros', array(
            'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
            'titulo' => array('type' => 'varchar', 'constraint' => 255, 'null' => false),
            'resumen' => array('type' => 'text', 'null' => false),
            'creador' => array('type' => 'varchar', 'constraint' => 255, 'null' => false),
            'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
            'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
        ), array('id'));
    }

    public function down()
    {
        \DBUtil::drop_table('libros');
    }
}
