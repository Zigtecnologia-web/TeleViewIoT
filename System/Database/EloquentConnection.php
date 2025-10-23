<?php
namespace System\Database;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\DB;

class EloquentConnection
{
    public static function init()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => $_ENV['DB_CONNECTION'],
            'host'      => $_ENV['DB_HOST'],
            'database'  => $_ENV['DB_DATABASE'],
            'username'  => $_ENV['DB_USERNAME'],
            'password'  => $_ENV['DB_PASSWORD'],
            'charset'   => 'utf8', 
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ]);

        $container = new Container();

        $capsule->setEventDispatcher(new Dispatcher($container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        Facade::setFacadeApplication($container);

        $container->instance('db', $capsule->getDatabaseManager());

        // class_alias com namespace absoluto
        \class_alias(\Illuminate\Support\Facades\DB::class, 'DB');
    }
}
