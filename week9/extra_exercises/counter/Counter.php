<?php
# Enter code here
class Counter
{
    public $count;

    function __construct($v)
    {
        $this->count = $v;
    }

    function getValue()
    {
        return $this->count;
    }

    function setValue($newValue)
    {
        $this->count = $newValue;
    }

    function increment()
    {
        $this->count++;
    }

    function decrement()
    {
        $this->count--;
    }

    function reset()
    {
        $this->count = 0;
    }
}
