<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 12-Mar-18
 * Time: 5:41 PM
 */

require_once  __DIR__.'/../bootstrap/init.php';

$app_name = getenv('APP_NAME');

echo $app_name;

// return true if mod_rewrite is on in httpd.conf file.
//var_dump(in_array('mod_rewrite', apache_get_modules()));

use Illuminate\Database\Capsule\Manager as Capsule;

$categories = Capsule::table('categories')->get();

var_dump($categories->toArray());