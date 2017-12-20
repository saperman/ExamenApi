<?php

namespace Fuel\Migrations;


class Niveles
{

    function up()
    {
        \DBUtil::create_table('Niveles', 
            array(
                'id' => array('type' => 'int', 'constraint' => 11,'auto_increment' => true),
                'titulo' => array('type' => 'varchar', 'constraint' => 100),
        ), array('id'));    
    }

    function down()
    {
       \DBUtil::drop_table('Niveles');
    }
}