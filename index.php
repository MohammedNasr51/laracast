<?php

require 'functions.php';

//require 'router.php';

require 'Database.php';

$config=[
    'host'=>'localhost',
    'dbname'=>'ooplogin',
    'port'=>'3307'
];

$db = new Database($config);

$usrs = $db->Query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);

foreach ($usrs as $user) {
    echo "<li>" . $user['fname'] . "</li>";
}