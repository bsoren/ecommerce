<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 12-Mar-18
 * Time: 6:04 PM
 */

use voku\helper\Paginator;

use Illuminate\Database\Capsule\Manager as Capsule;


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


/**
 * Paginating through all rows
 * @param $num_of_pages
 * @param $total_records
 * @param $table_name
 * @param $object
 * @return array
 */
function paginate($num_of_pages, $total_records, $table_name, $object) {

    $pages = new Paginator($num_of_pages, "p");

    $pages->set_total($total_records);

    $data = Capsule::select("SELECT * FROM $table_name ORDER BY created_at DESC "
        . $pages->get_limit());


    $categories = $object->transform($data);

    return [$categories, $pages->page_links()];


}