<?php
$title = "Rental";
$content = '<!DOCTYPE html>
<html lang="en">
<center>
<head>
    <meta charset="UTF-8">
    <h1>Return a rental!</h1>
    <h3>Please enter your customer information to return your rental:</h3>
</head>
<body>
<form action="changeRates.php" method="POST">
    <p>
        <label for="Model">Customer Name (L.Firstname):</label>
        <input type="text" name="Name" id="Name">
    </p>
    <p>
        <label for="Year">Phone number(000-000-0000):</label>
        <input type="number" name="Phone" id="Phone">
    </p>
    <form id="s" method="post">
<select name="confirm">
    <option value="yes">Yes</option>
    <option value="no">No</option>
    </form>
    <input type="submit" value="Are you sure?">
</form>
</select>


</body>
</center>
</html>';

include 'Template.php';
?>