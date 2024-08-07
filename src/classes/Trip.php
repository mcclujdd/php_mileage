<?php 
namespace Mileage;

/**
 * Class Trip
 *
 * @package Mileage
 */
Class Trip {
    public $DBH;
    public $locSql = 'SELECT DISTINCT name FROM locations';

    public function __construct( $DBH ) {
	$this->DBH = $DBH;
    }


    //add trip function
    public function addTrip(array $newEntryData){
	$DBH = $this->DBH;
	$sql = "
	    INSERT INTO `trips` (
		date,
		location1,
		location2,
		odometer1,
		odometer2,
		trip_mi
		)
	    VALUES (
		'$newEntryData[0]',
		'$newEntryData[1]',
		'$newEntryData[2]',
		$newEntryData[3],
		$newEntryData[4],
		$newEntryData[5]
		)       
	    ";
	    $DBH->query($sql);
    }

    public function getTrips($limit = 20){
	$DBH = $this->DBH;
	$sql = "SELECT date, location1, location2, odometer1, odometer2, trip_mi
	    FROM trips
	    ORDER BY date DESC, odometer2 DESC
	    LIMIT $limit";
	$STH = $DBH->query($sql);
	$STH->setFetchMode(\PDO::FETCH_ASSOC);
	$trips = $STH->fetchAll();
	//escape data
	array_walk($trips, function(&$trip){
	    array_walk($trip, function(&$value){
		$value = htmlspecialchars($value);
	    });
	});
	return $trips;
    }

    public function getLocations(){
	$DBH = $this->DBH;
	$STH = $DBH->query($this->locSql);
	$STH->setFetchMode(\PDO::FETCH_ASSOC);
	$locations = $STH->fetchAll();
	return $locations;
    }
}
?>
