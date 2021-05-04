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
    $Phone = $_REQUEST['Phone'];
    $AmountDue = 0;

    //Rental table
    //Printing full table for now until trigger is made
    //Only print out the rental for the customer
    $query = "SELECT * FROM rental";

    echo '<table cellspacing="2" cellpadding="2"  > 
      <tr> 
          <td> <b><font face="Arial">RentalID</font></b> </td> 
          <td> <b><font face="Arial">IdNo</font></b> </td> 
          <td> <b><font face="Arial">VehicleID</font></b> </td> 
          <td> <b><font face="Arial">Term</font></b> </td> 
          <td> <b><font face="Arial">StartDate</font></b> </td>
          <td> <b><font face="Arial">DailyTerm</font></b> </td>
          <td> <b><font face="Arial">WeeklyTerm</font></b> </td>
          <td> <b><font face="Arial">NoOfDays</font></b> </td>
          <td> <b><font face="Arial">NoOfWeeks</font></b> </td>
          <td> <b><font face="Arial">ActualReturnDate</font></b> </td>
          <td> <b><font face="Arial">AmountDue</font></b> </td>
          <td> <b><font face="Arial">Active</font></b> </td>
          <td> <b><font face="Arial">Scheduled</font></b> </td>
      </tr>';
    if ($result = $mysqli->query($query)) {
        echo'<h3>Active Rentals</h3>';
        while ($row = $result->fetch_assoc()) {
            $RentalField1 = $row["RentalID"];
            $RentalField2 = $row["IdNo"];
            $RentalField3 = $row["VehicleID"];
            $RentalField4 = $row["Term"];
            $RentalField5 = $row["StartDate"];
            $RentalField6 = $row["DailyTerm"];
            $RentalField7 = $row["WeeklyTerm"];
            $RentalField8 = $row["NoOfDays"];
            $RentalField9 = $row["NoOfWeeks"];
            $RentalField10 = $row["ActualReturnDate"];
            $RentalField11 = $row["AmountDue"];
            $RentalField12= $row["Active"];
            $RentalField13 = $row["Scheduled"];

            echo '<tr> 
                  <td>'.$RentalField1.'</td> 
                  <td>'.$RentalField2.'</td> 
                  <td>'.$RentalField3.'</td> 
                  <td>'.$RentalField4.'</td> 
                  <td>'.$RentalField5.'</td> 
                  <td>'.$RentalField6.'</td> 
                  <td>'.$RentalField7.'</td> 
                  <td>'.$RentalField8.'</td> 
                  <td>'.$RentalField9.'</td> 
                  <td>'.$RentalField10.'</td> 
                  <td>'.$RentalField11.'</td> 
                  <td>'.$RentalField12.'</td> 
                  <td>'.$RentalField13.'</td> 
              </tr>';
            $AmountDue = $RentalField11;
        }
        $result->free();
    }

    echo '<tr><h3>Is this your rental?</h3>
            <select name="confirm">
            <option value="no">----</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
            </form>
            <input type="submit" value="Submit">
            </form>
            </select>
            </tr>';
    $choice = $_POST['confirm'];
    if($choice == 'yes'){
        echo '<tr><h3>Return rental?</h3>
            <select name="returnRental">
            <option value="no">----</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
            </form>
            <input type="submit" value="Return">
            </form>
            </select>
            </tr>';
        $returnRental = $_POST['submit'];
        if($returnRental == 'yes'){
            //AmountDue is set to RentalField11(amount due in table) might need to be adjusted some
            //If everything works this way then the total can be printed, just as for
            //a submit on it, and run the method to clear the rental from the table
            //but of course, do whatever works best for you.
            echo'
            <p><h3>Your total is: '.$AmountDue.' </h3></p>
            ';
        }
        else{
            die();
        }
    }
    if($choice == 'no'){
        die();
    }

    ?>

</center>
</body>

</html>
