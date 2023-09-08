<?php



$router->get('/laracast/','index.php');

$router->get('/laracast/about', 'about.php');

$router->get('/laracast/contact', 'contact.php'); 


$router->get('/laracast/notes', 'notes/index.php')->only('auth');

$router->get('/laracast/note', 'notes/show.php');

$router->delete('/laracast/note', 'notes/destroy.php');



$router->get('/laracast/note/edit', 'notes/edit.php');

$router->patch('/laracast/note', 'notes/update.php');



$router->get('/laracast/note/create', 'notes/create.php');

$router->post('/laracast/notes', 'notes/store.php'); 



$router->get('/laracast/register', 'registeration/create.php')->only('guest'); 

$router->post('/laracast/register', 'registeration/store.php')->only('guest');



$router->get('/laracast/login', 'session/create.php')->only('guest'); 

$router->post('/laracast/session', 'session/store.php')->only('guest');  



$router->delete('/laracast/session', 'session/destroy.php')->only('auth');  
