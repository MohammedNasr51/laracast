<?php

require 'functions.php';

//require 'router.php';

require 'Database.php';

$id = $_GET['id'];

$config= require('config.php');

$db = new Database($config['database']);

$usrs = $db->Query("SELECT * FROM users WHERE id=$id ")->fetchAll();

foreach ($usrs as $user) {
    echo "<li>" . $user['fname'] . "</li>";
}