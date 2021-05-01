<?php
session_start();
if(!isset($_SESSION['unique_id'])){
  header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>RealTime Chatapp :: Using Core PHP</title>
      <!-- Fontawesome CSS File -->
      <link rel="stylesheet" type="text/css" href="css/all.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
  <body>

  <div class="wrapper">
    <section class="users chat-area">
    <header>
    <?php 
          include 'php/config.php';
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = "SELECT * FROM users WHERE unique_id='{$user_id}'"; 
          $run_sql = mysqli_query($conn, $sql);
          if(mysqli_num_rows($run_sql) > 0){
              $row = mysqli_fetch_assoc($run_sql);
          }     
        ?>
      <a id="angle-back" href="users.php"><i class="fa fa-arrow-left"></i></a>
        <div class="content">
            <img src="php/images/<?php echo $row['img']; ?>" alt="">
            <div class="details">
                <span><?php echo $row['fname'] .' '.$row['lname']  ?></span>
                <p><?php echo $row['status']; ?></p>
            </div>
        </div>
       
    </header>
    
    <div class="chat-box"> </div>

    <form class="typing-area">
    <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
    <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
    <input type="text" name="message" class="input-field" placeholder="Type a Message here ...">
    <button class="send-btn2" type="submit">
    <i class="fab fa-telegram-plane"></i>
    </button>
    </form>
    </section>
    
  </div>

  <div class="alert custom-alert alert-warning"></div>
  <!-- Jqurey Min File -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <!-- Javascript Main File -->
   <script type="text/javascript" src="js/main.js"></script>
   <script type="text/javascript" src="js/chat.js"></script>
  </body>
</html>