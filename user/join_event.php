<?php
require_once '../admin/connection.php';
require '../admin/config.php';
session_start();

// redirect user if not logged in
if (!isset($_SESSION['loggedin'])) {
    header('location: ../user/login.php');
}

if (isset($_REQUEST['join'])) {
    require '../admin/config.php';
    $event_id = $_REQUEST['id'];
    $user_id = $_SESSION['user_id'];
    echo $event_id;
    echo $user_id;

    $sql = ("INSERT INTO event_users (user_id, event_id) VALUES (?,?)");
    if ($stmt = $db->prepare($sql)) {
        $stmt->bindParam(1, $user_id, PDO::PARAM_STR, FILTER_SANITIZE_STRING);
        $stmt->bindParam(2, $event_id, PDO::PARAM_STR, FILTER_SANITIZE_STRING);
        $stmt->execute();

        echo 'Successfully joined event.';
        header("location: view_profile.php");
        exit();
    } else {
        echo 'Cannot join event.';
    }
}
?>

