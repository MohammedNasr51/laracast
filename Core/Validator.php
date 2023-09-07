<?php

namespace Core;


class Validator{

    public static function stringvalidate($value, $min=1, $max= INF){

        $value=trim($value);

        return strlen($value) >= $min && strlen($value) <= $max ;

    }
    public static function emailValidate($value){

return filter_var($value, FILTER_VALIDATE_EMAIL);

    }

}