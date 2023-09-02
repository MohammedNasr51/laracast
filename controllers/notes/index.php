<?php



$config = require base_path('config.php');

$db = new Database($config['database']);

$query ="SELECT * FROM notes WHERE user_id = :id";

$notes =$db->Query($query,["id"=>1])->get();

view("notes/index.view.php", [

    'heading' => 'My Notes',

    'notes' => $notes
]);