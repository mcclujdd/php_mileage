<?php
include_once './locations.php';
include_once './_db.php';
include_once './functions.php';
?>

<html>
<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mileage</title>
</head>
    <body>
    <p>Index Page loaded. Today's date is <?php echo get_today(); ?>.</p>
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

