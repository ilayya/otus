<?php

interface IQueue
{
    public function push(ICommand $item);

    public function pop(): ?ICommand;
}