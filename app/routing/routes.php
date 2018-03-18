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

// for admin routes
$router->map('GET','/admin',
    'App\Controllers\admin\DashboardController@show','admin_dashboard');

$router->map('POST','/admin',
    'App\Controllers\admin\DashboardController@postRequest','admin_dashboard_post');


$router->map('GET','/admin/product/categories',
    'App\Controllers\admin\ProductCategoryController@show','product_category');

$router->map('POST','/admin/product/categories',
    'App\Controllers\admin\ProductCategoryController@store','create_product_category');




/**
 * Use this when VirtualHost myacmestore.localhost is not working.
 */

/*
$router->map('GET','/ecommerce/public/','App\Controllers\IndexController@show','home');

// for admin routes
$router->map('GET','/ecommerce/public/admin',
    'App\Controllers\admin\DashboardController@show','admin_dashboard');

*/


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

