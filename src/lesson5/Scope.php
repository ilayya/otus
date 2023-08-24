<?php

class Scope implements ScopeInterface
{
    private array $dependencies = [];

    /**
     * @param $key
     * @param $object
     * @return void
     */
    public function addDependency($key, $object): void
    {
        $this->dependencies[$key] = $object;
    }

    /**
     * @param $key
     * @param ...$args
     * @return mixed
     */
    public function resolve($key, ...$args): mixed
    {
        $object = $this->dependencies[$key] ?? null;

        if ($object === null) {
            throw new IoCException('Зависимость не найдена');
        }

        if ($args === []) {
            return $this->dependencies[$key];
        }

        $method = array_shift($args);

        return call_user_func_array([$object, $method], $args);
    }
}