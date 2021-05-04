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
<form action="returns.php" method="POST">
    <p>
        <label for="Year">Phone number(000-000-0000):</label>
        <input type="text" name="Phone" id="Phone">
    </p>
    <form id="s" method="post">
    <select name="confirm">
    <option value="no">----</option>
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