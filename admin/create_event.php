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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/create_event.css">
    <title>Create event (admin)</title>
</head>

<body>
    <?php
    include 'config.php';
    if (isset($_POST['create'])) {
        $title = $_POST['title'];
        $performer = $_POST['performer'];
        $venue = $_POST['venue'];
        $description = $_POST['description'];
        $date_start = date('Y-m-d H:i:s', strtotime($_POST['date_start']));
        $date_end = date('Y-m-d H:i:s', strtotime($_POST['date_end']));
        $ticket_price = $_POST['ticket_price'];
        $status = $_POST['status'];

        $sql = ("INSERT INTO events (title, performer, venue, description, date_start, date_end, ticket_price, status) VALUES (?,?,?,?,?,?,?,?)");
        if ($stmt = $db->prepare($sql)) {
            $stmt->bindParam(1, $title, PDO::PARAM_STR, FILTER_SANITIZE_STRING);
            $stmt->bindParam(2, $performer, PDO::PARAM_STR, FILTER_SANITIZE_STRING);
            $stmt->bindParam(3, $venue, PDO::PARAM_STR, FILTER_SANITIZE_STRING);
            $stmt->bindParam(4, $description, PDO::PARAM_STR, FILTER_SANITIZE_STRING);
            $stmt->bindParam(5, $date_start, PDO::PARAM_STR, FILTER_SANITIZE_STRING);
            $stmt->bindParam(6, $date_end, PDO::PARAM_STR, FILTER_SANITIZE_STRING);
            $stmt->bindParam(7, $ticket_price, PDO::PARAM_STR, FILTER_SANITIZE_STRING);
            $stmt->bindParam(8, $status, PDO::PARAM_STR, FILTER_SANITIZE_STRING);
            $stmt->execute();

            echo 'Successfully created event.';
            header("location: admin.php");
            exit();
        } else {
            echo 'Cannot create event.';
        }
    }
    ?>

    <div>
        <form action="create_event.php" method="post">
            <div class="container">
                <h1>Create event</h1>
                <p>Fill up necessary information.</p><br>
                <label for="title"><b>Title</b></label><br><br>
                <input class="form-control" type="text" name="title" required><br><br><br>

                <label for="performer"><b>Performer</b></label><br>
                <input class="form-control" type="text" name="performer" required><br><br><br>

                <label for="venue"><b>Venue</b></label><br>
                <input class="form-control" type="text" name="venue" required><br><br><br>

                <label for="description"><b>Description</b></label><br>
                <input class="form-control" type="text" name="description" required><br><br><br>

                <label for="date_start"><b>Date Start</b></label><br>
                <input class="form-control" type="datetime-local" name="date_start" id="start"><br><br><br>

                <label for="date_end"><b>Date End</b></label><br>
                <input class="form-control" type="datetime-local" name="date_end" id="end"><br><br><br>

                <script>
                    var start = document.getElementById('start');
                    var end = document.getElementById('end');

                    start.addEventListener('change', function() {
                    if (start.value)
                        end.min = start.value;
                    }, false);
                    end.addEventListener('change', function() {
                    if (end.value)
                        start.max = end.value;
                    }, false);
                    </script>

                <label for="ticket_price"><b>Ticket Price (in Php)</b></label><br>
                <input class="form-control" type="text" name="ticket_price" required><br><br><br>

                <label for="status"><b>Status</b></label><br>

                <select id="status" name="status">
                    <option selected>Select status</option>
                    <option value="Upcoming">Upcoming</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Cancelled">Cancelled</option>
                    <option value="Finished">Finished</option>
                </select><br><br><br><br>

                <input type="submit" id="create_button" name="create" value="Create event"><br><br><br>
            </div>
        </form>
    </div>
</body>

</html>