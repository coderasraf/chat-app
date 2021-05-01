<?php
    session_start();
    include 'config.php';
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($email) && !empty($pass)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND pwd = '{$pass}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "Success";
        }else{
            echo "Login details not correct";
        }
    }else{
        echo "Please Enter correct login details";
    }

?>