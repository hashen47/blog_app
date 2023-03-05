<?php 


namespace Core;


use Core\Container;
use Core\Database;


class App {

    protected static Container $container;


    public static function setContainer(Container $container)
    {
        static::$container = $container;
    }


    public static function bind($key, $resolver)
    {
        static::container()->bind($key, $resolver);
    }


    public static function container()
    {
        return static::$container;
    }


    public static function resolve($key)
    {
        return static::container()->resolver($key);
    }
}