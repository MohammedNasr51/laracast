<?php

namespace Core;


class Validator{

    public static function stringvalidate($value, $min=1, $max= INF){

        $value=trim($value);

        return strlen($value) >= $min && strlen($value) <= $max ;

    }

}