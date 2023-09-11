<?php

use Core\Authenticator;
use HTTP\Forms\LoginForm;


$form = LoginForm::validate($attributes = [

    'email' => $_POST['email'],

    'password' => $_POST['password']
]);


$signedin = (new Authenticator)->attempt(
    
    $attributes['email'], $attributes['password']);


if (! $signedin) {

    $form->error('verify', 'Email or Password does not match try another Email or Password')

    ->throw();


}


redirect("/laracast/");