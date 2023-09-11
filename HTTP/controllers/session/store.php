<?php

use Core\Authenticator;
use Core\Session;
use Core\ValidationException;
use HTTP\Forms\LoginForm;

try {

    $form = LoginForm::validate($attributes = [
        'email' => $_POST['email'],
    
        'password' => $_POST['password']
    ]);

} catch (ValidationException $exception) {

    Session::flash('errors', $exception->errors);
    
    Session::flash('old', $exciption->old);
    
    return redirect('/laracast/login');
}


if ((new Authenticator)->attempt($attributes['email'], $attributes['password'])) {

    redirect("/laracast/");

}

$form->error('verify', 'Email or Password does not match try another Email or Password');



