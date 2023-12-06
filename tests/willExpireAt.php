<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Carbon\Carbon;
use DTApi\Helpers\QNHelper;

class willExpireAt extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testWillExpireAtWhenDifferenceIsLessThanOrEqualTo90()
    {
        Carbon::setTestNow(Carbon::now());

        $dueTime = Carbon::now()->addHours(10);
        $createdAt = Carbon::now()->subHours(5);

        $result = QNHelper::willExpireAt($dueTime, $createdAt);

        $this->assertEquals($dueTime->format('Y-m-d H:i:s'), $result);

        Carbon::setTestNow();
    }

    public function testWillExpireAtWhenDifferenceIsLessThanOrEqualTo24()
    {
        Carbon::setTestNow(Carbon::now());

        $dueTime = Carbon::now()->addHours(10);
        $createdAt = Carbon::now()->subHours(23);

        $result = QNHelper::willExpireAt($dueTime, $createdAt);

        $expectedResult = $createdAt->addMinutes(90)->format('Y-m-d H:i:s');

        $this->assertEquals($expectedResult, $result);

        Carbon::setTestNow();
    }

    public function testWillExpireAtWhenDifferenceIsBetween24And72()
    {
        Carbon::setTestNow(Carbon::now());

        $dueTime = Carbon::now()->addHours(10);
        $createdAt = Carbon::now()->subHours(50);

        $result = QNHelper::willExpireAt($dueTime, $createdAt);

        $expectedResult = $createdAt->addHours(16)->format('Y-m-d H:i:s');

        $this->assertEquals($expectedResult, $result);

        Carbon::setTestNow();
    }

    public function testWillExpireAtWhenDifferenceIsGreaterThan72()
    {
        Carbon::setTestNow(Carbon::now());

        $dueTime = Carbon::now()->addHours(10);
        $createdAt = Carbon::now()->subHours(80);

        $result = QNHelper::willExpireAt($dueTime, $createdAt);

        $expectedResult = $dueTime->subHours(48)->format('Y-m-d H:i:s');

        $this->assertEquals($expectedResult, $result);

        Carbon::setTestNow();
    }
}
