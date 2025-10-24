<?php
namespace System\Container;

class App
{
    protected static ?\System\Route\Container $container = null;

    public static function set(\System\Route\Container $container): void
    {
        self::$container = $container;
    }

    public static function get(): \System\Route\Container
    {
        return self::$container;
    }
}
