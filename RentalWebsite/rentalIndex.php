<?php
$title = "Rental";
$content = '<!DOCTYPE html>
<html lang="en">
<center>
<head>
    <meta charset="UTF-8">
    <h1>Find a rental!</h1>
    <h3>All of our rentals went live on 2021-04-29! </h3>
    <p>Hint: The start date needs to be on or after that date</p>
</head>
<body>
<form action="showRentals.php" method="POST">
    <p>
        <label for="Model">Start date needed?(yyyy-mm-dd):</label>
        <input type="text" name="startDate" id="startDate">
    </p>
    <p>
        <label for="Year">How long do you need the vehicle?:</label>
        <input type="number" name="period" id="period">
  
    <form id="s" method="post">
    <select name="dayOrWeek">
    <option value="days">days</option>
    <option value="weeks">weeks</option>
    </select>
    </p>
    <br>
    <input type="submit" value="Submit">
    </form>
</form>
</body>
</center>
</html>';

include 'Template.php';
?>
