<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->add(new \Slim\Middleware\SessionCookie(array('secret' => 'myappsecret')));


function isLogin($app){
    if (!isset($_SESSION['email']) or $_SESSION['email'] == "" or !isset($_SESSION['userid']) or !isset($_SESSION['group'])) {
        $app->redirect('/login');
    } else {
        $app->redirect("/");
    }

};


/*
*
* GET     /
*    + When user found to be logined based upon session variables
*    + We want user to redirect to / page and render (  "home.php"  ) file.
*    + Else redirect user to /login page and reder (  "login.php"  ) file.
* GET     /login 
*    + login and signup form
* POST    /login 
*    + API for login and Signup
* GET     /logout
*   + destroy session variables
* GET     /root
*    + When root user login to application.
*
*
* GET    /note
*/

$app->get(
    '/', 
    function () use ($app) {
        $app->render("home.php");
    }
);

$app->get(
    '/login',
    function () use ($app) {
        $app->render("login.php");
    }
);


$app->post(
    '/login',
    function () use ($app) {
        $app->render("api/api.login.php");
    }
);

$app->get(
    '/logout',
    function () use ($app) {
        $app->render("logout.php");
        $app->redirect("/login");
    }
);

$app->get(
    '/note',
    function () use ($app) {
        $app->render("note/note.php");
    }
);

$app->get(
    '/root', 
    function () use ($app) {
        $app->render("root.php");
    }
);


$app->run();
