<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 17-Mar-18
 * Time: 10:56 PM
 */

namespace App\classes;

use Illuminate\Database\Capsule\Manager as Capsule;


class ValidateRequest
{


    private static $errors = [];
    private static $error_messages = [
        'string'    => 'The :attribute is invalid string',
        'required'  => 'The :attribute field is required',
        'minLength' => 'The :attribute field must be a minimum of :policy characters',
        'maxLength' => 'The :attribute field must be a maximum of :policy characters',
        'unique'    => 'The :attribute field is already taken, please try another one'
    ];


    public function abide(array $dataAndValues, array $policies) {

        foreach ($dataAndValues as $column => $value) {

            if (in_array($column, array_keys($policies))) {

                // do validation
                self::doValidation(

                    [
                        'column'    => $column,
                        'value'     => $value,
                        'policies'  => $policies[$column]
                    ]

                );
            }

        }
    }


    private function doValidation(array $data) {

        foreach ($data['policies'] as $rule => $policy) {

            $column = $data['column'];
            $value = $data['value'];
            $valid = call_user_func_array([self::class, $rule], [$column, $value , $policy]);

            if(!$valid) {
                //set errors
                self::setErrors(
                    str_replace([':attribute',':policy'],[$column, $policy],self::$error_messages[$rule]),
                    $column
                );
            }

        }

    }

    public function setErrors($error, $key = null) {

        if ($key) {

            self::$errors[$key][] = $error;

        } else {

            self::$errors[] = $error;
        }

    }

    public function hasErrors() {

        return count(self::$errors) > 0 ? true : false;

    }

    public function getErrors() {

        return self::$errors;
    }


    /**
     * Check for unique value in database column
     * @param $column
     * @param $value
     * @param $policy
     * @return bool
     */
    public static function unique($column, $value, $policy) {

        if ($value != null && !empty(trim($value))) {

            return !Capsule::table($policy)->where($column, '=', trim($value))->exists();

        }

        return true;
    }


    public static function required($column, $value, $policy) {

        if ($value != null && !empty(trim($value))) {

            return true;

        }

        return false;
    }


    /**
     * Validate an email address
     * @param $name
     * @param $value
     * @param $policy
     * @return bool|mixed
     */
    public static function validEmail($column, $value, $policy) {

        if ($value != null && !empty(trim($value) )) {

            return filter_var($value, FILTER_VALIDATE_EMAIL);

        }

        return true;
    }


    public static function minLength($column, $value, $policy) {

        if ($value != null && !empty(trim($value))) {

            return strlen($value) >= $policy;

        }

        return true;
    }


    public static function maxLength($column, $value, $policy) {

        if ($value != null && !empty(trim($value))) {

            return strlen($value) <= $policy;

        }

        return true;
    }


    public static function mixed($column, $value, $policy) {

        if ($value != null && !empty(trim($value))) {

            if( !preg_match('/^[A-Za-z0-9.,_~\-!@#\&%\^\'\*\(\)]+$/', $value) ) {

                return false;
            }
        }

        return true;
    }


    public static function string($column, $value, $policy) {

        if ($value != null && !empty(trim($value))) {

            if( !preg_match('/^[A-Za-z ]+$/', $value) ) {

                return false;
            }
        }

        return true;
    }


    public static function number($column, $value, $policy) {

        if ($value != null && !empty(trim($value))) {

            if( !preg_match('/^[0-9.]+$/', $value) ) {

                return false;
            }
        }

        return true;
    }

}