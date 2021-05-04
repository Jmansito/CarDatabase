<?php
$title = "Customer";
$content = '<!DOCTYPE html>
<html lang="en">
<center>
<head>
    <meta charset="UTF-8">
    <h1>Add Customer Form</h1>
</head>
<body>
<form action="insertCustomer.php" method="post">
    <p>
        <label for="Name">L.FirstName:</label>
        <input type="text" name="Name" id="Name">
    </p>
    <p>
        <label for="Phone">Phone Number:</label>
        <input type="text" name="Phone" id="PhoneNumber" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
        <small>Format: 123-456-7890</small>
    </p>
    <input type="submit" value="Submit">
</form>
</body>
</center>
</html>';

include 'Template.php';
?>