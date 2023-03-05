<?php 


namespace Core;


use Exception;


class Container {

    protected array $bindings = [];


    public function bind($key, $value)
    {
        $this->bindings[$key] = $value; 
    }


    public function resolver($key) 
    {
        if (! array_key_exists($key, $this->bindings)) {
            throw new Exception("no matching binding found for {$key}");
        }

        $func = $this->bindings[$key];
        return call_user_func($func);
    }
}