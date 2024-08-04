<?php
require_once 'vendor/autoload.php';
include_once './_db.php';

var_dump($_POST);   

$temporal = new Mileage\Temporal();
$today = $temporal->get_today();
$values = [];
$tData = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $date = $_POST['tripDate'];
    $loc1 = $_POST['startLoc'];
    $loc2 = $_POST['endLoc'];
    $odo1 = $_POST['startOdo'];
    $odo2 = $_POST['endOdo'];
    $miles = $_POST['tripMiles'];

    //$trip = new Mileage\Trip(...$tData);
    $sql = "
        INSERT INTO `trip` (
            date,
            location1,
            location2,
            odometer1,
            odometer2,
            trip_mi
            )
        VALUES (
            '$date',
            '$loc1',
            '$loc2',
            $odo1,
            $odo2,
            $miles
            )       
        ";
} else {
    $tData = [];
}
$DBH->query($sql);

?>

<html>
<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mileage app</title>
</head>
    <body>
    <p>Index Page loaded. Today's date is <?= $today ?>.</p>
    <span>New Entry</span>
    <form method=post action=index.php>
        <label>Date</label>
        <input type=text name="tripDate"></br>
        <label>Start Odo</label>
        <input type=text name="startOdo"></br>
        <label>End Odo</label>
        <input type=text name="endOdo"></br>
        <label>Start Loc</label>
        <input type=text name="startLoc"></br>
        <label>End Loc</label>
        <input type=text name="endLoc"></br>
        <label>Trip Miles</label>
        <input type=text name="tripMiles"></br>
        <button type=submit>Submit</button>
    </form>
    <table>
        <th>date</th>
        <th>starting odometer</th>
        <th>ending odometer</th>
        <th>starting location</th>
        <th>ending location</th>
        <th>trip miles</th>
    </table>
    </body>
</html>

