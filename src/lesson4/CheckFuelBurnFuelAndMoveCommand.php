<?php

class CheckFuelBurnFuelAndMoveCommand implements ICommand
{
    public function __construct(
        private readonly ICommand $moveCommand,
        private readonly ICommand $burnFuelCommand,
        private readonly ICommand $checkFuelCommand,
    )
    {

    }

    /**
     * @throws MacroCommandException
     */
    public function execute(): void
    {
        (new MacroCommand([
            $this->moveCommand,
            $this->burnFuelCommand,
            $this->checkFuelCommand,
        ]))->execute();
    }
}