<!DOCTYPE html>
<html>

<head>
    <title>Returns</title>
</head>

<body>
<center>
    <?php
    include 'returnIndex.php';

    $username = "root";
    $password = "";
    $database = "HW2";
    $mysqli = new mysqli("localhost", $username, $password, $database);
    $conn = mysqli_connect("localhost", "root", "", "HW2");

    $Phone = $_REQUEST['Phone'];
    $AmountDue = 0;
    $customer ='';
    $totalDue = 0;

    //Rental table
    $query = "select * FROM rental, customer where rental.`IdNo` = customer.`IdNo` AND customer.`Phone` = '$Phone'";
    $carResult = mysqli_query($conn, $query);

if($carResult) {
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $AmountDue = $row["AmountDue"];
            $IdNo = $row["IdNo"];

            //Delete query
            $sql = "DELETE FROM rental WHERE '$IdNo' = Idno ";

            if ($conn->query($sql) === TRUE) {
                echo "<h2>Your car has been returned and $", $AmountDue, " has been charged to your card on file.</h2>";
            } else {
                echo "Error returning car: " . $conn->error;
            }
        }
        $result->free();
    }
}
else{echo "There are no available cars!";}

    ?>

</center>
</body>

</html>
