<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete event (admin)</title>
</head>

<body>

    <div>
        <?php
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];

            $sql = "DELETE FROM events WHERE id = ? && status = 'Done'";
            $stmt = $db->prepare($sql);
            $result = $stmt->execute([$id]);
            if ($result) {
                echo 'Successfully deleted event.';
            } else {
                echo 'Cannot delete event.';
            }
        }
        ?>

    </div>

    <div>
        <form action="delete_event.php" method="post">
            <div class="container">
                <h1>Delete event</h1>
                <p>Deleting an event. This action can't be undone.</p>
                <label for="id"><b>ID of event to delete</b></label><br>
                <input class="form-control" type="text" name="id" required><br><br>

                <input type="submit" name="delete" value="Delete event">
            </div>
    </div>
</body>

</html>