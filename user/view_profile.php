<?php
require_once '../admin/config.php';
session_start();

//echo "User Logged in as: " . $_SESSION["username"] . ""; // prompting username passed from login.php
$user_id = $_SESSION['user_id'];

try {
    require '../admin/config.php';

    $sql = ("SELECT e.id, e.title AS 'Event Participated', e.performer AS 'Event Performer(s)', e.description AS 'Event Description', e.date_start AS 'Event Started On', e.date_end AS 'Event Ended On' FROM event_users eu INNER JOIN events e ON eu.event_id = e.id WHERE eu.user_id = $user_id");
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
    <link rel="stylesheet" type="text/css" href="../styles/stle.css">

    <style>
        @font-face {
            font-family: "font_h1";
            src: url(/fonts/Bellota\ Text.ttf);
        }

        @font-face {
            font-family: "font_p";
            src: url(/fonts/Baloo\ Bhaijaan\ 2.ttf);
        }
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
            font-family: "font_h1";
        }

        td {
            border: 1px solid lightskyblue;
            font-family: "font_p";
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

    <?php
    echo "<h1>Viewing " . $_SESSION["username"] . "'s joined events</h1>";
    ?>

    <br>

    <div>
        <table>
            <thead>
                <tr>
                    <th><strong>Event Participated</strong></th>
                    <th><strong>Event Performer(s)</strong></th>
                    <th><strong>Event Description</strong></th>
                    <th><strong>Event Started On</strong></th>
                    <th><strong>Event Ended On</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $stmt->fetch()) : ?>
                    <tr>
                        <td width="20%"><?php echo htmlspecialchars($row['Event Participated']); ?></td>
                        <td width="20%"><?php echo htmlspecialchars($row['Event Performer(s)']); ?></td>
                        <td width="20%"><?php echo htmlspecialchars($row['Event Description']); ?></td>
                        <td width="20%"><?php echo htmlspecialchars($row['Event Started On']); ?></td>
                        <td width="20%"><?php echo htmlspecialchars($row['Event Ended On']); ?></td>
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