<?php

class Move implements ICommand
{

    /**
     * @throws MoveException
     */
    public function Execute()
    {
        throw new MoveException();
    }
}