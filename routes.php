<?php



$router->get('/laracast/','controllers/index.php');

$router->get('/laracast/about', 'controllers/about.php');

$router->get('/laracast/contact', 'controllers/contact.php');

$router->get('/laracast/notes', 'controllers/notes/index.php');

$router->get('/laracast/note', 'controllers/notes/show.php');

$router->delete('/laracast/note', 'controllers/notes/destroy.php');

$router->get('/laracast/note/create', 'controllers/notes/create.php');

$router->post('/laracast/notes', 'controllers/notes/store.php'); 
