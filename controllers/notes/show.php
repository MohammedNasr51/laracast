<?php


$config= require('config.php');

$db = new Database($config['database']);

$heading= 'Note';

$currentUser =1;

$query ="SELECT * FROM notes WHERE id = :id";

$note =$db->Query($query,['id'=>$_GET['id']])->FindOrFail();


authorize($note['user_id'] === $currentUser);


require "views/notes/show.view.php";
