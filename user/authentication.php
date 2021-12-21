<?php      
    include("../admin/connection.php");  
    $username = $_POST['user'];  
    $password = $_POST['pass']; 
    

      
    
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from users where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 
        
        if($count == 1){
            if($row["type"]=="member"){  
                $_SESSION['user_id'] = $user_id;
                header("location: home.php");
             
            }else{
                header("location: ../admin/admin.php");
            }
        }else{
                header("location: login.php");
        }
        
?>  