<?php 
require_once "vendor/autoload.php";
$trip = new Mileage\Trip();

$start_account = '';
$end_account = '';
$message = '';
$valid = '';
$locations = $trip->locations;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $start_account = $_POST['start_account'] ?? ''; 
    $end_account = $_POST['end_account'] ?? ''; 
    $valid = in_array($start_account, $locations) & in_array($end_account, $locations);
    $message = $valid ? "Thank you" : "Please Select Start and End Locations";
}
?>

<?= $message ?>
<form action='Trip.php' method='post'>
    </br><span>Starting Location: </span>
    <?php foreach ($locations as $opt1) {?>
        <?= $opt1 ?><input type=radio name='start_account' value='<?= $opt1 ?>' <?= ($start_account == $opt1) ? 'checked' : '' ?>>
    <?php }?>

    </br><span>Ending Location: </span>
    <?php foreach ($locations as $opt2) {?>
        <?= $opt2 ?><input type=radio name='end_account' value='<?= $opt2 ?>' <?= ($end_account == $opt2) ? 'checked' : '' ?>>
    <?php }?>
    </br>
    <input type='submit' value='Save'>
</form>
