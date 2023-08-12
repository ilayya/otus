<?php

class CheckFuelComamnd implements ICommand
{
    public function __construct(private readonly UObject $UObject)
    {
    }

    /**
     * @throws MacroCommandException
     */
    public function execute(): void
    {
        $fuelLevel = (int)$this->UObject->getProperty('fuelLevel');

        if ($fuelLevel <= 0) {
            throw new MacroCommandException('Fuel is out');
        }
    }
}