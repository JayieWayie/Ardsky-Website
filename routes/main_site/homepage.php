<?php
$router->get('/', function() {
    global $config;

    $page_title = "Home";
    include("./views/main_site/homepage.php");
});