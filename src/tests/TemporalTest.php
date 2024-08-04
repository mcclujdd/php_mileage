<?php declare(strict_types=1);
namespace Tests;
use PHPUnit\Framework\TestCase;
use Mileage\Temporal;

#[CoversClass(Temporal::class)]
class TemporalTest extends TestCase {

    public function testGetToday(): void
    {
        $temporal = new Temporal();
        $today = $temporal->get_today();
        $this->assertSame($today, date("Y-m-d"));
    }

    public function testGetTodayFailure(): void
    {
        $temporal = new Temporal();
        $today = $temporal->get_today();
        $this->assertNotSame($today, date("y-m-d"));
        $this->assertNotSame($today, "1970-01-01");
    }

}
