<?php

namespace HTTP\Forms;
use Core\Validator;


class LoginForm
{

    protected $errors = [];
    public function validate($email, $password)
    {

        if (!Validator::stringvalidate($password,7,255)) {

            $this->errors['password'] = 'Please provide a valid password .';

        }

        if (!Validator::emailValidate($email)) {

            $this->errors['email'] = 'Please provide a valid email address.';

        }

        return empty($this->errors);

    }

    public function errors(){

        return $this->errors;

    }
}