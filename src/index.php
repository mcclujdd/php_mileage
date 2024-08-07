<?php
require_once 'vendor/autoload.php';
include_once './_db.php';
include_once 'includes/header.php';

//var_dump($_POST);   

$temporal = new Mileage\Temporal();
$today = $temporal->get_today();
$values = [];
$tHeaders = ['Date', 'Location1', 'Location2', 'Odometer1', 'Odometer2', 'Trip Miles'];
$tData = [];
$newEntryData = [];
$error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $date = $_POST['tripDate'] ?? $today;
    $loc1 = $_POST['startLoc'];
    $loc2 = $_POST['endLoc'];
    $odo1 = $_POST['startOdo'];
    $odo2 = $_POST['endOdo'];
    $miles = $_POST['tripMiles'];
    $newEntryData = [$date, $loc1, $loc2, $odo1, $odo2, $miles];
    //escape data
    array_walk($tData, function(&$value){
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
        $trip = new Mileage\Trip($DBH);
        $trip->addTrip($newEntryData);
    }
}
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
        <label>Trip Miles</label>
        <input type=text name="tripMiles"></br>
        <button type=submit>Submit</button>
    </form>
    <table>
<tr>
<?php foreach ($tHeaders as $h){ ?>
    <th><?= $h ?></th>
<?php } ?>
</tr>
<?php foreach ($tData as $d){ ?>
    <td><?= $d ?></td>
<?php } ?>  
    </table>

<?php include_once 'includes/footer.php'; ?>

