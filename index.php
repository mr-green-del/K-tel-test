<?php
    @ob_start();
    session_start();


    function debug($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
    }

    date_default_timezone_set('Asia/Yekaterinburg');

    error_reporting(E_ALL);
    ini_set('display_errors', 0);
    ini_set('log_errors','on');
    ini_set('error_log', __DIR__ . '/logs/php_errors.log');



    define('ROOT', dirname(__FILE__));

    require_once ROOT. '/components/Autoload.php';


    $router = new Router();
    $router->run();









?>