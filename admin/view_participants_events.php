<?php 
 require_once 'connection.php'; 
session_start();
//redirect user if not logged in
if(!isset($_SESSION['loggedin'])) {
	header('location: ../user/login.php');
}

//check type of user
if (!isset($_SESSION['type']) || ($_SESSION['type'] != "event manager")) {
    echo "<script>
    alert('YOU ARE NOT ADMIN');
    window.location.href='../user/home.php';
    </script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/view_participants_events.css">
    <title>View participants (admin)</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #f3ca20;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }

        th {
            background-color: #588c7e;
            color: white;
        }
    </style>

</head>

<body>
    <h1>Viewing all participants in events</h1>

    <div>
        <h1>
            <table>
                <tr>
                    <th>Participants</th>
                    <th>Event Participated</th>
                    <th>Participating Artist(s)</th>
                    <th>Event Description</th>
                    <th>Event Started On</th>
                    <th>Event Ended On</th>
                </tr>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "maki");
                if ($conn->connect_error) {
                    die("Conectiong failed:" . $conn->connect_error);
                }
                $sql = "SELECT CONCAT(u.givenName, ' ', u.Surname) AS 'Participants', e.title AS 'Event Participated', e.performer AS 'Participating Artist(s)', e.description AS 'Event Description', e.dateStart AS 'Event Started On', e.dateEnd AS 'Event Ended On' FROM users u INNER JOIN events e ON u.user_id=e.id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["Participants"] . "</td><td>" . $row["Event Participated"] . "</td><td>" . $row["Participating Artist(s)"] . "</td><td>" . $row["Event Description"] . "</td><td>" . $row["Event Started On"] . "</td><td>" . $row["Event Ended On"] . "</td><tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No results.";
                }
                ?>
            </table>
    </div>

    <div>
        <div>
            <form action="create_event.php" method="get">
                <button type="submit">Create event</button>
                <button type="submit" formaction="update_event.php">Update event</button>
                <button type="submit" formaction="delete_event.php">Delete event</button>
                <br><br><br>
                <button type="submit" formaction="view_events.php">View events</button>
                <br><br><br><br><br>
                <button type="submit" formaction="logout.php">Logout</button>
            </form>
        </div>
    </div>
</body>

</html>