<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
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
            
            <div id="content_area">
                <?php echo $content; ?>
            </div>

            <div class="sidebar">
                <a class="active" href="index.php">Home</a>
                <a href="https://github.com/Jmansito/CarDatabase.git">GitHub</a>
                <a href="contact.php">Contact</a>
                <a href="about.php">About</a>
            </div>
            
            <footer>
                <p>A Database Project By: Josh Mansito and Tina Huynh</p>
            </footer>
        </div>
    </body>
</html>
