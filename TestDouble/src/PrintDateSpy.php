<?php

namespace nestorbs;

class PrintDateSpy extends PrintDate
{
    protected $dateCalled;

    public function printCurrentDate()
    {
        echo date('Y-m-d H:i:s');
        $this->dateCalled = true;
    }

    public function dateWasCalled()
    {
        return $this->dateCalled;
    }
}
