<?php
use Core\App;
use Core\Database;
use Core\Validator;



$email = $_POST['email'];

$password = $_POST['password'];

// validate the form

$errors = [];


if (! Validator::stringvalidate($password)) {

    $errors['password'] = 'Please provide a valid password .';

}

if (! Validator::emailValidate($email)) {

    $errors['email'] = 'Please provide a valid email address.';

}


// if no validation errors, update the record in the notes database table.

if (count($errors)) {

    view("session/create.view.php", [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

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