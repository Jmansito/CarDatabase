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
    $phoneNumber = "";
    $startDate = "";
    $rentalPeriod = "";
    $dayOrWeek = "";
    $SelectedCar = "";

    if (isset($_POST['phoneNum']) OR isset($_POST['startDate']) OR isset($_POST['rentalPeriod']) OR isset($_POST['darOrWeek']))
    {
        $phoneNumber = $_REQUEST['phoneNum'];
        $startDate = $_REQUEST['startDate'];
        $rentalPeriod = $_REQUEST['period'];
        $dayOrWeek = $_POST['dayOrWeek'];
    }
    else
    {
        $phoneNumber = "";
        $SelectedCar = "";
        $rentalPeriod = "";
        $dayOrWeek = "";
    }

    $SDate = date_create($startDate);
    $periodConvert = strval($rentalPeriod);
    $stringPeriod = $periodConvert . ' ' . $dayOrWeek;

    $tempReturnDate = date_add($SDate, date_interval_create_from_date_string($stringPeriod));
    $ReturnDate = date_format( $tempReturnDate, "Y-m-d");

    // PANDA VERSION

    $cusQuery = "SELECT C.IdNo FROM customer AS C, rental AS R WHERE C.Phone = '$phoneNumber' LIMIT 1";
    $cusResult = mysqli_query($link, $cusQuery);
    $getField = mysqli_fetch_object($cusResult);
    $getCID = $getField->IdNo;
    //echo "CID: " . $getCID . "<br>";

    $query = "SELECT C.VehicleID, C.Model, C.Year, C.Car_Type FROM car AS C LEFT OUTER JOIN rental R ON C.VehicleID = R.VehicleID
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



    $SelectedCar = "";
    if (isset($_POST['pickCar']))
    {
        $SelectedCar = $_POST['pickCar'];

        if ($dayOrWeek = "days"){
            $sql = "INSERT INTO `rental` (`RentalID`, `IdNo`, `VehicleID`, `Term`, `StartDate`, `NoOfDays`, `NoOfWeeks`, `AmountDue`, `Active`, `Scheduled`)
                VALUES (NULL, '$getCID', '$SelectedCar' , 'Daily', '$startDate', '$rentalPeriod', '0', NULL, NULL, NULL)";
        }

        if ($dayOrWeek = "weeks"){
            $sql = "INSERT INTO `rental` (`RentalID`, `IdNo`, `VehicleID`, `Term`, `StartDate`, `NoOfDays`, `NoOfWeeks`, `AmountDue`, `Active`, `Scheduled`)
                VALUES (NULL, '$getCID', '$SelectedCar', 'Weekly', '$startDate', '0', '$rentalPeriod', NULL, NULL, NULL);";
        }

        if(mysqli_query($link, $sql)){
            echo "<h3>Your rental has been added successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";


        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($link);
        }

    }
    else
    {
        $SelectedCar = "";
    }

    echo $SelectedCar;




    mysqli_close($link);



?>

</center>
</body>

</html>
