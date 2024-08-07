<?php
require_once 'vendor/autoload.php';
include_once './_db.php';

$temporal = new Mileage\Temporal();
$trip = new Mileage\Trip($DBH);
$today = $temporal->get_today();
$values = [];
$tHeaders = ['Date', 'Location1', 'Location2', 'Odometer1', 'Odometer2', 'Trip Miles'];
$tData = [];
$newEntryData = [];
$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $date = $_POST['tripDate'] ?? $today;
    $loc1 = $_POST['startLoc'] ?? '';
    $loc2 = $_POST['endLoc'] ?? '';
    $odo1 = $_POST['startOdo'] ?? 0;
    $odo2 = $_POST['endOdo'] ?? 0;
    $miles = 0;
    //validate odometer readings
    if (!is_numeric($odo1) || !is_numeric($odo2)){
        echo "<p style='color:red'>Odometer readings must be numbers</p>";
        $error = true;
    } else {
        $miles = $odo2 - $odo1;
    }

    $newEntryData = [$date, $loc1, $loc2, $odo1, $odo2, $miles];
    //escape data
    array_walk($newEntryData, function(&$value){
        $value = htmlspecialchars($value);
    });
    
    //check for empty fields
    foreach ($newEntryData as $value){
        if (empty($value)){
            echo "<p style='color:red'>Please fill out all fields</p>";
            $error = true;
            break;
        }
    }

    if (!$error){
        $trip->addTrip($newEntryData);
        header('Location: index.php');
        //header('Location: confirm.php');
    }
}
$tripData = $trip->getTrips(78);
foreach ($tripData as $trip){
    $tData[] = $trip['date'];
    $tData[] = $trip['location1'];
    $tData[] = $trip['location2'];
    $tData[] = $trip['odometer1'];
    $tData[] = $trip['odometer2'];
    $tData[] = $trip['trip_mi'];
}

include_once 'includes/header.php';
?>

<html>
<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mileage app</title>
</head>
    <body>
    <p>Today's date is <?= $today ?>.</p>
    <span>New Entry</span>
    <form method=post action=index.php>
        <label>Date</label>
        <input type=text name="tripDate" value=<?=$today?>></br>
        Start Odo:<input type=text name="startOdo"></br>
        <label>End Odo</label>
        <input type=text name="endOdo"></br>
        <label>Start Loc</label>
        <input type=text name="startLoc"></br>
        <label>End Loc</label>
        <input type=text name="endLoc"></br>
        <button type=submit>Submit</button>
    </form>
    <table>
        <tr>
            <?php foreach ($tHeaders as $h){ ?>
                <th><?= $h ?></th>
            <?php } ?>
        </tr>
        <?php foreach ($tripData as $trip){ ?>
            <tr>
            <?php foreach ($trip as $d){ ?>
                <td><?= $d ?></td>
            <?php } ?>  
            </tr>
        <?php } ?>
    </table>

<?php include_once 'includes/footer.php'; ?>

