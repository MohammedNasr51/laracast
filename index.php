<?php

require 'functions.php';

//require 'router.php';

require 'Database.php';

$config= require('config.php');

$db = new Database($config);

$usrs = $db->Query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);

foreach ($usrs as $user) {
    echo "<li>" . $user['fname'] . "</li>";
}