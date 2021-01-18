<?php

ini_set ( 'display_errors', 1 );
error_reporting ( E_ALL );

spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});

$router = new classes\Router();
$router->run();