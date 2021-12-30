<?php
require_once '../admin/connection.php';
require '../admin/config.php';
session_start();

// redirect user if not logged in
if (!isset($_SESSION['loggedin'])) {
    header('location: ../user/login.php');
}


if (isset($_REQUEST['cancel'])) {
    require '../admin/config.php';
    $event_id = $_REQUEST['id'];
    $user_id = $_SESSION['user_id'];

    try {
        $sql = ("DELETE FROM event_users WHERE user_id = :user_id AND event_id = :event_id");
        if ($stmt = $db->prepare($sql)) {
            $stmt->execute([
                ':user_id' => $user_id,
                ':event_id' => $event_id
            ]);

            echo 'Successfully left event.';
            header("location: view_profile.php");
            exit();
        } else {
            echo 'Cannot leave event.';
        }
    } catch (PDOException $e) {
        $pdoerror = $e->getMessage();
        echo $pdoerror;
    }
}
?>

<!--
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
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="#">CONCERTS</a></li>
                    <li><a href="#">ABOUT US</a></li>
                    <li><a href="#">CONTACT US</a></li>
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
-->