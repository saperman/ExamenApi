<?php

namespace Fuel\Migrations;


class Enemigos
{

    function up()
    {
        \DBUtil::create_table('Enemigos', 
            array(
                'id' => array('type' => 'int', 'constraint' => 11,'auto_increment' => true),
                'nombre' => array('type' => 'varchar', 'constraint' => 100),
                'descripcion' => array('type'=> 'varchar', 'constraint' => 20),
                'id_nivel' => array('type' => 'int', 'constraint' => 11)
        ), array('id'), false, 'InnoDB', 'utf8_unicode_ci',
            array(
                array(
                    'constraint' => 'claveAjenaEnemigosANiveles',
                    'key' => 'id_nivel',
                    'reference' => array(
                        'table' => 'Niveles',
                        'column' => 'id',
                    ),
                'on_update' => 'CASCADE',
                'on_delete' => 'RESTRICT',
                ),
            )

        );    
    }

    function down()
    {
       \DBUtil::drop_table('Enemigos');
    }
}