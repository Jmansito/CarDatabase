<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Get Rentals</title>
</head>

<body>
<center>

    <?php
    include 'rentalIndex.php';
    @getInput();
    function getInput(){

        if (isset($_POST['phoneNum'])){
            $_SESSION["phone"] = $_POST['phoneNum'];
            $_SESSION["starDate"] = $_POST['startDate'];
            $_SESSION["PeriodNo"] = $_POST['period'];
            $_SESSION["getTerm"] = $_POST['$dayOrWeek'];
            echo '<input type=hidden name=phoneNum value=' . $_SESSION["phone"] . '>';
            echo '<input type=hidden name=startDate value=' . $_SESSION["starDate"] . '>';
            echo '<input type=hidden name=period value=' . $_SESSION["PeriodNo"] . '>';
            echo '<input type=hidden name=$dayOrWeek value=' . $_SESSION["getTerm"] . '>';
        }
    }

    ?>

    <?php
    function getCID($PN){

        $conn = mysqli_connect("localhost", "root", "", "HW2");

        $cusQuery = "SELECT C.IdNo FROM customer AS C WHERE C.Phone = '{$PN}' LIMIT 1";
        $cusResult = mysqli_query($conn, $cusQuery);

        $getField = mysqli_fetch_object($cusResult);
        $getsCID = $getField->IdNo;

        mysqli_close($conn);
        $_SESSION["CID"] = (int)$getsCID;

    }

    ?>

    <?php
    function insertRental($CID, $carID, $term, $stDate, $days, $weeks){

        $conn = mysqli_connect("localhost", "root", "", "HW2");

        $sql = "INSERT INTO `rental` (`RentalID`, `IdNo`, `VehicleID`, `Term`, `StartDate`, `NoOfDays`, `NoOfWeeks`, `AmountDue`, `Active`, `Scheduled`)
                VALUES (NULL, '{$CID}', '{$carID}' , '{$term}', '{$stDate}', '{$days}', '{$weeks}', NULL, NULL, NULL)";

        if(mysqli_query($conn, $sql)){
            echo "<h3>Your rental has been added successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";
            echo "IT WORKED: $sql. ";

        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

    ?>

    <?php

    getCID($_SESSION["phone"]);


    if ($_SESSION["getTerm"] = "days"){
        $getTerm = "Daily";
        $noOfDays = $_SESSION["PeriodNo"];
        $noOfWeeks = 0;

    }else{
        $getTerm = "Weekly";
        $noOfDays = 0;
        $noOfWeeks = $_SESSION["PeriodNo"];
    }

    //echo $_SESSION["starDate"];
    $SDate = date_create($_SESSION["starDate"]);
    //echo $SDate;
    $periodConvert = strval($_SESSION["PeriodNo"]);
    $stringPeriod = $periodConvert . ' ' . $_SESSION["getTerm"];
    //echo $stringPeriod . "<BR>";

    $tempReturnDate = date_add($SDate, date_interval_create_from_date_string($stringPeriod));
    $_SESSION["endDate"] = date_format( $tempReturnDate, "Y-m-d");

    include 'getAvailableRentals.php';

    if (isset($_POST['pickCar'])){
        $_SESSION["getCar"] = $_POST['pickCar'];
        insertRental($_SESSION["CID"], $_SESSION["getCar"], $getTerm, $_SESSION["starDate"], $noOfDays, $noOfWeeks);
    }


?>

</center>
</body>
</html>
