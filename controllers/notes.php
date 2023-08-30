<?php


$heading = 'My Notes';

$config= require('config.php');

$db = new Database($config['database']);

$query ="SELECT * FROM notes WHERE user_id = :id";

$notes =$db->Query($query,["id"=>1])->get();

require "views/notes.view.php";
