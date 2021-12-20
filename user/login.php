<?php
require_once '../admin/connection.php';
session_start();

if (isset($_SESSION['user'])) {
    if ($row["role"] == "admin") {
        header("location: ../admin/admin.php");
    } else {
        header("location: ../index.php");
    }
}

if (isset($_REQUEST['login_btn'])) {
    $email = filter_var(strtolower($_REQUEST['email']), FILTER_SANITIZE_EMAIL);
    $password = strip_tags($_REQUEST['password']);

    if (empty($email)) {
        $errorMessage[] = 'Must enter email';
    } elseif (empty($password)) {
        $errorMessage[] = 'Must enter password';
    } else {
        $select_st = $db->prepare("SELECT * FROM users WHERE userName = :email LIMIT 1");
        $select_st->execute([
            ':email' => $email
        ]);
        $row = $select_st->fetch(PDO::FETCH_ASSOC);

        if ($select_st->rowCount() > 0) {
            if (password_verify($password, $row["password"])) {
                $_SESSION['user']['name'] = $row["name"];
                $_SESSION['user']['email'] = $row["email"];
                $_SESSION['user']['id'] = $row["userId"];
                $_SESSION['user']['role'] = $row["role"];
                if ($row["role"] == "admin") {
                    header("location: ../admin/admin.php");
                } else {
                    header("location: ../index.php");
                }
            }
        } else {
            $errorMessage[] = "Wrong email or password";
        }
    }
}

?>

<html>  
<head>  
    <title>PHP login system</title>  
    
    <link rel = "stylesheet" type = "text/css" href = "../styles/login.css">   
</head>  
<body>  
    <div id = "frm">  
        <h1>Login</h1>  
    
        <form name="f1" action = "home.php" onsubmit = "return validation()" method = "POST">  
            <p>  
                <label> UserName: </label>  
                <input type = "text" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p>  
            <p>     
                <input type =  "submit" id = "btn" value = "Login" />  
            </p>  
        </form>  
    </div>  
      
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>     
</html>  