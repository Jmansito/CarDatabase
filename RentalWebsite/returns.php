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

    //Rental table

    $query = "select * FROM rental, customer where rental.`IdNo` = customer.`IdNo` AND customer.`Phone` = '$Phone'";

    $carResult = mysqli_query($conn, $query);

if($carResult) {
    echo '<table cellspacing="2" cellpadding="2"  > 
      <tr> 
           <td> <b><font face="Arial">Your Amount Due</font></b> </td> 

      </tr>';
    if ($result = $mysqli->query($query)) {
        echo '<h3>Active Rentals</h3>';
        while ($row = $result->fetch_assoc()) {
            $AmountDue = $row["AmountDue"];
            $IdNo = $row["IdNo"];

            echo '<tr> 
                  
                  <td><center>' . $AmountDue . '</center></td>
                    <form id="s" method="post">
                    <select name="confirm">
                    <option value="no">----</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    </form>
                    <input type="submit" value="Return?">
                    
              </tr>';
            $return = $_POST['confirm'];
            if($return == 'yes'){
                //Delete query
                $sql = "DELETE FROM rental WHERE '$IdNo' = Idno ";

                if ($conn->query($sql) === TRUE) {
                    echo "Your car has been returned and amount due charged to your card on file.";
                } else {
                    echo "Error returning car: " . $conn->error;
                }

            }

        }
        $result->free();
    }
}
else{
        echo "There are no available cars!";
    }

//submit button to return car
    //DELETE query to remove rental from table



    ?>

</center>
</body>

</html>
