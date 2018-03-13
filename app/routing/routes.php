<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 13-Mar-18
 * Time: 8:37 AM
 */

// create an instance of AltoRouter

$router = new AltoRouter;

$router->map('GET','/','App\Controllers\IndexController@show','home');


/*
$match = $router->match();

var_dump($match);

if ($match) {
    echo " about us page"."<br>";
    list($controller, $method) = explode("@", $match['target']);
    call_user_func_array(array(new $controller, $method), array($match['params']));
} else {
    header($_SERVER['SERVER_PROTOCOL'].' 404 page not found');
    echo " page not found"."<br>";
}

*/

