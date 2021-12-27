<?php
require_once '../admin/config.php';
session_start();

echo "User Logged in as: " . $_SESSION["username"] . ""; // prompting username passed from login.php

try {
    require '../admin/config.php';

    $sql = ("SELECT * from events");
    $stmt = $db->query($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $db_name :" . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">

    <style>
        h1 {
            color: #f3ca20;
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
    <div class="nav">
        <nav>
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="home.php">CONCERTS</a></li>
                <li><a href="home.php">ABOUT US</a></li>
                <li><a href="home.php">CONTACT US</a></li>
                <li><a href="../admin/logout.php">LOG OUT</a></li>
            </ul>
        </nav>
    </div>

    <h1>Viewing all joined events</h1>
    <br>

    <div>
        <table>
            <thead>
                <tr>
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
                                    <form action="cancel_event.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="submit" name="cancel" value="Cancel">
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <footer>
        <div class="footer" style="text-align: center;">
            <h1>© 2021 by Team Maki</h1>
        </div>
    </footer>
</body>

</html>