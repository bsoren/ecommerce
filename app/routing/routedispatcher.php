<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 13-Mar-18
 * Time: 9:35 AM
 */

namespace App;

use AltoRouter;

class RouteDispatcher {

    protected $match;
    protected $controller;
    protected $method;

    public function __construct(AltoRouter $router){

        $this->match = $router->match();

        if($this->match){
            list($controller, $method) = explode('@',$this->match['target']);
            $this->controller = $controller;
            $this->method = $method;

            if(is_callable(array(new $this->controller, $this->method))){
                call_user_func_array(array(new $this->controller, $this->method), array($this->match['params']));
            } else {
                echo "The method {$method} is not defined in {$controller} class";
            }
        } else {
            view("errors/404");
        }
    }
}