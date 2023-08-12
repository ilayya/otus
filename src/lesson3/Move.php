<?php

class Move implements IRepeatableCommand
{
    private int $repeatCount = 0;

    public function __construct(private readonly int $maxRepeats = 0)
    {
    }

    /**
     * @throws MoveException
     */
    public function Execute()
    {
        throw new MoveException();
    }

    /**
     * @param int $repeatCount
     */
    public function setRepeatCount(int $repeatCount): void
    {
        $this->repeatCount = $repeatCount;
    }

    /**
     * @return int
     */
    public function getRepeatCount(): int
    {
        return $this->repeatCount;
    }

    /**
     * @return int
     */
    public function getMaxRepeats(): int
    {
        return $this->maxRepeats;
    }
}