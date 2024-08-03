<?php 
namespace Mileage;

/**
 * Class Trip
 *
 * @package Mileage
 */
Class Trip {
    public $data;
    public $locSql = 'SELECT name FROM location';

    public function __construct(string $date, string $loc1, string $loc2, int $odo1, int $odo2, int $miles = 0){
	$this->data = [
	    $date,
	    $loc1,
	    $loc2,
	    $odo1,
	    $odo2,
	    $miles
	];
    }


    //add trip function

}
?>
