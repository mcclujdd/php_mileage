<?php declare(strict_types=1);
namespace Tests;
use PHPUnit\Framework\TestCase;
use Mileage\Trip;

class TripTest extends TestCase {
    // test things

    public function testTripDataArrayExists(): void
    {
        $data = [
            "date"=>"2024-01-01",
            "loc1"=>"Lawrence",
            "loc2"=>"Lowell",
            "odo1"=>1000,
            "odo2"=>1017,
            "miles"=>17,
        ];
        $trip = new Trip(...$data);
        $this->assertNotEmpty($trip->data);
    }

    /*
    public function testTripObjInit(): void
    {
        $trip = new Trip();
        $tripData = Trip()->getData()
    }
     */
}

?>
