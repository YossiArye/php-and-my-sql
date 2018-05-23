<?php

//require_once 'libs/Bootstrap.php';
spl_autoload_register(function($class) {
    if (file_exists("lib/$class.php")) {
        require_once "lib/$class.php";
    } else if (file_exists("config/$class.php")) {
        "config/$class.php";
    } else {
        echo "$class not found!!!";
        exit();
    }
});
Session::init();
setConfig();
$app = new Bootstrap();
$app->init();



function setConfig() {
    config::$server = 'localhost';
    config::$database = 'mvcproject';
    config::$user = 'root';
    config::$password = '';
    config::$salt_prefix = 'bonzo';
    config::$salt_suffix = 'morgan';
}
