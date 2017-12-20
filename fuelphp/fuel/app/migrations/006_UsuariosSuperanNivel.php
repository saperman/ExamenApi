<?php

namespace Fuel\Migrations;


class UsuariosSuperanNivel
{

    function up()
    {
        \DBUtil::create_table('UsuariosSuperanNivel', 
            array(
                'id_usuario' => array('type' => 'int', 'constraint' => 11),
                'id_nivel' => array('type' => 'int', 'constraint' => 11),
       ), array('id_usuario' , 'id_nivel'), false, 'InnoDB', 'utf8_unicode_ci',
            array(
        		array(
            		'constraint' => 'claveAjenaUsuariosSuperanNivelAUsuarios',
	            	'key' => 'id_usuario',
	            	'reference' => array(
	                	'table' => 'Usuarios',
	                	'column' => 'id',
	            	),
	            'on_update' => 'CASCADE',
	            'on_delete' => 'RESTRICT',
        		),
 			
        		array(
            		'constraint' => 'claveAjenaUsuariosSuperanNivelANiveles',
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
       \DBUtil::drop_table('UsuariosSuperanNivel');
    }
}