<?php
require_once 'connection.php';
session_start();

// redirect user if not logged in
if (!isset($_SESSION['loggedin'])) {
    header('location: ../user/login.php');
}

// check type of user
if (!isset($_SESSION['type']) || ($_SESSION['type'] != "admin")) {
    echo "<script>
    alert('YOU ARE NOT ADMIN');
    window.location.href='../user/home.php';
    </script>";
    exit;
}


try {
    require 'config.php';

    $sql = 'SELECT * from events';
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
    <link rel="stylesheet" type="text/css" href="../styles/view_events.css">
    <title>View events (admin)</title>

    <style>
        @font-face {
            font-family: "font_h1";
            src: url(/fonts/Bellota\ Text.ttf);
        }

        @font-face {
            font-family: "font_p";
            src: url(/fonts/Baloo\ Bhaijaan\ 2.ttf);
        }

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
            font-family: "font_h1";
            font-size: 20px;
        }

        td {
            border: 1px solid lightskyblue;
            font-family: "font_p";
            font-size: 18px;
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
    <h1>Viewing all events</h1>

    <div>
        <table>
            <thead>
                <tr>
                    <th><strong>Event ID</strong></th>
                    <th><strong>Event Title</strong></th>
                    <th><strong>Event Performer(s)</strong></th>
                    <th><strong>Event Venue</strong></th>
                    <th><strong>Event Description</strong></th>
                    <th><strong>Event Date Start</strong></th>
                    <th><strong>Event Date End</strong></th>
                    <th><strong>Event Ticket Price</strong></th>
                    <th><strong>Event Status</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $stmt->fetch()) : ?>
                    <tr>
                        <td width="2%"><?php echo htmlspecialchars($row['id']) ?></td>
                        <td width="10%"><?php echo htmlspecialchars($row['title']); ?></td>
                        <td width="20%"><?php echo htmlspecialchars($row['performer']); ?></td>
                        <td width="10%"><?php echo htmlspecialchars($row['venue']); ?></td>
                        <td width="20%"><?php echo htmlspecialchars($row['description']); ?></td>
                        <td width="10%"><?php echo htmlspecialchars($row['date_start']); ?></td>
                        <td width="10%"><?php echo htmlspecialchars($row['date_end']); ?></td>
                        <td width="4%"><?php echo htmlspecialchars($row['ticket_price']); ?></td>
                        <td width="4%"><?php echo htmlspecialchars($row['status']); ?></td>
                        <td>
                            <div class="button_actions">
                                <div style="display: inline-block;">
                                    <form action="edit_event.php" method="request">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="submit" name="edit" value="Edit">
                                    </form>
                                </div>
                                <div style="display: inline-block;">
                                    <form action="delete_event.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="submit" name="delete" value="Delete">
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <br>

    <div>
        <form action="admin.php">
            <input type="submit" name="back" value="Back" />
        </form>
    </div>
    <!--
    <div>
        <form action="create_event.php" method="get">
            <button type="submit">Create event</button>
            <button type="submit" formaction="update_event.php">Update event</button>
            <button type="submit" formaction="delete_event.php">Delete event</button>
            <br><br><br>
            <button type="submit" formaction="view_participants_events.php">View participants</button>
            <br><br><br><br><br>
            <button type="submit" formaction="logout.php">Logout</button>
        </form>
    </div>
    -->
</body>

</html>