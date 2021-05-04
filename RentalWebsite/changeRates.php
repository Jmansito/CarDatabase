<?php
include 'ratesIndex.php';

$conn = mysqli_connect("localhost", "root", "", "HW2");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$newRate = '';
$newRate = urlencode($_REQUEST['newRate']);
$newRate_float_value = floatval($newRate);
$DailyOrWeekly = $_REQUEST['DailyOrWeekly'];
$CarType = $_REQUEST['CarType'];


if($DailyOrWeekly == 'Weekly') {

    $sql = "UPDATE `cartype` 
            SET `WeeklyRate` = '$newRate_float_value' 
            WHERE `cartype`.`CarType` = '$CarType'";

    if (mysqli_query($conn, $sql)) {
        echo "<h3>Weekly Rates changed successfully!</h3>";

    } else {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
else if($DailyOrWeekly == 'Daily'){
    $sql = "UPDATE `cartype` 
            SET `DailyRate` = '$newRate' 
            WHERE `cartype`.`CarType` = '$CarType'";

    if (mysqli_query($conn, $sql)) {
        echo "<h3>Daily Rates changed successfully!</h3>";

    } else {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
//CarType table
$username = "root";
$password = "";
$database = "HW2";
$mysqli = new mysqli("localhost", $username, $password, $database);
$query = "SELECT * FROM cartype";

echo '<table cellspacing="2" cellpadding="2" > 
      <tr> 
          <td> <b><font face="Arial">CarType</font></b> </td> 
          <td> <b><font face="Arial">EffectiveDate</font></b> </td> 
          <td> <b><font face="Arial">DailyRate</font></b> </td> 
          <td> <b><font face="Arial">WeeklyRate</font></b> </td> 
      </tr>';
if ($result = $mysqli->query($query)) {
    echo'<h3>Car Types</h3>';
    while ($row = $result->fetch_assoc()) {
        $CTField1 = $row["CarType"];
        $CTField2 = $row["EffectiveDate"];
        $CTField3 = $row["DailyRate"];
        $CTField4 = $row["WeeklyRate"];

        echo '<tr> 
                  <td>'.$CTField1.'</td> 
                  <td>'.$CTField2.'</td> 
                  <td>'.$CTField3.'</td> 
                  <td>'.$CTField4.'</td> 
              </tr>';
    }
    $result->free();
}
else{
    die('I agree, they are great just how they are.');
}