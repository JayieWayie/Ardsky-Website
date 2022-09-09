<?php
/*

                   _     _          
     /\           | |   | |         
    /  \   _ __ __| |___| | ___   _ 
   / /\ \ | '__/ _` / __| |/ / | | |
  / ____ \| | | (_| \__ \   <| |_| |
 /_/    \_\_|  \__,_|___/_|\_\\__, |
                               __/ |
                              |___/ 

Copyright 2022 - all rights reserved
The Ardsky website is developed by @JayieWayie and @oddmario
*/

session_start();
require_once( __DIR__ . '/vendor/autoload.php' );
require_once( __DIR__ . '/config.php' );

$router = new \Bramus\Router\Router();

if( isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}

$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    include(__DIR__ . '/views/errors/404.php');
});

$di = new RecursiveDirectoryIterator(__DIR__ . '/routes');
foreach( new RecursiveIteratorIterator($di) as $filename => $file ) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if( strtolower($ext) == "php" ) {
        include($filename);
    }
}

$router->run();
?>