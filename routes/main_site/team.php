<?php
$router->get('/team', function() {
    global $config;

    $page_title = "Meet the Team";
    include("./views/main_site/team.php");
});