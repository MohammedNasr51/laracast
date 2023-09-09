<?php
use Core\Authenticator;
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

$_SESSION['_flash']['errors']=$form->errors();

return redirect('/laracast/login');

// return view("session/create.view.php", [

//     'errors' => $form->errors()

// ]);