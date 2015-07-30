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
    '/upload', 
    function () use ($app) {
        $app->render("uploader/img.upload.php");
    }
);

$app->get(
    '/upload2', 
    function () use ($app) {
        $app->render("uploader/img.upload2.php");
    }
);

$app->get(
    '/upload3', 
    function () use ($app) {
        $app->render("uploader/img.upload3.php");
    }
);

$app->get(
    '/upload4', 
    function () use ($app) {
        $app->render("uploader/img.upload4.php");
    }
);

$app->get(
    '/other', 
    function () use ($app) {
        $app->render("other.php");
    }
);

$app->get(
    '/tiles', 
    function () use ($app) {
        $app->render("tiles.php");
    }
);

$app->post(
    '/uploads', 
    function () use ($app) {
        $app->response->headers->set('Content-Type', 'application/json');
        $data = $app->request->getBody();
        $app->render("uploader/post.uploads.php", array("data" => $data));
    }
);

$app->get(
    '/demo', 
    function () use ($app) {
        $app->render("demo.php");
    }
);

$app->get(
    '/demo2', 
    function () use ($app) {
        $app->render("demo2.php");
    }
);

$app->post(
    '/demo3', 
    function () use ($app) {
        $app->render("demo3.php");
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
    '/notes',
    function () use ($app) {
        $app->response->headers->set('Content-Type', 'application/json');
        $app->render("note/get.notes.php");
    }
);

$app->get(
    '/notes/:id',
    function () use ($app) {
        $app->response->headers->set('Content-Type', 'application/json');
        $data = (array) json_decode($app->request->getBody());
        $app->render("note/get.note.php", array("data" => $data));
    }
);


$app->post(
    '/notes',
    function () use ($app) {
        $app->response->headers->set('Content-Type', 'application/json');
        $data = json_decode($app->request->getBody());
        $app->render("note/post.newnote.php", array("data" => $data));
    }
);

$app->put(
    '/users/:id',
    function () use ($app) {
        $app->response->headers->set('Content-Type', 'application/json');
        $data = (array) json_decode($app->request->getBody());
        // print_r(array_keys($data));
        // print_r(array_values($data));
        // print_r($data);
        $app->render("note/put.updatenote.php", array("data" => $data));
    }
);


$app->get(
    '/root', 
    function () use ($app) {
        $app->render("root.php");
    }
);


$app->run();
