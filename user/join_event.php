<?php
require_once(__DIR__ .'/../admin/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View events (admin)</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #d96459;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }

        th {
            background-color: #588c7e;
            color: white;
        }

        h1 {
            text-align: center;
        }
    </style>

</head>

<body>
    <header style="background-image: url(../imgs/opm.jpg);">
        <div class="nav">
            <nav>
                <ul>
                    <li><a href="#cont">HOME</a></li>
                    <li><a href="#concert">CONCERTS</a></li>
                    <li><a href="#aboutUs">ABOUT US</a></li>
                    <li><a href="#contactus">CONTACT US</a></li>
                    <li><a href="viewProfile.php">PROFILE</a></li>
                </ul>
            </nav>
        </div>
        <div class="Container">
            <div class="cont">
                <h1>OPM Artists</h1>
                <p><br>You can watch and engage with your favorite OPM artists like Parokya ni Edgar, Imago, Moonstar88, and
                    6Cyclemind!</p>
            </div>
        </div>
    </header>

    <h1>Event Details</h1>

    <div>
        <h1>
            <table>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>performer</th>
                    <th>venue</th>
                    <th>description</th>
                    <th>dateStart</th>
                    <th>dateEnd</th>
                    <th>ticket_price</th>
                    <th>status</th>
                </tr>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "maki");
                if ($conn->connect_error) {
                    die("Conectiong failed:" . $conn->connect_error);
                }
                $sql = "SELECT * from events WHERE status = 'Ongoing' OR status = 'Upcoming'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["title"] . "</td><td>" . $row["performer"] . "</td><td>" . $row["venue"] . "</td><td>" . $row["description"] . "</td><td>" . $row["dateStart"] . "</td><td>" . $row["dateEnd"] . "</td><td>" . $row["ticket_price"] . "</td><td>" . $row["status"] . "</td><tr>";
                    }
                    echo "</table>";
                } /*else {
                    echo "No results.";
                }*/
                ?>
            </table>
    </div>
    
    <div class="button-center">
        <br><br><br>
        <button class="join_b">Join</button>
        <br><br><br>
    </div>
 
    <footer>
        <div class="footer" style="text-align: center;">
            <h1>© 2021 by Team Maki</h1>
        </div>
    </footer>
</body>

</html>