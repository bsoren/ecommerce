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