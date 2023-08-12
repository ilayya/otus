<?php

declare(strict_types=1);

interface IRepeatableCommand extends ICommand
{
    public function getRepeatCount(): int;

    public function setRepeatCount(int $repeatCount): void;

    public function getMaxRepeats(): int;
}