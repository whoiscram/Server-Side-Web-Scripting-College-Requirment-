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

<?php
if (isset($_POST['delete'])) {
    require 'config.php';
    $id = $_POST['id'];
    $sql = ("DELETE FROM events WHERE id = :id");
    if ($stmt = $db->prepare($sql)) {
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo 'Successfully deleted event.';
        header("location: admin.php");
        exit();
    } else {
        echo 'Cannot delete event.';
    }
}
?>