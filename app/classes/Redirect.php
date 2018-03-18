<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 17-Mar-18
 * Time: 8:12 AM
 */

namespace App\classes;


class Redirect
{

    public static function to($page) {

        header("location: $page");
    }


    public static function back() {

        $uri = $_SERVER['REQUEST_URI'];
        header("location: $uri");
    }
}