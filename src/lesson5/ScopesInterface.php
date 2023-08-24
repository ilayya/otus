<?php

interface ScopesInterface
{
    public function addDependency($key, $object): void;
    public function createScope($key): void;
    public function setCurrentScope($key): void;
    public function getCurrentScope(): object;
}