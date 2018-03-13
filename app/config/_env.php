<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 12-Mar-18
 * Time: 6:36 PM
 */

define('BASE_PATH', realpath(__DIR__.'/../../'));
require_once __DIR__.'/../../vendor/autoload.php';

$dotEnv = new \Dotenv\Dotenv(BASE_PATH);
$dotEnv->load();
