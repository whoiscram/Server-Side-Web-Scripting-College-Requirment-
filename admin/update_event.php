<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update event (admin)</title>
</head>

<body>

    <div>
        <?php
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $performer = $_POST['performer'];
            $venue = $_POST['venue'];
            $desc = $_POST['desc'];
            $datestart = $_POST['datestart'];
            $dateend = $_POST['dateend'];
            $tprice = $_POST['tprice'];
            $status = $_POST['status'];

            $sql = "UPDATE events SET title = ?, performer = ?, venue = ?, description = ?, dateStart = ?, dateEnd = ?, ticket_price = ?, status = ? WHERE id = ?";
            $stmt = $db->prepare($sql);
            $result = $stmt->execute([$title, $performer, $venue, $desc, $datestart, $dateend, $tprice, $status, $id]);
            if ($result) {
                echo 'Successfully updated existing event.';
            } else {
                echo 'Cannot update event.';
            }
        }
        ?>

    </div>

    <div>
        <form action="update_event.php" method="post">
            <div class="container">
                <h1>Update event</h1>
                <p>Update necessary information.</p>
                <label for="id"><b>ID to update</b></label><br>
                <input class="form-control" type="text" name="id" required><br><br>

                <label for="title"><b>New Title</b></label><br>
                <input class="form-control" type="text" name="title" required><br><br>

                <label for="performer"><b>New Performer</b></label><br>
                <input class="form-control" type="text" name="performer" required><br><br>

                <label for="venue"><b>New Venue</b></label><br>
                <input class="form-control" type="text" name="venue" required><br><br>

                <label for="desc"><b>New Description</b></label><br>
                <input class="form-control" type="text" name="desc" required><br><br>

                <label for="datestart"><b>New Date Start</b></label><br>
                <input class="form-control" type="datetime-local" name="datestart" required><br><br>

                <label for="dateend"><b>New Date End</b></label><br>
                <input class="form-control" type="datetime-local" name="dateend" required><br><br>

                <label for="tprice"><b>New Ticket Price (in Php)</b></label><br>
                <input class="form-control" type="text" name="tprice" required><br><br>

                <label for="status"><b>New Status</b></label><br>
                <input class="form-control" type="text" name="status" required><br><br>

                <input type="submit" name="update" value="Update event">
            </div>
    </div>
</body>

</html>