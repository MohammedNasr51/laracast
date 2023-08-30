<?php


$config= require('config.php');

$db = new Database($config['database']);

$heading= 'Note';


$query ="SELECT * FROM notes WHERE id = :id";

$note =$db->Query($query,['id'=>$_GET['id']])->fetch();


require "views/note.view.php";
