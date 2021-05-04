<?php
$title = "Rental";
$content = '<!DOCTYPE html>
<html lang="en">
<center>
<head>
    <meta charset="UTF-8">
    <h1>Change rates of cars!</h1>
</head>
<body>
<form action="changeRates.php" method="POST">
   <h3>Please enter a new amount for your preferred car type and rental period:</h3>
    <form id="s" method="post">
  
    <label for="rate">New Rate:</label>
    <input type="text" name="newRate" id="newRate">
 
    <select name="CarType">
    <option value="Compact">Compact</option>
    <option value="Large">Large</option>
    <option value="Medium">Medium</option>
    <option value="SUV">SUV</option>
    <option value="Truck">Truck</option>
    <option value="Van">Van</option>
    </select>
    <form id="DailyOrWeekly" method="post">
    <select name="DailyOrWeekly">
    <option value="Daily">Change Daily</option>
    <option value="Weekly">Change Weekly</option>
    </select>
    <input type="submit" value="Submit">
    </form>

</body>
</center>
</html>';

include 'Template.php';
?>