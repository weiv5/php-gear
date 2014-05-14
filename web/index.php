<?php
error_reporting(E_ALL);
date_default_timezone_set('PRC');
header('Content-Type: text/html;charset=utf-8');

define("__ROOT__", realpath(dirname(__FILE__).'/../'));
define("__APP__", __ROOT__.'/app');
define("__CONF__", __ROOT__.'/conf');
define("__LIB__", __ROOT__.'/lib');
define("__MODEL__", __ROOT__.'/model');
define("__VIEW__", __ROOT__.'/view');
define("__INCLUDE__", __ROOT__.'/include');

require(__INCLUDE__."/ParseParams.class.php");
require(__INCLUDE__."/Router.class.php");
require(__INCLUDE__."/AppBase.class.php");
require(__INCLUDE__."/Loader.class.php");

spl_autoload_register('Loader::loadModel');
spl_autoload_register('Loader::loadLib');

try {
    $router = Router::getInstance();
    $route_path = $router->parseAction(GET::str("m", "index"));
    require_once($route_path);
    $app = new App();
    if ($app->checkLogin) {
        //check if login
        exit;
    }
    $app->run();
} catch (Exception $e) {
    exit($e->getMessage());
}
