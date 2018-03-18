<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 17-Mar-18
 * Time: 7:56 AM
 */

namespace App\classes;


class CSRFToken
{

    /**
     * create a token
     * @return mixed
     * @throws \Exception
     */
    public static function _token(){

        // create and add token if it doesn't exists in session
        if( !Session::has('token') ) {

            $requestToken = base64_encode(openssl_random_pseudo_bytes(32));
            Session::add('token', $requestToken);

        }

        return Session::get('token');
    }

    /**
     * verify token
     * @param $requestToken
     * @return bool
     * @throws \Exception
     */
    public static function verifyCSRFToken($requestToken) {

        if(Session::has('token') && Session::get('token') === $requestToken) {

            Session::remove('token');
            return true;

        }

        return false;
    }

}