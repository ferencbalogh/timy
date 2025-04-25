<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Timy\DurationFormatter;

class DurationFormatterTest extends TestCase
{
    private DurationFormatter $formatter;

    private const SECOND = 1;
    private const MINUTE = 60 * DurationFormatter::SECOND;
    private const HOUR = 60 * DurationFormatter::MINUTE;
    private const DAY = 24 * DurationFormatter::HOUR;
    private const YEAR = 365 * DurationFormatter::DAY;

    protected function setUp(): void
    {
        $this->formatter = new DurationFormatter();
    }

    public function testNowForZeroSeconds()
    {
        $this->assertSame('now', $this->formatter->format(0));
    }

    public function testOneSecond()
    {
        $this->assertSame('1 second', $this->formatter->format(1 * DurationFormatter::SECOND));
    }

    public function testOneMinuteAndTwoSeconds()
    {
        $this->assertSame('1 minute and 2 seconds', $this->formatter->format(1 * DurationFormatter::MINUTE + 2 * DurationFormatter::SECOND));
    }

    public function testOneMinute()
    {
        $this->assertSame('1 minute', $this->formatter->format(1 * DurationFormatter::MINUTE));
    }

    public function testTwoMinutes()
    {
        $this->assertSame('2 minutes', $this->formatter->format(2 * DurationFormatter::MINUTE));
    }

    public function testFiftyNineMinutesAndFiftyNineSeconds()
    {
        $this->assertSame('59 minutes and 59 seconds', $this->formatter->format(59 * DurationFormatter::MINUTE + 59 * DurationFormatter::SECOND));
    }

    public function testOneHour()
    {
        $this->assertSame('1 hour', $this->formatter->format(1 * DurationFormatter::HOUR));
    }

    public function testOneHourOneMinuteAndTwoSeconds()
    {
        $this->assertSame('1 hour, 1 minute and 2 seconds', $this->formatter->format(1 * DurationFormatter::HOUR + 1 * DurationFormatter::MINUTE + 2 * DurationFormatter::SECOND));
    }

    public function testTwoHours()
    {
        $this->assertSame('2 hours', $this->formatter->format(2 * DurationFormatter::HOUR));
    }

    public function testOneDay()
    {
        $this->assertSame('1 day', $this->formatter->format(1 * DurationFormatter::DAY));
    }

    public function testOneDayOneHourAndOneSecond()
    {
        $this->assertSame('1 day, 1 hour and 1 second', $this->formatter->format(1 * DurationFormatter::DAY + 1 * DurationFormatter::HOUR + 1 * DurationFormatter::SECOND));
    }

    public function testTwoDays()
    {
        $this->assertSame('2 days', $this->formatter->format(2 * DurationFormatter::DAY));
    }

    public function testOneYear()
    {
        $this->assertSame('1 year', $this->formatter->format(1 * DurationFormatter::YEAR));
    }

    public function testOneYearAndTwoSeconds()
    {
        $this->assertSame('1 year and 2 seconds', $this->formatter->format(1 * DurationFormatter::YEAR + 2 * DurationFormatter::SECOND));
    }

    public function testTwoYears()
    {
        $this->assertSame('2 years', $this->formatter->format(2 * DurationFormatter::YEAR));
    }

    public function testOneYearOneDayOneHourOneMinuteAndOneSecond()
    {
        $this->assertSame('1 year, 1 day, 1 hour, 1 minute and 1 second', $this->formatter->format(1 * DurationFormatter::YEAR + 1 * DurationFormatter::DAY + 1 * DurationFormatter::HOUR + 1 * DurationFormatter::MINUTE + 1 * DurationFormatter::SECOND));
    }

    public function testHundredEightyTwoDaysOneHourFortyFourMinutesAndFortySeconds()
    {
        $this->assertSame('182 days, 1 hour, 44 minutes and 40 seconds', $this->formatter->format(182 * DurationFormatter::DAY + 1 * DurationFormatter::HOUR + 44 * DurationFormatter::MINUTE + 40 * DurationFormatter::SECOND));
    }

    public function testFourYearsSixtyEightDaysThreeHoursAndFourMinutes()
    {
        $this->assertSame('4 years, 68 days, 3 hours and 4 minutes', $this->formatter->format(4 * DurationFormatter::YEAR + 68 * DurationFormatter::DAY + 3 * DurationFormatter::HOUR + 4 * DurationFormatter::MINUTE));
    }
}