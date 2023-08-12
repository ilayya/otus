<?php

class ExceptionHandler
{
    public const MAX_REPEAT_COUNT_KEY = 'maxRepeatCount';
    public const REPEAT_COUNT_KEY = 'repeatCount';
    public const HANDLER_KEY = 'handler';
    public const RESERVE_HANDLER_KEY = 'reserveHandler';

    public function __construct(private readonly array $map)
    {
    }

    public function handle(ICommand $command, Throwable $throwable, IQueue $queue): ICommand
    {
        $handlerMap = $this->map[$command::class][$throwable::class];

        $handler = $handlerMap[self::HANDLER_KEY];

        if (($handlerMap[self::MAX_REPEAT_COUNT_KEY] ?? 0) > 0) {
            $handlerMap[self::REPEAT_COUNT_KEY]++;

            if ($handlerMap[self::REPEAT_COUNT_KEY] > $handlerMap[self::MAX_REPEAT_COUNT_KEY]) {
                $handler = $handlerMap[self::RESERVE_HANDLER_KEY];
            }
        }

        return new $handler($command, $throwable, $queue);
    }
}