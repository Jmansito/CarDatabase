<body>
<?php

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label> Select one of the available cars:<br></label>
    <select name="pickCar">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "HW2");

        $query = "SELECT C.VehicleID, C.Model, C.Year, C.CarType FROM car AS C LEFT OUTER JOIN rental R ON C.VehicleID = R.VehicleID
              WHERE NOT(('{$_SESSION["starDate"]}' <= R.ActualReturnDate) AND (R.StartDate <= '{$_SESSION["endDate"]}')) OR (R.StartDate IS NULL)";

        $carResult = mysqli_query($conn, $query);

        if($carResult){
            while ($row = mysqli_fetch_assoc($carResult)){
                ?>
                <option value = "<?php echo $row['VehicleID']; ?>"> <?= $row['Model']; ?> | <?= $row['Year']; ?> | <?= $row['CarType']; ?></option>;
                <?php
            }
        }else{
            echo "There are no available cars!";
        }
        ?>

    </select>
    <input type="submit" value="Select" />
</form>

</body>

