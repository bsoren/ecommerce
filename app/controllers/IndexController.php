<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 13-Mar-18
 * Time: 8:58 AM
 */

namespace App\Controllers;

use App\classes\Mail;

class IndexController extends BaseController
{

    public  function show() {
        echo "<h1> Inside Homepage from IndexController class </h1>";
        echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."</br>";

        $mail = new Mail();

        $data = [
            'to' => 'gr8mind42@gmail.com',
            'subject' => 'Welcome to Acme Store',
            'view' => 'welcome',
            'name' => 'John Doe',
            'body' => 'Testing email template'
        ];

        if($mail->send($data)){
            printf("Email sent successfully \n");
        }else{
            printf("Email sending failed\n");
        }

    }

    public function justTest(){
        echo "This is a test";
    }
}