<?php

class Rotate implements IRepeatableCommand
{
    private int $repeatCount = 0;

    public function __construct(private readonly int $maxRepeats = 0)
    {
    }

    /**
     * @throws RotateException
     */
    public function Execute()
    {
        throw new RotateException();
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