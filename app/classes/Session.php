<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 16-Mar-18
 * Time: 7:37 PM
 */

namespace App\classes;


class Session
{
    /**
     * adding a value to session
     * @param $name
     * @param $value
     * @return mixed
     * @throws \Exception
     */
    public static function add($name, $value) {

        if($name != '' && !empty($name) && $value != '' && !empty($value)) {

            return $_SESSION[$name] =  $value;
        }

        throw new \Exception('Name and value required');
    }

    /**
     * get value from session
     * @param $name
     * @return mixed
     */
    public static function get($name) {

        return $_SESSION[$name];
    }

    // check if session exists
    public static function has($name) {

        if($name != '' && !empty($name) ) {

            return (isset($_SESSION[$name])) ? true : false;

        }

        throw new \Exception('name is required');
    }

    // remove session
    public static function remove($name) {

        if( self::has($name) ) {

            unset($_SESSION[$name]);
        }
    }
}