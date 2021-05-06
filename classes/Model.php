<?php
use \Illuminate\Database\Capsule\Manager as DB;

    $db = new DB;
    $db->addConnection(
        [
            'driver' => 'mysql',
            'host' => 'db',
            'database' => 'maturitni_prace',
            'username' => 'root',
            'password' => 'password',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci'
        ]
    );

    $db->setAsGlobal();
    $db->bootEloquent();


    class Model
    {
        public static function getAll(int $id_tasklist = 1)
        {
            if ($id_tasklist != 1) {
                $where = 'WHERE id_tasklist = ' . $id_tasklist;
            }
        }
    }
