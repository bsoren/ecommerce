<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 15-Mar-18
 * Time: 6:04 PM
 */

namespace App\Controllers\admin;


use App\classes\Request;
use App\classes\Session;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{

    public function show(){

        Session::add("welcome", 'Welcome Admin User');

        Session::remove('welcome');

        if( Session::has('welcome') ) {

            $msg = Session::get('welcome');

        } else {

            $msg = 'Not Defined';
        }


        return view('admin/dashboard', [ 'welcome' => $msg ] );
    }


    public function postRequest() {

        $requestData = Request::all(true);

        var_dump($requestData);
        echo "</br></br>";
        var_dump($requestData['post']['test-data']);

        echo "</br></br>";
        var_dump($requestData['file']['image']['name']);

        // get post request data only
        echo "</br> Getting Post data: </br>";
        $postData = Request::get('post');
        var_dump($postData);

        echo "</br></br>";

        // get file data only
        echo "</br> Getting file data only : </br>";
        $fileData = Request::get('file');
        var_dump($fileData->image->name);

        // check if post key exists
        echo "</br> check if post key exists : </br>";
        echo " Post key exists? : " . Request::has('post') . "</br>";

        // Get a value from post
        echo "</br> Get a value product from post : </br>";
        echo " product : " . Request::old('post', 'product'). "</br>";

        // Refresh data
        echo "</br> refresh all data : </br>";
        Request::refresh();

        // check if post key exists after refresh
        echo "</br> check if post key exists after Refresh : </br>";
        echo " Post key exists? : " . Request::has('post') . "</br>";


        // Get a value from post after refresh
        echo "</br> Get a value product from post after refresh : </br>";
        echo " product : " . Request::old('post', 'product'). "</br>";
    }
}