<?php      
    require_once '../admin/connection.php';  
    session_start();
    // Session Variables
    $username = $_POST['user'];  
    $password = $_POST['pass']; 
    $_SESSION["type"] = $type;

      
    
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from users where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 
        
        $user_id = $row['user_id'];
        if($count == 1){
            if($row["type"]=="member"){  
                $_SESSION['user_id'] = $user_id;
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username; 
                $_SESSION['type'] = "member";
                header("location: home.php");   
             
            }else{
                header("location: ../admin/admin.php");
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username; 
                $_SESSION['type'] = "admin";
            }
        }else{
                header("location: login.php");
        }

        
        
?>  