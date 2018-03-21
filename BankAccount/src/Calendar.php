<?php

namespace nestorbs;

class Calendar
{
    public function todayAsString()
    {
        return $this->today()->format('d/m/Y');
    }

    protected function today()
    {
        return new \DateTime();
    }
}
