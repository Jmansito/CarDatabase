<?php
$title = "Return";
$content = '<!DOCTYPE html>
<html lang="en">
<center>
<head>
    <meta charset="UTF-8">
    <h1>Return a rental!</h1>
    <h3>Please enter your customer information to return your rental:</h3>
</head>
<body>
<form action="returns.php" method="POST">
    <p>
        <label for="PhoneNum">Enter phone number associated with your account:</label>
        <input type="text" name="Phone" id="Phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
        <small>Format: 123-456-7890</small>
    </p>
    <form id="s" method="post">
    <select name="confirm">
    <option value="no">----</option>
    <option value="yes">Yes</option>
    <option value="no">No</option>
    </form>
    <input type="submit" value="Confirm to return your car and pay amount due">
</form>
</select>


</body>
</center>
</html>';

include 'Template.php';
?>