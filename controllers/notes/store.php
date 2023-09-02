<?php

use Core\Database;

use Core\Validator;

$config = require base_path('config.php');

$db = new Database($config['database']);



$errors = [];


if (!Validator::stringvalidate($_POST['body'], 1, 1000)) {

    $errors['body'] = 'A body whith no more than 1,000 characters is required';

}


if (!empty($errors)) {

    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);

}else{

    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [

        'body' => $_POST['body'],

        'user_id' => 1

    ]);

    header('location: /laracast/notes');

    die();

}