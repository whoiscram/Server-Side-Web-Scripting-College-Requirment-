<?php
if (isset($_POST['update'])) {
    require 'config.php';

    $id = $_POST['id'];
    
    $title = $_POST['title'];
    $performer = $_POST['performer'];
    $venue = $_POST['venue'];
    $description = $_POST['description'];
    $date_start = date('Y-m-d H:i:s', strtotime($_POST['date_start']));
    $date_end = date('Y-m-d H:i:s', strtotime($_POST['date_end']));
    $ticket_price = $_POST['ticket_price'];
    $status = $_POST['status'];

    $sql = ("UPDATE events SET title = :title, performer = :performer, venue = :venue, description = :description, date_start = :date_start, date_end = :date_end, ticket_price = :ticket_price, status = :status WHERE id = :id");
    if ($stmt = $db->prepare($sql)) {
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':performer', $performer);
        $stmt->bindParam(':venue', $venue);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date_start', $date_start);
        $stmt->bindParam(':date_end', $date_end);
        $stmt->bindParam(':ticket_price', $ticket_price);
        $stmt->bindParam(':status', $status);
        $stmt->execute();

        echo "Successfully updated event.";
        header("location: admin.php");
        exit();
    } else {
        echo 'Cannot update event.';
    }
}
