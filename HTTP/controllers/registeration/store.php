<?php
use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;
use HTTP\Forms\LoginForm;



$email = $_POST['email'];

$password = $_POST['password'];

// validate the form

$errors = [];


if (! Validator::stringvalidate($password, 7, 255)) {

    $errors['password'] = 'Please provide a password of at least seven characters.';

}

if (! Validator::emailValidate($email)) {

    $errors['email'] = 'Please provide a valid email address.';

}

// find the corresponding note



// if no validation errors, update the record in the notes database table.

if (count($errors)) {

    view("registeration/create.view.php", [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [

    'email' => $email

])->find();



if (!$user) {
    $db->Query("INSERT INTO users(email, password) VALUES(:email,:password)",[

        "email" => $email,
    
        "password" => password_hash($password,PASSWORD_BCRYPT)
    ]);

    (new Authenticator)->login($user=['email' => $email]);

}else{
    (new Authenticator)->login($user); 
}
