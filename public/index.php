<?php

//permet de charger d'un coup toutes les dépendances installées avec composer
require_once '../vendor/autoload.php';

//on démarre la session
session_start();

/* ------------
--- ROUTAGE ---
-------------*/

// création de l'objet router
$router = new AltoRouter();

// Si il y a un sous-répertoire
if (array_key_exists('BASE_URI', $_SERVER)) {
    // Alors on définit le basePath d'AltoRouter
    $router->setBasePath($_SERVER['BASE_URI']);
    // ainsi, nos routes correspondront à l'URL, après la suite de sous-répertoire
} else { // sinon
    // On donne une valeur par défaut à $_SERVER['BASE_URI']
    $_SERVER['BASE_URI'] = '/';
}

// 1. méthode HTTP
// 2. La route : la portion d'URL après le basePath
// 3. Target/Cible : informations contenant
//      - le nom de la méthode à utiliser pour répondre à cette route
//      - le nom du controller contenant la méthode
// 4. Le nom de la route : pour identifier la route, on va suivre une convention
//      - "NomDuController-NomDeLaMéthode"
//      - ainsi pour la route /, méthode "home" du MainController => "main-home"

$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => '\App\Controllers\MainController',
    ],
    'main-home'
);

$router->map(
    'GET',
    '/inscription',
    [
        'method' => 'add',
        'controller' => '\App\Controllers\UserController',
    ],
    'user-add'
);
$router->map(
    'POST',
    '/inscription',
    [
        'method' => 'addPost',
        'controller' => '\App\Controllers\UserController',
    ],
    'user-addPost'
);

$router->map(
    'GET',
    '/connexion',
    [
        'method' => 'showLogin',
        'controller' => '\App\Controllers\LoginController',
    ],
    'login-show'
);
$router->map(
    'POST',
    '/connexion',
    [
        'method' => 'postLogin',
        'controller' => '\App\Controllers\LoginController',
    ],
    'login-post'
);
$router->map(
    'GET',
    '/deconnexion',
    [
        'method' => 'logout',
        'controller' => '\App\Controllers\MainController',
    ],
    'main-logout'
);

$router->map(
    'GET',
    '/contact',
    [
        'method' => 'add',
        'controller' => '\App\Controllers\ContactController',
    ],
    'contact-add'
);
$router->map(
    'POST',
    '/contact',
    [
        'method' => 'addPost',
        'controller' => '\App\Controllers\ContactController',
    ],
    'contact-post'
);

/* -------------
--- DISPATCH ---
--------------*/

// On demande à AltoRouter de trouver une route qui correspond à l'URL courante
$match = $router->match();


// Ensuite, pour dispatcher le code dans la bonne méthode, du bon Controller
// On délègue à une librairie externe : https://packagist.org/packages/benoclock/alto-dispatcher
// 1er argument : la variable $match retournée par AltoRouter
// 2e argument : le "target" (controller & méthode) pour afficher la page 404
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');

$dispatcher->setControllersArguments($router, $match);
// Une fois le "dispatcher" configuré, on lance le dispatch qui va exécuter la méthode du controller
$dispatcher->dispatch();