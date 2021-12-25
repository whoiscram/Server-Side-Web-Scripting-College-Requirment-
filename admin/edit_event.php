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

if (isset($_POST['edit'])) {
    require 'config.php';
    $id = $_POST['id'];
    echo $id;
}
?>

<!--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/update_event.css">
    <title>Update event (admin)</title>
</head>

<body>
    <div>
        <form action="update_event_db.php" method="post">
            <div class="container">
                <h1>Update event</h1>
                <p>Update necessary information.</p><br>

                <label for="title"><b>New Event Title</b></label><br><br>
                <input class="form-control" type="text" name="title" required><br><br><br>

                <label for="performer"><b>New Event Performer</b></label><br>
                <input class="form-control" type="text" name="performer" required><br><br><br>

                <label for="venue"><b>New Event Venue</b></label><br>
                <input class="form-control" type="text" name="venue" required><br><br><br>

                <label for="description"><b>New Event Description</b></label><br>
                <input class="form-control" type="text" name="description" required><br><br><br>

                <label for="date_start"><b>New Event Date Start</b></label><br>
                <input class="form-control" type="datetime-local" name="date_start"><br><br><br>

                <label for="date_end"><b>New Event Date End</b></label><br>
                <input class="form-control" type="datetime-local" name="date_end"><br><br><br>

                <label for="ticket_price"><b>New Event Ticket Price (in Php)</b></label><br>
                <input class="form-control" type="text" name="ticket_price" required><br><br><br>

                <label for="status"><b>New Event Status</b></label><br>

                <select id="status" name="status">
                    <option selected>Select status</option>
                    <option value="Upcoming">Upcoming</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Cancelled">Cancelled</option>
                    <option value="Finished">Finished</option>
                </select><br><br><br><br>

                <input type="submit" id="update_button" name="update" value="Update event"><br><br><br>
                
                <button type="submit" formaction="create_event.php">Go to Create event</button>
                <button type="submit" formaction="delete_event.php">Go to Delete event</button>
                <br><br><br>
                <button type="submit" formaction="view_events.php">View events</button>
                <button type="submit" formaction="view_participants_events.php">View participants</button>
                <br><br><br><br><br>
                <button type="submit" formaction="logout.php">Logout</button>
                
            </div>
        </form>
    </div>
</body>

</html>
-->