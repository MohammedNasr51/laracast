<?php

use Core\Authenticator;
use Core\Session;
use HTTP\Forms\LoginForm;

$email = $_POST['email'];

$password = $_POST['password'];

// validate the form

$form = new LoginForm();



if ($form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {

        redirect("/laracast/");

    }

    $form->error('verify', 'Email or Password does not match try another Email or Password');

}

Session::flash('errors', $form->errors());

return redirect('/laracast/login');
