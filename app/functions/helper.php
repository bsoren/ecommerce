<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 12-Mar-18
 * Time: 6:04 PM
 */

function view($path, array $data = []){

    $viewPaths = __DIR__.'/../../resources/view';
    $cachePath = __DIR__.'/../../bootstrap/cache';

    $blade = new \Philo\Blade\Blade($viewPaths, $cachePath);

    echo $blade->view()->make($path, $data)->render();

}

function make($filename, $data){


    extract($data);

    // turn on output buffering
    ob_start();

    // include template
    include(__DIR__.'/../../resources/view/emails/'.$filename.'.php');

    // get content from internal buffer
    $content = ob_get_contents();

    // erase the output and turn off output buffering
    ob_end_clean();

    return $content;

}


function slug($value) {
    // remove all characters not in this list: underscore | letters | numbers | whitespace
    $value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u', '', mb_strtolower($value));

    // regular-expression.info
    //replace underscore with a dash
    $value = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $value);

    return trim($value,'-');
}