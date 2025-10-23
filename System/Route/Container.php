<?php
namespace System\Route;

use ReflectionClass;
use ReflectionProperty;
use Exception;

class Container
{
    protected array $instances = [];

    // Registra instância ou factory manual
    public function bind(string $abstract, callable|object $concrete): void
    {
        $this->instances[$abstract] = $concrete;
    }

    // Cria ou retorna instância
    public function make(string $class): object
    {
        if (isset($this->instances[$class])) {
            $entry = $this->instances[$class];
            return is_callable($entry) ? $entry($this) : $entry;
        }

        if (!class_exists($class)) {
            throw new Exception("Classe {$class} não encontrada");
        }

        $ref = new ReflectionClass($class);
        $constructor = $ref->getConstructor();
        $dependencies = [];

        if ($constructor) {
            foreach ($constructor->getParameters() as $param) {
                $type = $param->getType();
                if ($type && !$type->isBuiltin()) {
                    $dependencies[] = $this->make($type->getName());
                } elseif ($param->isDefaultValueAvailable()) {
                    $dependencies[] = $param->getDefaultValue();
                } else {
                    $dependencies[] = null;
                }
            }
        }

        $instance = $ref->newInstanceArgs($dependencies);

        // Injeta propriedades tipadas
        $this->injectProperties($instance);

        return $instance;
    }

    // Injeta propriedades tipadas automaticamente
    public function injectProperties(object $controller): void
    {
        $refClass = new ReflectionClass($controller);
        foreach ($refClass->getProperties(ReflectionProperty::IS_PROTECTED | ReflectionProperty::IS_PRIVATE) as $prop) {
            $type = $prop->getType()?->getName();
            if ($type && class_exists($type)) {
                $prop->setAccessible(true);
                $prop->setValue($controller, $this->make($type));
            }
        }
    }
}
