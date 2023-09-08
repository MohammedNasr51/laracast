<?php

use Core\Response;

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}
function urlis($value)
{

    return $_SERVER['REQUEST_URI'] === $value;

}

function authorize($condition, $statCode = Response::FORBIDDEN)
{

    if (!$condition) {

        abourt($statCode);

    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}
function abourt($code = 404)
{
    http_response_code($code);
    require base_path("views/$code.php");
    die();
}

function login($user)
{
    $_SESSION['user'] = ['email' => $user['email']];

    session_regenerate_id(true);

    header('location: /laracast/');
    exit();
}

function logout()
{

    $_SESSION = [];

    session_destroy();

    $params = session_get_cookie_params();


    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

}