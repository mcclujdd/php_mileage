<?php
require_once 'vendor/autoload.php';

$temporal = new Mileage\Temporal();
$today = $temporal->get_today();

$trip = new Mileage\Trip();
$tSql = $trip->locSql;
var_dump($tSql);

include_once './_db.php';

?>

<html>
<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mileage</title>
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

