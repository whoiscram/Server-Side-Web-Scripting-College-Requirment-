<?php
require_once '../admin/connection.php';
session_start();
// authentication.php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/login.css">
    <title>Login</title>
</head>

<body>
    <div id="form">
        <h1>Welcome to MakiConcert!</h1>
        <form name="f1" action="authentication.php" onsubmit="return validation()" method="POST">
            <div>
                <label>Username:</label>
                <input type="text" id="user" name="user" />
                <br>
            </div>
            <br>
            <div>
                <label>Password: </label>
                <input type="password" id="pass" name="pass" />
                <br>
            </div>
            <br>
            <input type="submit" id="btn" name="login" value="Login" />
        </form>
    </div>

    <script>
        function validation() {
            var id = document.f1.user.value;
            var ps = document.f1.pass.value;
            if (id.length == "" && ps.length == "") {
                alert("Username and Password fields are empty!");
                return false;
            } else {
                if (id.length == "") {
                    alert("Username field is empty!");
                    return false;
                }
                if (ps.length == "") {
                    alert("Password field is empty!");
                    return false;
                }
            }
        }
    </script>

    <footer>
        <div class="footer" style="text-align: center;">
            <h1>© 2021 by Team Maki</h1>
        </div>
    </footer>
</body>

</html>