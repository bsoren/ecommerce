<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 13-Mar-18
 * Time: 8:58 AM
 */

namespace App\Controllers;


class IndexController extends BaseController
{

    public  function show() {
        echo "<h1> Inside Homepage from IndexController class </h1>";
    }
}