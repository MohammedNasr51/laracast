<?php

require 'functions.php';

//require 'router.php';

require 'Database.php';

$id = $_GET['id'];

$config= require('config.php');

$db = new Database($config['database']);

$query ="SELECT * FROM users WHERE id = ?";

//$query ="SELECT * FROM users WHERE id = :id ";

$usrs = $db->Query($query,[$id])->fetchAll();

//$usrs = $db->Query($query,[':id'=>$id])->fetchAll();

foreach ($usrs as $user) {
    echo "<li>" . $user['fname'] . "</li>";
}