<?php

namespace Fuel\Migrations;


class Comentarios
{

    function up()
    {
        \DBUtil::create_table('Comentarios', 
            array(
                'id' => array('type' => 'int', 'constraint' => 11,'auto_increment' => true),
                'descripcion' => array('type' => 'varchar', 'constraint' => 100),
                'id_usuario' => array('type'=> 'int', 'constraint' => 11),
                'id_comentarioRespondido' => array('type' => 'int', 'constraint' => 11),
        ), array('id'), false, 'InnoDB', 'utf8_unicode_ci',
            array(
        		array(
            		'constraint' => 'claveAjenaComentariosAUsuarios',
	            	'key' => 'id_usuario',
	            	'reference' => array(
	                	'table' => 'Usuarios',
	                	'column' => 'id',
	            	),
	            'on_update' => 'CASCADE',
	            'on_delete' => 'RESTRICT',
        		),
 			
        		array(
            		'constraint' => 'claveAjenaComentariosAComentariosRespondido',
	            	'key' => 'id_comentarioRespondido',
	            	'reference' => array(
	                	'table' => 'Comentarios',
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
       \DBUtil::drop_table('Comentarios');
    }
}