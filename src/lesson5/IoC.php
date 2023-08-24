<?php

declare(strict_types=1);

class IoC implements IoCInterface
{
    /** @var string Регистрация зависимости в контейнере */
    public const IOC_REGISTER = 'IoC.Register';

    /** @var string Создание скоупа */
    public const SCOPES_NEW = 'Scopes.New';

    /** @var string Переключение на скоуп */
    public const SCOPES_CURRENT = 'Scopes.Current';

    public function __construct(private readonly Scopes $scopes = new Scopes())
    {
    }

    /**
     * Универсальный метод для регистрации/получения зависимости и создание/переключения на scopes.
     *
     * @param string $key
     * @param        ...$args
     * @return mixed
     * @throws Exception
     */
    public function resolve(string $key, ...$args): mixed
    {
        if (self::IOC_REGISTER === $key) {
            $this->scopes->getCurrentScope()->addDependency($args[0], $args[1]);
        } elseif (self::SCOPES_NEW === $key) {
            $this->scopes->createScope($args[0]);
        } elseif (self::SCOPES_CURRENT === $key) {
            $this->scopes->setCurrentScope($args[0]);
        } else {
            return $this->scopes->getCurrentScope()->resolve($key, ...$args);
        }

        return true;
    }
}