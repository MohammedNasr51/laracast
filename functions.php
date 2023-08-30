<?php 
function dd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}
function urlis($value){

    return $_SERVER['REQUEST_URI']=== $value;

}

function authorize($condition, $statCode= Response::FORBIDDEN){

    if(!$condition){

        abourt($statCode);

    }
}