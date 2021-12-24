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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/delete_event.css">
    <title>Delete event (admin)</title>
</head>

<body>
    <?php
    include "view_events.php";

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM events WHERE id = ? && status = 'Cancelled' OR status = 'Finished'";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([$id]);
        if ($result) {
            echo 'Successfully deleted event.';
        } else {
            echo 'Cannot delete event.';
        }
    }
    ?>

    <div>
        <form action="delete_event.php" method="post">
            <div class="container">
                <h1>Delete event</h1>
                <p>Deleting an event. This action can't be undone.</p><br>
                <label for="id"><b>ID of event to delete</b></label><br><br>
                <input class="form-control" type="text" name="id"><br><br><br><br>

                <input type="submit" name="delete" value="Delete event"><br><br><br>

                <!--
                <button type="submit" formaction="create_event.php">Go to Create event</button>
                <button type="submit" formaction="update_event.php">Go to Update event</button>
                <br><br><br>
                <button type="submit" formaction="view_events.php">View events</button>
                <button type="submit" formaction="view_participants_events.php">View participants</button>
                <br><br><br><br><br>
                <button type="submit" formaction="logout.php">Logout</button>
                -->
            </div>
        </form>
    </div>
</body>

</html>