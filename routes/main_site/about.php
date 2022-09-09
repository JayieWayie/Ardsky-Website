<?php
$router->get('/about', function() {
    global $config;

    $page_title = "About Us";
    include("./views/main_site/about.php");
});