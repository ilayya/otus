<?php

class BurnFuelCommand implements ICommand
{
    public function __construct(private readonly UObject $UObject)
    {
    }

    public function execute(): void
    {
        $fuelLevel = $this->UObject->getProperty('fuelLevel');
        $fuelRate = $this->UObject->getProperty('fuelRate');

        $this->UObject->setProperty('fuelLevel', $fuelLevel - $fuelRate);
    }
}