<?php

namespace Src\Base;

use Psr\Container\ContainerInterface;
use ReflectionClass;

class Container implements ContainerInterface
{
    protected array $services = [];
    protected static $instance;

    public function get(string $id): mixed
    {
        $service = $this->resolve($id);

        return $this->getInstance($service);
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->services);
    }

    public function register(string $key, string|null $target): void
    {
        $target = $target ?? $key;
        $this->services[$key] = new ReflectionClass($target);
    }

    public static function getContainer(): Container
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    private function resolve(string $key): ReflectionClass
    {
        if ($this->has($key)) {
            $service = $this->services[$key];

            if (is_callable($service)) {
                return $service();
            }

            return $service;
        }
        
        $this->services[$key] = new ReflectionClass($key);
        
        return $this->services[$key];
    }

    private function getInstance(ReflectionClass $service): object
    {
        $constructor = $service->getConstructor();
        
        if (is_null($constructor) || $constructor->getNumberOfRequiredParameters() === 0) {
            return $service->newInstance(); // Retorna uma classe que não tem dependencias no construtor.
        }

        $params = [];

        foreach ($constructor->getParameters() as $parameter) {
            if ($paramType = $parameter->getType()) {
                $params[] = $this->get($paramType->getName());
            }
        }

        return $service->newInstanceArgs($params); // Retorna uma classe instanciando todas as dependencias no construtor.
    }
}
