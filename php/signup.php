<?php
    session_start();
    include 'config.php';
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pwd)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email -This Email is already exists";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $img_explode = explode(".", $img_name);
                    $img_ext = end($img_explode); 
                    
                    $extenstion = ['png', 'jpg', 'gif', 'jpeg'];
                    if(in_array($img_ext,$extenstion) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, 'images/'.$new_img_name)){
                            $status = 'Active now';
                            $random_id = rand(time(), 100000);
                            // let's insert user in database
                            $sql2 = mysqli_query($conn, "INSERT INTO `users` (`unique_id`, `fname`, `lname`, `email` , `pwd`, `img`, `status`) VALUES ('$random_id','$fname', '$lname', '$email','$pwd','$new_img_name', '$status')");

                            if($sql2){
                                $sql3 = mysqli_query($conn, "SELECT  * FROM `users` WHERE `email` ='{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "Success";
                                }

                            }else{
                                echo "Data not inserted successfully";
                            }
                        };
                    }else{
                        echo "Please, select these types of file 'jpg', 'png', 'gif', 'jpeg'";
                    }
                }else{
                    echo "Please select an image";
                }
            }
        }else{
            echo "$email - This email is not valid";
        }
    }else{
        echo 'All input fields are required';
    }
?>