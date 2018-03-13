<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 13-Mar-18
 * Time: 10:45 AM
 */

namespace App\classes;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database{

    public function __construct(){
        $db = new Capsule;
        $db->addConnection([
            "driver" => getenv('DB_DRIVER'),
            "host" => getenv('DB_HOST'),
            "database" => getenv('DB_NAME'),
            "username" => getenv('DB_USERNAME'),
            "password" => getenv('DB_PASSWORD'),
            "charset" => "utf8",
            "collation" => "utf8_unicode_ci",
            "prefix" => ""
        ]);

        $db->setAsGlobal();
        $db->bootEloquent();
    }
}

/*
 * #database
DB_DRIVER='mysql'
DB_HOST=localhost
DB_NAME=store
DB_USERNAME=store
DB_PASSWORD=secret
 */