<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../vendor/Stylist.php";
    require_once __DIR__."/../vendor/Client.php";

    $server = "mysql:host=localhost:8889;dbname=to_do";
    $username = "root";
    $password = "root";
    $DB = new PDO($server, $username, $password);

    $app = bew Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        "twig.path" => __DIR__."/../views"
    ));

    return $app;
<<<<<<< HEAD
    
=======

>>>>>>> 3ed6bf7998a2f60d886d240c94fa13019c92f2d0
?>
