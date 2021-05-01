<?php 
 
 session_start();
 include 'config.php';
 if(isset($_SESSION['unique_id'])){
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);
    $output = '';
    
    $sql = "SELECT * FROM messages 
    LEFT JOIN users ON users.unique_id = messages.incoming_msg_id
    WHERE(outgoing_msg_id ={$outgoing_id} AND incoming_msg_id = {$incoming_id}) OR (outgoing_msg_id ={$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ASC";
    $run_sql= mysqli_query($conn, $sql);

    if(mysqli_num_rows($run_sql) > 0){
        while($row = mysqli_fetch_assoc($run_sql)){
            if($row['outgoing_msg_id'] === $outgoing_id){
                $output .='<div class="chat outgoing">
                                <div class="details chat">
                                    <p>'.$row['message'].'</p>
                                </div>
                            </div>';
            }else{
                $output .= '<div class="chat incoming">
                                <img src="php/images/'.$row['img'].'" alt="">
                                <div class="details chat">
                                <p>'.$row['message'].'</p>
                                </div>
                        </div>';
            }
        }
        echo $output;

    }

 }else{
     header('location:../login.php');
 }



?>