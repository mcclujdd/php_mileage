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

}
?>
