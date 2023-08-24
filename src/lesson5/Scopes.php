<?php

class Scopes implements ScopesInterface
{
    /**
     * @var Scope[]
     */
    private array $scopes = [];
    private ?string $currentScope = null;

    /**
     * @param $key
     * @param $object
     * @return void
     */
    public function addDependency($key, $object): void
    {
        $this->scopes[$this->currentScope]->addDependency($key, $object);
    }

    /**
     * @param $key
     * @return void
     */
    public function createScope($key): void
    {
        $this->scopes[$key] = new Scope();
    }

    /**
     * @param $key
     * @return void
     * @throws IoCException
     */
    public function setCurrentScope($key): void
    {
        if (isset($this->scopes[$key]) === false) {
            throw new IoCException('Скоуп не зарегистрирован');
        }

        $this->currentScope = $key;
    }

    /**
     * @return object
     * @throws IoCException
     */
    public function getCurrentScope(): object
    {
        if (isset($this->scopes[$this->currentScope]) === false) {
            throw new IoCException('scope не найден');
        }

        return $this->scopes[$this->currentScope];
    }
}