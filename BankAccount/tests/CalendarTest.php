<?php

namespace nestorbs\Test;

use PHPUnit\Framework\TestCase;
use nestorbs\Calendar;

class CalendarTest extends TestCase
{
    /** @test */
    public function should_return_today_in_format_d_m_Y()
    {
        $calendar = new StubCalendar();

        $date = $calendar->todayAsString();

        $this->assertEquals('10/03/2018', $date);
    }
}
class StubCalendar extends Calendar
{
    protected function today()
    {
        return new \DateTime('03/10/2018');
    }
}
