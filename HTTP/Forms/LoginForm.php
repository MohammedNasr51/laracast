<?php

namespace HTTP\Forms;
use Core\ValidationException;
use Core\Validator;


class LoginForm
{

    protected $errors = [];

    public function __construct(public array $attributes){

        if (!Validator::stringvalidate($attributes['password'],7,30)) {

            $this->errors['password'] = 'Please provide a valid password .';

        }

        if (!Validator::emailValidate($attributes['email'])) {

            $this->errors['email'] = 'Please provide a valid email address.';

        }

    }
    public static function validate($attributes)
    {

        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance; 

    }

    public function throw(){

        ValidationException::throw($this->errors, $this->attributes);

    }
    public function failed(){

        return count($this->errors);

    }

    public function errors(){

        return $this->errors;

    }

    public function error($field,$message){

        $this->errors[$field] = $message;

        return $this;
    }
}