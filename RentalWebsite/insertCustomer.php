<!DOCTYPE html>
<html>

<head>
    <title>Car Insert Page</title>
</head>

<body>
<center>
    <?php
    include 'customerIndex.php';
    $conn = mysqli_connect("localhost", "root", "", "HW2");

    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    $IdNo = 0;
    $Name = "";
    $Phone = "";

    if (isset($_REQUEST['Name']) OR isset($_REQUEST['Phone']))
    {
        $Name = $_REQUEST['Name'];
        $Phone = $_REQUEST['Phone'];
    }
    else
    {
        $Name = "";
        $Phone = "";
    }

    $sql = "INSERT INTO customer VALUES (NULL,
			'$Name','$Phone')";

    if(mysqli_query($conn, $sql)){
        echo "<h3>Customer info stored successfully."
            . " Please browse your localhost php my admin"
            . " to view the updated data</h3>";

        echo nl2br("$Name\n "
            . "$Phone\n" );
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
    ?>
</center>
</body>

</html>