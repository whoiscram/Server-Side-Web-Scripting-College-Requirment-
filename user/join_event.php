<?php
require_once '../admin/connection.php';
session_start();

// redirect user if not logged in
if (!isset($_SESSION['loggedin'])) {
    header('location: ../user/login.php');
}

// check type of user
if (!isset($_SESSION['type']) || ($_SESSION['type'] != "event manager")) {
    echo "<script>
    alert('YOU ARE NOT ADMIN');
    window.location.href='../user/home.php';
    </script>";
    exit;
}

$sql = $db->prepare("SELECT * FROM events WHERE id = :id LIMIT 1");
$sql->execute([
    ':id' => $_REQUEST['id']
]);
$row = $sql->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['join'])) {
    require '../admin/config.php';
    $id = $_REQUEST['id'];
    // must be id of currently logged in user
    try {
        $sql = $db->prepare("INSERT INTO event_users (user_id, event_id) VALUES (:user_id, :id)");
        $sql->execute([
            // passed id of current user
            ':id' => $id,
        ]);
    } catch (PDOException $e) {
        $pdoerror = $e->getMessage();
        echo $pdoerror;
    }
    header("location: home.php");
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