<?php

use Core\App;

use Core\Database;

$db = App::resolve(Database::class);


$currentUser = 1;


$query = "SELECT * FROM notes WHERE id = :id";

$note = $db->Query($query, ['id' => $_GET['id']])->FindOrFail();


authorize($note['user_id'] === $currentUser);


view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);
