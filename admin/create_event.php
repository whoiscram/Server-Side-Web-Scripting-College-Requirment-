<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create event (admin)</title>
</head>

<body>

    <div>
        <?php
        if (isset($_POST['create'])) {
            $title = $_POST['title'];
            $performer = $_POST['performer'];
            $venue = $_POST['venue'];
            $desc = $_POST['desc'];
            $datestart = $_POST['datestart'];
            $dateend = $_POST['dateend'];
            $tprice = $_POST['tprice'];
            $status = $_POST['status'];

            $sql = "INSERT INTO events (title, performer, venue, description, dateStart, dateEnd, ticket_price, status) VALUES (?,?,?,?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$title, $performer, $venue, $desc, $datestart, $dateend, $tprice, $status]);
            if ($result) {
                echo 'Successfully created event.';
            } else {
                echo 'Cannot create event.';
            }
        }
        ?>

    </div>

    <div>
        <form action="create_event.php" method="post">
            <div class="container">
                <h1>Create event</h1>
                <p>Fill up necessary information.</p>
                <label for="title"><b>Title</b></label><br>
                <input class="form-control" type="text" name="title" required><br><br>

                <label for="performer"><b>Performer</b></label><br>
                <input class="form-control" type="text" name="performer" required><br><br>

                <label for="venue"><b>Venue</b></label><br>
                <input class="form-control" type="text" name="venue" required><br><br>

                <label for="desc"><b>Description</b></label><br>
                <input class="form-control" type="text" name="desc" required><br><br>

                <label for="datestart"><b>Date Start</b></label><br>
                <input class="form-control" type="datetime-local" name="datestart" required><br><br>

                <label for="dateend"><b>Date End</b></label><br>
                <input class="form-control" type="datetime-local" name="dateend" required><br><br>

                <label for="tprice"><b>Ticket Price (in Php)</b></label><br>
                <input class="form-control" type="text" name="tprice" required><br><br>

                <label for="status"><b>Status</b></label><br>
                <input class="form-control" type="text" name="status" required><br><br>

                <input type="submit" name="create" value="Create event">
            </div>
    </div>
</body>

</html>