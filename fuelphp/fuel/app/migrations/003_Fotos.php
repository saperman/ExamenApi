<?php

namespace Fuel\Migrations;


class Fotos
{

    function up()
    {
        \DBUtil::create_table('Fotos', 
            array(
                'id' => array('type' => 'int', 'constraint' => 11,'auto_increment' => true),
                'url' => array('type' => 'varchar', 'constraint' => 100),
                'id_nivel' => array('type' => 'int' , 'constraint' => 11),
       ), array('id'), false, 'InnoDB', 'utf8_unicode_ci',
            array(
        		array(
            		'constraint' => 'claveAjenaFotosANiveles',
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
       \DBUtil::drop_table('Fotos');
    }
}