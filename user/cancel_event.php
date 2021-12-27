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

if (isset($_POST['cancel'])) {
    require '../admin/config.php';
    $id = $_POST['id'];
    $sql = ("DELETE FROM event_users WHERE user_id = :id AND event_id = :event_id");
    if ($stmt = $db->prepare($sql)) {
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':event_id', $id);
        $stmt->execute();

        echo 'Successfully left event.';
        header("location: home.php");
        exit();
    } else {
        echo 'Cannot leave event.';
    }
}
