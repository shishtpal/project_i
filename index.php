<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

// GET route
$app->get(
    '/',
    function () use ($app) {
        $app->render("index.php");
    }
);

$app->run();
