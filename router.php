<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//dd();

$routes = [
    '/laracast/' => 'controllers/index.php',
    '/laracast/about' => 'controllers/about.php',
    '/laracast/notes' => 'controllers/notes.php',
    '/laracast/note' => 'controllers/note.php',
    '/laracast/contact' => 'controllers/contact.php',
];



function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abourt();
    }
}

function abourt($code = 404)
{
    http_response_code($code);
    require "views/$code.php";
    die();
}

routeToController($uri, $routes);

