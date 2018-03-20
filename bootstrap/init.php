<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 12-Mar-18
 * Time: 6:44 PM
 */

//add this as the first line of the entry file may it is the index.php or config.php
//stream_context_set_default(['http'=>['proxy'=>'http://www-proxy.idc.oracle.com:80']]);

/**
 * Start session if not already started.
 */
if (!isset($_SESSION)) session_start();

/**
 * Load environment variables
 */
require_once  __DIR__.'/../app/config/_env.php';

new \App\classes\Database();

require_once  __DIR__.'/../app/routing/routes.php';

new \App\RouteDispatcher($router);

