<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View events (admin)</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #d96459;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }

        th {
            background-color: #588c7e;
            color: white;
        }
    </style>

</head>

<body>
    <h1>Viewing all events</h1>

    <div>
        <h1>
            <table>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>performer</th>
                    <th>venue</th>
                    <th>description</th>
                    <th>dateStart</th>
                    <th>dateEnd</th>
                    <th>ticket_price</th>
                    <th>status</th>
                </tr>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "maki");
                if ($conn->connect_error) {
                    die("Conectiong failed:" . $conn->connect_error);
                }
                $sql = "SELECT * from events";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["title"] . "</td><td>" . $row["performer"] . "</td><td>" . $row["venue"] . "</td><td>" . $row["description"] . "</td><td>" . $row["dateStart"] . "</td><td>" . $row["dateEnd"] . "</td><td>" . $row["ticket_price"] . "</td><td>" . $row["status"] . "</td><tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No results.";
                }
                ?>
            </table>
    </div>
</body>

</html>