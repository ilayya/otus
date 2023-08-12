<?php

class MoveCommand implements ICommand
{
    public function __construct(private readonly UObject $UObject)
    {
    }

    public function execute(): void
    {
        $this->UObject->setProperty(
            'Position',
            Vector::plus(
                $this->UObject->getProperty('Position'),
                $this->UObject->getProperty('Velocity'),
            )
        );
    }
}