<?php



$router->get('/laracast/','controllers/index.php');

$router->get('/laracast/about', 'controllers/about.php');

$router->get('/laracast/contact', 'controllers/contact.php'); 


$router->get('/laracast/notes', 'controllers/notes/index.php')->only('auth');

$router->get('/laracast/note', 'controllers/notes/show.php');

$router->delete('/laracast/note', 'controllers/notes/destroy.php');



$router->get('/laracast/note/edit', 'controllers/notes/edit.php');

$router->patch('/laracast/note', 'controllers/notes/update.php');



$router->get('/laracast/note/create', 'controllers/notes/create.php');

$router->post('/laracast/notes', 'controllers/notes/store.php'); 



$router->get('/laracast/register', 'controllers/registeration/create.php')->only('guest'); 

$router->post('/laracast/register', 'controllers/registeration/store.php')->only('guest');



$router->get('/laracast/login', 'controllers/session/create.php')->only('guest'); 

$router->post('/laracast/session', 'controllers/session/store.php')->only('guest');  



$router->delete('/laracast/session', 'controllers/session/destroy.php')->only('auth');  
