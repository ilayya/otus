<?php

interface ScopeInterface
{
    public function addDependency($key, $object): void;
    public function resolve($key, ...$args): mixed;
}