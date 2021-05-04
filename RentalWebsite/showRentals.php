<!DOCTYPE html>
<html>

<head>
    <title>Get Rentals</title>
</head>

<body>
<center>
    <?php
    include 'rentalIndex.php';

    $link = mysqli_connect("localhost", "root", "", "HW2");

    //$username = "root";
    //$password = "";
    //$database = "HW2";
    //$mysqli = new mysqli("localhost", $username, $password, $database);

    $startDate = $_REQUEST['startDate'];
    $SDate = date_create($startDate);
    $rentalPeriod = $_REQUEST['period'];
    $dayOrWeek = $_POST['dayOrWeek'];
    $periodConvert = strval($rentalPeriod);
    $stringPeriod = $periodConvert . ' ' . $dayOrWeek;

    $tempReturnDate = date_add($SDate, date_interval_create_from_date_string($stringPeriod));
    $ReturnDate = date_format( $tempReturnDate, "Y-m-d");
    echo "StartDate: " . $startDate . "<br>";
    echo "ReturnDate: " . $ReturnDate;

    // PANDA VERSION



    $query = "SELECT C.VehicleID, C.Model, C.Year, C.CarType FROM car AS C LEFT OUTER JOIN rental R ON C.VehicleID = R.VehicleID
              WHERE NOT(('$startDate' <= R.ActualReturnDate) AND (R.StartDate <= '$ReturnDate')) OR (R.StartDate IS NULL);";

    $result = mysqli_query($link, $query);
    //$NumOfResult = mysqli_num_rows($result);
    //echo $NumOfResult;

    echo '<label> Select one of the available cars:<br>';
    echo '<form id = "lame" method="post">';
    echo '<select name="pickCar">';

    while ($row = mysqli_fetch_array($result)){
        $VID = $row['VehicleID'];
        $CarModel = $row['Model'];
        echo '<option value = "' .$VID. '">' .$CarModel. '</option>';
            }


    echo '</select>';
    echo '</label>';
    echo '<input type="submit" value="Submit" />';
    echo '</form>';

    $SelectedCar = $_POST['pickCar'];
    echo $SelectedCar;

    mysqli_close($link);



?>

</center>
</body>

</html>
