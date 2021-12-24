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
    <link rel="stylesheet" type="text/css" href="../styles/admin.css">
    <title>Maki Admin</title>
</head>

<body>
    <h1>Admin</h1>
    <form action="create_event.php" method="get">
        <button type="submit">Create event</button>
        <button type="submit" formaction="update_event.php">Update event</button>
        <button type="submit" formaction="delete_event.php">Delete event</button>
        <br><br><br>
        <button type="submit" formaction="view_events.php">View events</button>
        <button type="submit" formaction="view_participants_events.php">View participants</button>
        <br><br><br><br><br>
        <button type="submit" formaction="logout.php">Logout</button>
    </form>
</body>

</html>