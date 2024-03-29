<?php 

namespace Core;

class Container {

    protected $bindings =[];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;  // how to cash the key of what we want to bind 
    }
    public function resolve($key){

        if (! array_key_exists($key , $this->bindings)) {

            throw new \Exception("No matching binding found for {$key}");

            
        }
        $resolver = $this->bindings[$key];

        return call_user_func($resolver);

    }



}