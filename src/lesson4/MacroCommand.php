'<?php

class MacroCommand
{
    /**
     * @param ICommand[] $commands
     */
    public function __construct(private readonly array $commands)
    {
    }

    /**
     * @throws MacroCommandException
     */
    public function execute(): void
    {
        try {
            foreach ($this->commands as $command) {
                $command->execute();
            }
        } catch (Throwable $e) {
            throw new MacroCommandException('Macrocommand is failed');
        }
    }
}