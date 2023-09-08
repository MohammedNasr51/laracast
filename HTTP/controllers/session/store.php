<?php

use Core\Authenticator;
use HTTP\Forms\LoginForm;


$email = $_POST['email'];

$password = $_POST['password'];

// validate the form

$form = new LoginForm();

$auth = new Authenticator;

if ($form->validate($email, $password)) {

    if ($auth->attempt($email, $password)) {

        redirect("/laracast/");

    }

    $form->error('verify', 'Email or Password does not match try another Email or Password');

}

view("session/create.view.php", [

    'errors' => $form->errors()

]);