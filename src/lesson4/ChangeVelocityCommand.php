<?php

class ChangeVelocityCommand implements ICommand
{

    public function __construct(private readonly UObject $UObject)
    {
    }

    public function execute(): void
    {
        $this->UObject->setProperty(
            'Velocity',
            Vector::plus(
                $this->UObject->getProperty('Velocity'),
                $this->UObject->getProperty('Acceleration'),
            )
        );
    }
}