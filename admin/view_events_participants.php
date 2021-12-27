<?php
require_once 'connection.php';
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

try {
    require 'config.php';

    $sql = ("SELECT CONCAT(u.given_name, ' ', u.surname) AS 'Event Participants', e.title AS 'Event Participated', e.performer AS 'Event Performer(s)', e.description AS 'Event Description', e.date_start AS 'Event Started On', e.date_end AS 'Event Ended On' FROM event_users eu INNER JOIN events e ON eu.event_id = e.id INNER JOIN users u ON eu.user_id = u.user_id ORDER BY u.user_id, e.title");
    $stmt = $db->query($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
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
            font-size: 16px;
            text-align: center;
            border: 4px solid lightskyblue;
        }

        th {
            background-color: #f3ca20;
            color: black;
            border: 2px solid lightskyblue;
        }

        td {
            border: 1px solid lightskyblue;
        }

        button {
            font-size: 14px;
            width: 120px;
            height: 50px;
            padding: 0px;
        }
    </style>
</head>

<body>
    <h1>Viewing all participants in events</h1>

    <div>
        <table>
            <thead>
                <tr>
                    <th><strong>Event Participants</strong></th>
                    <th><strong>Event Participated</strong></th>
                    <th><strong>Event Performer(s)</strong></th>
                    <th><strong>Event Description</strong></th>
                    <th><strong>Event Started On</strong></th>
                    <th><strong>Event Ended On</strong></th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $stmt->fetch()) : ?>
                    <tr>
                        <td width="2%"><?php echo htmlspecialchars($row['Event Participants']) ?></td>
                        <td width="10%"><?php echo htmlspecialchars($row['Event Participated']); ?></td>
                        <td width="20%"><?php echo htmlspecialchars($row['Event Performer(s)']); ?></td>
                        <td width="20%"><?php echo htmlspecialchars($row['Event Description']); ?></td>
                        <td width="10%"><?php echo htmlspecialchars($row['Event Started On']); ?></td>
                        <td width="10%"><?php echo htmlspecialchars($row['Event Ended On']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <br>

    <div>
        <form action="admin.php">
            <input type="submit" value="Back" />
        </form>
    </div>
</body>

</html>