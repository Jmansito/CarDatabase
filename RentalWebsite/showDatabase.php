<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Rentals</title>
    <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css"  />
</head>
<body>
<div id="wrapper">
    <div id="banner">
    </div>

    <nav id="navigation">
        <ul id="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="customerIndex.php">Customer</a></li>
            <li><a href="carIndex.php">New Car</a></li>
            <li><a href="rentalIndex.php">Rentals</a></li>
            <li><a href="showDatabase.php">Database</a></li>
            <li><a href="returnIndex.php">Returns</a></li>
            <li><a href="ratesIndex.php">Rates</a></li>
        </ul>
    </nav>
    <div class="sidebar">
        <a class="active" href="index.php">Home</a>
        <a href="https://github.com/Jmansito/CarDatabase.git">GitHub</a>
        <a href="contact.php">Contact</a>
        <a href="about.php">About</a>
    </div>



</div>
</body>
</html>

<div id="content_area">
    <h1>Printing out our entire database for grading:</h1>
    <?php
    $username = "root";
    $password = "";
    $database = "HW2";
    $mysqli = new mysqli("localhost", $username, $password, $database);

    //Customer table
    $query = "SELECT * FROM customer";

    echo'<h3>Customers</h3>';

    echo '<table  cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <b><font face="Arial">IdNo</font></b> </td> 
          <td> <b><font face="Arial">Name</font></b> </td> 
          <td> <b><font face="Arial">Phone</font></b> </td> 
      </tr>';

    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $customerField1 = $row["IdNo"];
            $customerField2 = $row["Name"];
            $customerField3 = $row["Phone"];

            echo '<tr> 
                  <td>'.$customerField1.'</td> 
                  <td>'.$customerField2.'</td> 
                  <td>'.$customerField3.'</td> 
              </tr>';
        }
        $result->free();
    }

    //car table
    $query = "SELECT * FROM car";

    echo '<table cellspacing="2" cellpadding="2" > 
      <tr> 
          <td> <b><font face="Arial">VehicleID</font></b> </td> 
          <td> <b><font face="Arial">Model</font></b> </td> 
          <td> <b><font face="Arial">Year</font></b> </td> 
          <td> <b><font face="Arial">CarType</font></b> </td> 
          <td> <b><font face="Arial">Available</font></b> </td> 
      </tr>';
    if ($result = $mysqli->query($query)) {
        echo'<h3>All Cars</h3>';
        while ($row = $result->fetch_assoc()) {
            $carField1 = $row["VehicleID"];
            $carField2 = $row["Model"];
            $carField3 = $row["Year"];
            $carField4 = $row["CarType"];
            $carField5 = $row["Available"];

            echo '<tr> 
                  <td>'.$carField1.'</td> 
                  <td>'.$carField2.'</td> 
                  <td>'.$carField3.'</td> 
                  <td>'.$carField4.'</td> 
                  <td>'.$carField5.'</td> 
              </tr>';
        }
        $result->free();
    }

    //CarType table
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

    //Rental table
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
        }
        $result->free();
    }

    ?>

</div>