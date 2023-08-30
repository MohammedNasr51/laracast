<?php


$config= require('config.php');

$db = new Database($config['database']);

$heading= 'Note';


$query ="SELECT * FROM notes WHERE id = :id";

$note =$db->Query($query,['id'=>$_GET['id']])->fetch();

$currentUser =1;

if(!$note){

    abourt(Response::NOT_FOUND);

}
elseif ($note['user_id'] === $currentUser)
{

    abourt(Response::FORBIDDEN);

}


require "views/note.view.php";
