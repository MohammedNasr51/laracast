<?php
use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;
use HTTP\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];

$password = $_POST['password'];

// validate the form

$form = new LoginForm();



if (! $form->validate($email, $password)) {

    view("session/create.view.php", [
        'errors' => $form->errors()
    ]);
}

$auth= new Authenticator;

$auth->attempt($email, $password);


$user = $db->query('select * from users where email = :email', [

    'email' => $email

])->find();



if ($user) {
    
if(password_verify($password, $user['password'])){

    login($user);

}

}

$errors=['verify'=>'Email or Password does not match try another Email or Password'];

view("session/create.view.php", [
    'errors' => $errors
]);