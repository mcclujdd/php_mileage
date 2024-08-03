<?php declare(strict_types=1);
namespace Tests;
use PHPUnit\Framework\TestCase;
use Mileage\Trip;

class TripTest extends TestCase {
    // test things
    public function testLocSqlIsStr(): void
    {
        $trip = new Trip();

        $sql = $trip->locSql;

        $this->assertSame('SELECT name FROM location', $sql);
    }
}

?>
