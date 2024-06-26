<?php
use Orm\Model;

class Model_Libro extends Model
{
    protected static $_properties = array(
        'id',
        'titulo',
        'resumen',
        'creador',
        'created_at',
        'updated_at',
    );

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => false,
        ),
    );

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        
        $val->add_field('titulo', 'Titulo', 'required|max_length[255]');
        $val->add_field('resumen', 'Resumen', 'required');
        $val->add_field('creador', 'Creador', 'required|max_length[255]');

        return $val;
    }
}
