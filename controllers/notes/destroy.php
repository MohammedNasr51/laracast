<?php

use Core\Database;


$config = require base_path('config.php');

$db = new Database($config['database']);


$currentUser = 1;


$query = "SELECT * FROM notes WHERE id = :id";

$note = $db->Query($query, ['id' => $_GET['id']])->FindOrFail();


authorize($note['user_id'] === $currentUser);

$db->Query('DELETE FROM notes where id = ?', [$_POST['id']]);

header('Location: /laracast/notes');

exit();