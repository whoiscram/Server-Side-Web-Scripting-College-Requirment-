<?php 
 require_once 'connection.php'; 
session_start();
if(!isset($_SESSION['loggedin'])) {
	header('location: ../user/login.php');
}

//if member must destroy session
if($_SESSION["type"] == "member"){
    session_destroy();
    exit();
    
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/create_event.css">
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
                header("location: admin.php");
                exit();
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
                <p>Fill up necessary information.</p><br>
                <label for="title"><b>Title</b></label><br><br>
                <input class="form-control" type="text" name="title"><br><br><br>

                <label for="performer"><b>Performer</b></label><br>
                <input class="form-control" type="text" name="performer"><br><br><br>

                <label for="venue"><b>Venue</b></label><br>
                <input class="form-control" type="text" name="venue"><br><br><br>

                <label for="desc"><b>Description</b></label><br>
                <input class="form-control" type="text" name="desc"><br><br><br>

                <label for="datestart"><b>Date Start</b></label><br>
                <input class="form-control" type="datetime-local" name="datestart"><br><br><br>

                <label for="dateend"><b>Date End</b></label><br>
                <input class="form-control" type="datetime-local" name="dateend"><br><br><br>

                <label for="tprice"><b>Ticket Price (in Php)</b></label><br>
                <input class="form-control" type="text" name="tprice"><br><br><br>

                <label for="status"><b>Status</b></label><br>
                <input class="form-control" type="text" name="status"><br><br><br><br>

                <input type="submit" name="create" value="Create event"><br><br><br>
                
                <button type="submit" formaction="update_event.php">Go to Update event</button>
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