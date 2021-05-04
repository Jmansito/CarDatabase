<?php
$title = "Rental";
$content = '<!DOCTYPE html>
<html lang="en">
<center>
<head>
    <meta charset="UTF-8">
    <h1>Find a rental!</h1>
    <h3>Testing: Currently using temp return date, and 2020-04-29 as startDate</h3>
</head>
<body>
<form action="showRentals.php" method="POST">
    <p>
        <label for="PhoneNum">Enter phone number associated with your account:</label>
        <input type="text" name="phoneNum" id="phoneNum" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
        <small>Format: 123-456-7890</small>
    </p>
    <p>
        <label for="Model">Start date needed:</label>
        <input type="text" name="startDate" id="startDate" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
        <small>Format: yyyy-mm-dd</small>
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

Include 'Template.php';
?>
