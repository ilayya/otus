<?php

class ExceptionHandler
{
    private static array $map = [
        Move::class => [
            MoveException::class => MoveExceptionHandler::class,
        ],
        Rotate::class => [
            RotateException::class => RotateExceptionHandler::class,
        ],
    ];

    public static function handle(ICommand $command, Throwable $throwable, IQueue $queue): ICommand
    {
        $handler = self::$map[$command::class][$throwable::class] ?? DefaultExceptionHandler::class;

        return new $handler($command, $throwable, $queue);
    }
}